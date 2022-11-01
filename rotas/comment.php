<?php




use \felipeno22\PageAdmin;
use \felipeno22\Model\User;
use \felipeno22\Model\Comment;
use \felipeno22\Model\Response;
use \felipeno22\Model\Content;






$app->get('/comments', function() {

	$verify_user=User::verifyLogin();

	/*if($verify_user!='admin'){
		header("Location: /admin/panel");
			
		
			exit;
	}*/

	$u=User::getFromSession();
	$idu=$u->getiduser();	
	if($u->getinadmin()==1){
		$idu=0;	
	}
	
	$search= (isset($_GET['search'])) ? $_GET['search'] :'';
	

	$dtini='';

		if(isset($_GET['dtiniinfo']) &&  $_GET['dtiniinfo']!='' ){

				$dtini=$_GET['dtiniinfo'];	

		}



	$dtfim='';

		if(isset($_GET['dtfinalinfo']) &&  $_GET['dtfinalinfo']!='' ){

				$dtfim=$_GET['dtfinalinfo'];	

		}	
		

		



 	$page= (isset($_GET['page'])) ? (int)$_GET['page'] :1;

 	if($search != ''){

 			
 			$comments=Comment:: getPageSearch($dtini,$dtfim,$idu,$search,$page);	
 			

 		}else{

 			
 				
 				$comments=Comment:: getPage($dtini,$dtfim,$idu,$page);
 			

 		}

	
 			$pages=[];

for ($x=0; $x < $comments['totalPages'] ; $x++) { 

	array_push($pages, ["href"=>"/comments?".http_build_query(["page"=>$x+1,"search"=>$search,$dtini=>'dtini',$dtfim=>'dtfim']),
						"text"=>$x+1]);
}
 	

 	$pageAdmin= new PageAdmin(array('footer'=>false,"user"=>$u->getValues()),'/views/admin/');

 	$pageAdmin->setTpl("comments",array("user"=>$u->getValues(),"comments"=>$comments['data'],
 								  "search"=>$search,'dtini'=>$dtini,'dtfim'=>$dtfim,
 									"pages"=>$pages,'totalPages'=>$comments['totalPages']));



});






/*rota para carregar dados via ajax jquery*/
$app->get('/loadCommentsAdm', function() {


	
$verify_user=User::verifyLogin();

	/*if($verify_user!='admin'){
		header("Location: /admin/panel");
			
		
			exit;
	}*/


	$u=User::getFromSession();
	$idu=$u->getiduser();	
	if($u->getinadmin()==1){
		$idu=0;	
	}


	$search= (isset($_GET['search'])) ? $_GET['search'] :'';
	

	$dtini='';

		if(isset($_GET['dtiniinfo']) &&  $_GET['dtiniinfo']!='' ){

				$dtini=$_GET['dtiniinfo'];	

		}



	$dtfim='';

		if(isset($_GET['dtfinalinfo']) &&  $_GET['dtfinalinfo']!='' ){

				$dtfim=$_GET['dtfinalinfo'];	

		}	


 	$page= (isset($_GET['page'])) ? (int)$_GET['page'] :1;

 	if($search != ''){

 			
 			$comments=Comment:: getPageSearch($dtini,$dtfim,$idu,$search,$page);	
 			

 		}else{

 			
 			
 				$comments=Comment:: getPage($dtini,$dtfim,$idu,$page);
 			

 		}

	
 			$pages=[];





$initCount=(isset($_GET['aux2'])) ? (int)$_GET['aux2'] :0;	


 if($comments['totalPages']>5){


 	 	/*auxiliares para ajudar a limitar a paginação*/

 	$limitCount=(isset($_GET['aux'])) ? (int)$_GET['aux'] :5;
 	


 }else{

 		$limitCount=(isset($_GET['aux'])) ? (int)$_GET['aux'] :$comments['totalPages'];

 }

	

//percorrendo as paginas conforma a limitação dos auxiliares
//começa com aux2 =0 aux=5 
for ($x=$initCount; $x < $limitCount ; $x++) { 

	array_push($pages, ["page"=>$x+1,"search"=>$search,$dtini=>'dtini',$dtfim=>'dtfim',"aux"=>$limitCount,"aux2"=>$initCount]);
}





$com= new Comment();

$resp=$com->limitPagination($search,$dtini,$dtfim,$x,$limitCount,$initCount,$comments['totalPages']);
 
 		
 		echo json_encode(array("comments"=>$comments['data'],
 		"pages"=>$pages,
 		"next"=>$resp['btNext'],
 		"previus"=>$resp['btPrev'],
 		"hidden_next"=>$resp['hidden_next'],
 		"hidden_prev"=>$resp['hidden_prev'],'totalPages'=>$comments['totalPages']));






});
/*end rota para carregar dados via ajax jquery*/



$app->get('/insertComm/',function() {


	$verify_user=User::verifyLogin();

	
	/*$comment = new Comment();
	$response= new Response();

	$comment->get((int)$idcomment);//convertendo o id passado para int 
	$resps=$response->listAllResponseByIdComment($idcomment);
	*/


	$u=User::getFromSession();

	if($u->getinadmin()==1){
		$contents=Content:: listAll();
	}else{
		$contents=Content:: listAllByIduser($u->getiduser());
	}
	
	
	
	$pageAdmin= new PageAdmin(array('footer'=>false,"user"=>$u->getValues()),'/views/admin/');

	
	//$response->setData($resps);



	$pageAdmin->setTpl("insert_comment",["contents"=>$contents,"error"=>User::getMsgError(),"user"=>$u->getValues()]);
    
});



$app->post('/insertComm/',function() {


$verify_user=User::verifyLogin();

	/*if($verify_user!='admin'){
		header("Location: /admin/panel");
			
		
			exit;
	}*/

try{


			 		
 	



	$comment = new Comment();
	

	
	
	//$comment->setData($_POST);

	$comment->save($_POST['title'],$_POST['content_text'],$_POST["content"],$_POST['status_comment']);

	
User::setMsgError('deu certo');
	
		}catch(Exception $e){

		

			User::setMsgError($e->getMessage());

		

	}

 

header("Location: /insertComm/");
 	exit;


    
});








$app->get('/updateComm/:idcomment',function($idcomment) {


	$verify_user=User::verifyLogin();

	
	$comment = new Comment();
	$response= new Response();

	$comment->get((int)$idcomment);//convertendo o id passado para int 
	$resps=$response->listAllResponseByIdComment($idcomment);
	
	$u=User::getFromSession();

	if($u->getinadmin()==1){
		$contents=Content:: listAll();
	}else{
		$contents=Content:: listAllByIduser($u->getiduser());
	}
	
	$pageAdmin= new PageAdmin(array('footer'=>false,"user"=>$u->getValues()),'/views/admin/');

	
	$response->setData($resps);

	

	$pageAdmin->setTpl("update_comment2",["user"=>$u->getValues(),"comment"=>$comment->getValues(),"resps"=>$response->getValues(),"error"=>User::getMsgError()]);
    
});




$app->post('/updateComm/:idcomment',function($idcomment) {


$verify_user=User::verifyLogin();

	/*if($verify_user!='admin'){
		header("Location: /admin/panel");
			
		
			exit;
	}*/

try{

 $u=User::getFromSession();
	

			 		
 	



	$comment = new Comment();
	

	
	

	//$comment->setData($_POST);

	$comment->update($idcomment,$_POST['status_comment']);

	
User::setMsgError('deu certo');
	
		}catch(Exception $e){

		

			User::setMsgError($e->getMessage());

		

	}

 

header("Location: /updateComm/".$idcomment);
 	exit;


    
});




$app->post('/insertRespComments', function() {

$response = new Response();


 	
 	$response->setData($_POST);



 	
	
	

	
		$response->save($_POST['nameresp'],$_POST['resp'],$_POST['idcomment']);


	echo "salvo";

	exit;



 	


});




$app->post('/updateStatusComments', function() {

$comment = new Comment();


 	


$comment->update_status_comm($_POST['idcomment'],$_POST['status_comment']);


	echo json_encode($_POST['idcomment']." foi alterado !!!");

 		exit;
	
	

 	


});



$app->post('/saveRespCommDialog', function() {

$response = new Response();


 


$response->save($_POST['name'],$_POST['response'],$_POST['idcomment'],$_POST['status_response']);



	echo json_encode($_POST['response']."-".$_POST['status_response']." respondido !!!");

 		exit;
	
	

 	


});





?>