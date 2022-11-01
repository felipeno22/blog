<?php




use \felipeno22\PageAdmin;
use \felipeno22\Model\User;
use \felipeno22\Model\Blog;




$app->get('/blogs', function() {

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

 			
 			$blogs=Blog:: getPageSearch($dtini,$dtfim,$idu,$search,$page);	
 			

 		}else{

 			
 			
 				$blogs=Blog:: getPage($dtini,$dtfim,$idu,$page);
 			

 		}

	
 			$pages=[];

for ($x=0; $x < $blogs['totalPages'] ; $x++) { 

	array_push($pages, ["href"=>"/blogs?".http_build_query(["page"=>$x+1,"search"=>$search,$dtini=>'dtini',$dtfim=>'dtfim']),
						"text"=>$x+1]);
}
 	

 	$pageAdmin= new PageAdmin(array('footer'=>false,"user"=>$u->getValues()),'/views/admin/');

 	$pageAdmin->setTpl("blogs",array("blogs"=>$blogs['data'],
 								  "search"=>$search,'dtini'=>$dtini,'dtfim'=>$dtfim,
 									"pages"=>$pages,'totalPages'=>$blogs['totalPages']));



});



/*rota para carregar dados via ajax jquery*/
$app->get('/loadBlogs', function() {


	
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

 			
 			$blogs=Blog:: getPageSearch($dtini,$dtfim,$idu,$search,$page);	
 			

 		}else{

 			
 			
 				$blogs=Blog:: getPage($dtini,$dtfim,$idu,$page);
 			

 		}

	
 			$pages=[];





$initCount=(isset($_GET['aux2'])) ? (int)$_GET['aux2'] :0;	


 if($blogs['totalPages']>5){


 	 	/*auxiliares para ajudar a limitar a paginação*/

 	$limitCount=(isset($_GET['aux'])) ? (int)$_GET['aux'] :5;
 	


 }else{

 		$limitCount=(isset($_GET['aux'])) ? (int)$_GET['aux'] :$blogs['totalPages'];

 }

	

//percorrendo as paginas conforma a limitação dos auxiliares
//começa com aux2 =0 aux=5 
for ($x=$initCount; $x < $limitCount ; $x++) { 
	
	array_push($pages, ["page"=>$x+1,"search"=>$search,$dtini=>'dtini',$dtfim=>'dtfim',"aux"=>$limitCount,"aux2"=>$initCount]);
}





$blo= new Blog();

$resp=$blo->limitPagination($search,$dtini,$dtfim,$x,$limitCount,$initCount,$blogs['totalPages']);
 
 		
 		echo json_encode(array("blogs"=>$blogs['data'],
 		"pages"=>$pages,
 		"next"=>$resp['btNext'],
 		"previus"=>$resp['btPrev'],
 		"hidden_next"=>$resp['hidden_next'],
 		"hidden_prev"=>$resp['hidden_prev'],'totalPages'=>$blogs['totalPages']));






});
/*end rota para carregar dados via ajax jquery*/




$app->get('/blog/insert', function() {

	$verify_user=User::verifyLogin();

	/*if($verify_user!='admin'){
		header("Location: /admin/panel");
			
		
			exit;
	}*/

	$u=User::getFromSession();
	



	$pageAdmin= new PageAdmin(array('footer'=>false,"user"=>$u->getValues()),'/views/admin/');

	
	
	
$pageAdmin->setTpl("insert_blog",["iduser"=>$_SESSION[User::SESSION]['iduser'],
"deslogin"=>$_SESSION[User::SESSION]['deslogin'],"error"=>User::getMsgError()]);
    
});



$app->post('/blog/insert', function() {

	$verify_user=User::verifyLogin();

	/*if($verify_user!='admin'){
		header("Location: /admin/panel");
			
		
			exit;
	}*/


try {
	
	

				
 		



	$blog = new Blog();


 	
 	$blog->setData($_POST);

 	
	
	

 	for($o=41; $o <=60; $o++){

 		$title='test novo'.$o;
 		$blog->save($title,$_POST['iduser']);	

 	}
		
		//$blog->save($_POST['title'],$_POST['iduser']);	
	



	User::setMsgError('deu certo');
	
		}catch(Exception $e){

		

			User::setMsgError($e->getMessage());

		

	}


 	header("Location: /blog/insert");
 	exit;


    
});




$app->get('/updateBlog/:idblog',function($idblog) {


	$verify_user=User::verifyLogin();
	$u=User::getFromSession();

	
	$blog = new Blog();


	$blog->get((int)$idblog);//convertendo o id passado para int 
	

	$pageAdmin= new PageAdmin(array('footer'=>false,"user"=>$u->getValues()),'/views/admin/');
	

	

	
	


	//$a= str_replace('<br />', "\n", $content->getValues()["content_text"]);


	
	
//$pageAdmin->setTpl("update_content",["content"=>$content->getValues(),"a"=>$a,"error"=>User::getMsgError()]);
	$pageAdmin->setTpl("update_blog",["blog"=>$blog->getValues(),"error"=>User::getMsgError()]);
    
});




$app->post('/updateBlog/:idblog',function($idblog) {


$verify_user=User::verifyLogin();

	/*if($verify_user!='admin'){
		header("Location: /admin/panel");
			
		
			exit;
	}*/

try{


	

			 		
 	



	$blog = new Blog();
	
	
	//$_POST['content_text']=str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['content_text'])));
	
	

	$blog->setData($_POST);

		$blog->update($_POST['idblog'],$_POST['title']);	


	
User::setMsgError('deu certo');
	
		}catch(Exception $e){

		

			User::setMsgError($e->getMessage());

		

	}

 

header("Location: /updateBlog/".$blog->getidblog());
 	exit;


    
});



$app->get("/blog/delete/:idblog", function ($idblog) {

 $verify_user=User::verifyLogin();

	/*if($verify_user!='admin'){
		header("Location: /admin/panel");
			
		
			exit;
	}*/


 $u=User::getFromSession();
	
	

 	



	$blog= new Blog();

	

	

	
	$blog->delete($idblog);

 	header("Location: /blogs");
 	exit;




});








?>