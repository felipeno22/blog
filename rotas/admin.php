<?php





//use felipeno22\DB\Sql;
use felipeno22\Page;
use felipeno22\PageAdmin;
use \felipeno22\Model\User;
use felipeno22\Model\Blog;
use felipeno22\Model\Content;
use felipeno22\Model\Comment;



$app->get('/', function() {



$pageAdmin = new  PageAdmin(array('header'=>false,'footer'=>false));

$pageAdmin->setTpl("login",["error"=>User::getMsgError()]);


});


$app->get('/login', function() {



$pageAdmin = new  PageAdmin(array('header'=>false,'footer'=>false));

$pageAdmin->setTpl("login",["error"=>User::getMsgError()]);


});




$app->post("/login", function (){
	

try {

	$u=User::login($_POST['login'],$_POST['password']);

	if($u=='logado'){
			User::setMsgError('');
			header("Location: /panel");
			exit;
		}else{
			User::setMsgError($u);
				header("Location: /login");
				exit;
		}


			
} catch (Exception $e) {
			User::setMsgError($e->getMessage());
}		

	
		


});





$app->get('/panel', function() {
User::verifyLogin();

$user=User::getFromSession();


$pageAdmin = new  PageAdmin(["user"=>$user->getValues()]);

if($user->getValues()['inadmin']==1){
	//$bg=Blog::listAll();
	$iduser=0;
}else{
	//$bg=Blog::listAllByIduser((int)$user->getValues()['iduser']);
	$iduser=$user->getValues()['iduser'];
}




$pagi= (isset($_GET['page'])) ? (int)$_GET['page'] :1;


// $dtini="2022-10-01";
//$dtfim="2022-10-30";
 		

 			
 			
 		
 				$blogs=Blog::listAllByDesloginOrIduser($iduser,$pagi);

	/*$pages=[];

for ($x=0; $x < $blogs['totalPages'] ; $x++) { 

	array_push($pages, ["href"=>"/blogs?".http_build_query(["page"=>$x+1,"search"=>'','dtini'=>$dtini,'dtfim'=>$dtfim]),
						"text"=>$x+1]);
}*/
 	
 	



$pageAdmin->setTpl("panel",["iduser"=>$iduser,'totalPages'=>$blogs['totalPages']]);










});





$app->get('/panel_contents/:idblog', function($idblog) {

	User::verifyLogin();

$user=User::getFromSession();

/*$cont=Content::listAllByIdblog($idblog);

	$bg=Blog::listAllByIdblog($idblog);//pegando dados do blog q tem os contéudo

$pageAdmin = new  PageAdmin(["user"=>$user->getValues()]);

	

$pageAdmin->setTpl("panel_contents",["cont"=>$cont,"name_blog"=>$bg[0]['name_blog'],"idblog"=>$bg[0]['idblog']]);*/


$pageAdmin = new  PageAdmin(["user"=>$user->getValues()]);


$pagi= (isset($_GET['page'])) ? (int)$_GET['page'] :1;


// $dtini="2022-10-01";
//$dtfim="2022-10-30";
 		

 			
 			
 		
 				$cont=Content::listAllByIdblog($idblog,$pagi);

	$bg=Blog::listAllByIdblog($idblog,$pagi);//pegando dados do blog q tem os contéudo

	
	/*$pages=[];

for ($x=0; $x < $blogs['totalPages'] ; $x++) { 

	array_push($pages, ["href"=>"/blogs?".http_build_query(["page"=>$x+1,"search"=>'','dtini'=>$dtini,'dtfim'=>$dtfim]),
						"text"=>$x+1]);
}*/
 	
 	



$pageAdmin->setTpl("panel_contents",[//"cont"=>$cont,
									"name_blog"=>$bg[0]['name_blog'],
									"idblog"=>$bg[0]['idblog'],
									'totalPages'=>$cont['totalPages']]);



});




$app->get('/panel_text_content/:idcontent', function($idcontent) {

	User::verifyLogin();

$user=User::getFromSession();

$content = new Content();


	$content->get((int)$idcontent);//convertendo o id passado para int 



$comment = new Comment();

$comment->listAllByIdContent($idcontent);


$pageAdmin = new  PageAdmin(["user"=>$user->getValues()]);

	

$pageAdmin->setTpl("panel_text_content",["cont"=>$content->getValues(),"a"=>$content->getValues()['content_text'], "comments"=> $comment->getValues()]);

});




$app->get('/logout', function() {

	
	User::logout();
	

	header("Location: /login");
	exit;

});



?>