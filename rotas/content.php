<?php




use \felipeno22\PageAdmin;
use \felipeno22\Model\User;
use \felipeno22\Model\Content;
use \felipeno22\Model\Blog;




$app->get('/contents', function() {

	$verify_user=User::verifyLogin();

	/*if($verify_user!='admin'){
		header("Location: /admin/panel");
			
		
			exit;
	}*/

	$u=User::getFromSession();

	$idu=$u->getiduser();
		
	if($u->getinadmin()==1){//se for um admin
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

 			
 			$contents=Content:: getPageSearch($dtini,$dtfim,$idu,$search,$page);	
 			//$contents=Content:: getPageSearch($dtini,$dtfim,$search,$page);	

 		}else{

 			
 			
 				$contents=Content:: getPage($dtini,$dtfim,$idu,$page);
 				//$contents=Content:: getPage($dtini,$dtfim,$page);

 		}

	
 			$pages=[];

for ($x=0; $x < $contents['totalPages'] ; $x++) { 

	array_push($pages, ["href"=>"/contents?".http_build_query(["page"=>$x+1,"search"=>$search,$dtini=>'dtini',$dtfim=>'dtfim']),
						"text"=>$x+1]);
}
 	

 	$pageAdmin= new PageAdmin(array('footer'=>false,"user"=>$u->getValues()),'/views/admin/');

 	$pageAdmin->setTpl("contents",array("contents"=>$contents['data'],
 								  "search"=>$search,'dtini'=>$dtini,'dtfim'=>$dtfim,
 									"pages"=>$pages,'totalPages'=>$contents['totalPages']));



});



/*rota para carregar dados via ajax jquery*/
$app->get('/loadContents', function() {


	
$verify_user=User::verifyLogin();

	/*if($verify_user!='admin'){
		header("Location: /admin/panel");
			
		
			exit;
	}*/

	$u=User::getFromSession();

	$idu=$u->getiduser();
		
	if($u->getinadmin()==1){//se for um admin
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

 			
 			$contents=Content:: getPageSearch($dtini,$dtfim,$idu,$search,$page);	
 			//$contents=Content:: getPageSearch($dtini,$dtfim,$search,$page);	

 		}else{

 			
 			
 				$contents=Content:: getPage($dtini,$dtfim,$idu,$page);
 			//$contents=Content:: getPage($dtini,$dtfim,$page);
 			

 		}

	
 			$pages=[];





$initCount=(isset($_GET['aux2'])) ? (int)$_GET['aux2'] :0;	


 if($contents['totalPages']>5){


 	 	/*auxiliares para ajudar a limitar a paginação*/

 	$limitCount=(isset($_GET['aux'])) ? (int)$_GET['aux'] :5;
 	


 }else{

 		$limitCount=(isset($_GET['aux'])) ? (int)$_GET['aux'] :$contents['totalPages'];

 }

	

//percorrendo as paginas conforma a limitação dos auxiliares
//começa com aux2 =0 aux=5 
for ($x=$initCount; $x < $limitCount ; $x++) { 

	array_push($pages, ["page"=>$x+1,"search"=>$search,$dtini=>'dtini',$dtfim=>'dtfim',"aux"=>$limitCount,"aux2"=>$initCount]);
}





$cont= new Content();

$resp=$cont->limitPagination($search,$dtini,$dtfim,$x,$limitCount,$initCount,$contents['totalPages']);
 
 		
 		echo json_encode(array("contents"=>$contents['data'],
 		"pages"=>$pages,
 		"next"=>$resp['btNext'],
 		"previus"=>$resp['btPrev'],
 		"hidden_next"=>$resp['hidden_next'],
 		"hidden_prev"=>$resp['hidden_prev'],'totalPages'=>$contents['totalPages']));






});
/*end rota para carregar dados via ajax jquery*/




$app->get('/content/insert', function() {

	$verify_user=User::verifyLogin();

	/*if($verify_user!='admin'){
		header("Location: /admin/panel");
			
		
			exit;
	}*/

	$u=User::getFromSession();


	
		
	if($u->getinadmin()==1){//se for um admin
		$blogs=Blog:: listAll();

	}else{

				$idu=$u->getiduser();
				$blogs=Blog:: listAllByIduser($idu);				

	}
	

	

	$pageAdmin= new PageAdmin(array('footer'=>false,"user"=>$u->getValues()),'/views/admin/');

	
	
	
$pageAdmin->setTpl("insert_content",["blogs"=>$blogs,"iduser"=>$_SESSION[User::SESSION]['iduser'],
"deslogin"=>$_SESSION[User::SESSION]['deslogin'],"error"=>User::getMsgError()]);
    
});



$app->post('/content/insert', function() {

	$verify_user=User::verifyLogin();

	/*if($verify_user!='admin'){
		header("Location: /admin/panel");
			
		
			exit;
	}*/


try {
	

	$content = new Content();


 	
 	$content->setData($_POST);

 	
	
	

	
	if($_FILES['imgcontent']['name']!=''){
		$content->save('C:/blog/res/img_contents/');
		$content->changePhoto($_FILES['imgcontent']);
		
	}else{
		
		$content->save('C:/blog/res/img/');	
	}



	User::setMsgError('deu certo');
	
		}catch(Exception $e){

		

			User::setMsgError($e->getMessage());

		

	}


 	header("Location: /content/insert");
 	exit;


    
});




$app->get('/updateCont/:idcontent',function($idcontent) {


	$verify_user=User::verifyLogin();
	$u=User::getFromSession();

	
	$content = new Content();


	$content->get((int)$idcontent);//convertendo o id passado para int
	

	
		
	if($u->getinadmin()==1){//se for um admin
		$blogs=Blog:: listAll();

	}else{

				$idu=$u->getiduser();
				$blogs=Blog:: listAllByIduser($idu);				

	}
	
	

	$pageAdmin= new PageAdmin(array('footer'=>false,"user"=>$u->getValues()),'/views/admin/');

	

	
	


	//$a= str_replace('<br />', "\n", $content->getValues()["content_text"]);


	
	
//$pageAdmin->setTpl("update_content",["content"=>$content->getValues(),"a"=>$a,"error"=>User::getMsgError()]);
	$pageAdmin->setTpl("update_content",["blogs"=>$blogs,"content"=>$content->getValues(),"error"=>User::getMsgError()]);
    
});




$app->post('/updateCont/:idcontent',function($idcontent) {


$verify_user=User::verifyLogin();

	/*if($verify_user!='admin'){
		header("Location: /admin/panel");
			
		
			exit;
	}*/

try{


	

			 		
 	



	$content = new Content();
	
	
	//$_POST['content_text']=str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['content_text'])));
	
	

	$content->setData($_POST);

	if($_FILES['imgcontent']['name']!=''){
		$content->update('C:/AAOC/res/img_contents/');
		$content->changePhoto($_FILES['imgcontent']);
		
	}else{
		$content->update($_POST['imgInfo']);	
	}


	
User::setMsgError('deu certo');
	
		}catch(Exception $e){

		

			User::setMsgError($e->getMessage());

		

	}

 

header("Location: /updateCont/".$content->getidcontent());
 	exit;


    
});



$app->get("/content/delete/:idcontent", function ($idcontent) {

 $verify_user=User::verifyLogin();

	/*if($verify_user!='admin'){
		header("Location: /admin/panel");
			
		
			exit;
	}*/


 $u=User::getFromSession();
	
	

 	



	$content = new Content();

	

	

	
	$content->delete($idcontent);

 	header("Location: /contents");
 	exit;




});








?>