<?php




//use felipeno22\DB\Sql;
use felipeno22\Page;
use felipeno22\PageAdmin;
use felipeno22\Model\Blog;
use felipeno22\Model\Content;
use felipeno22\Model\Comment;


/*rota para carregar dados via ajax jquery*/
/*carrega lista de blogs na pagina publica */
$app->get('/load_blogs', function() {


	
//$verify_user=User::verifyLogin();

	/*if($verify_user!='admin'){
		header("Location: /admin/panel");
			
		
			exit;
	}*/

	

	






 
$pagi= (isset($_GET['page'])) ? (int)$_GET['page'] :1;




			if($_GET['iduser']==0){
		$blogs=Blog::getPage('','',$_GET['iduser'],$pagi);	
	}else{

		$blogs=Blog::listAllByDesloginOrIduser($_GET['iduser'],$pagi);
	}


				$pages=[];





$initCount=(isset($_GET['aux2'])) ? (int)$_GET['aux2'] :0;	


 if($blogs['totalPages']>5){


 	 	/*auxiliares para ajudar a limitar a paginação*/

 	$limitCount=(isset($_GET['aux'])) ? (int)$_GET['aux'] :5;
 	


 }else{

 		$limitCount=(isset($_GET['aux'])) ? (int)$_GET['aux'] : $blogs['totalPages'];

 }

	

//percorrendo as paginas conforma a limitação dos auxiliares
//começa com aux2 =0 aux=5 
for ($x=$initCount; $x < $limitCount ; $x++) { 
		

	array_push($pages, ["page"=>$x+1,"search"=>'','dtini'=>'','dtfim'=>'',"aux"=>$limitCount,"aux2"=>$initCount]);
}





$blo= new Blog();

$resp=$blo->limitPagination('','','',$x,$limitCount,$initCount,$blogs['totalPages']);
 
 		
 		echo json_encode(array("blogs"=>$blogs['data'],
 		"pages"=>$pages,
 		"next"=>$resp['btNext'],
 		"previus"=>$resp['btPrev'],
 		"hidden_next"=>$resp['hidden_next'],
 		"hidden_prev"=>$resp['hidden_prev'],'totalPages'=>$blogs['totalPages']));



	//exit;


	

	//echo json_encode($r);
	//exit;




});
/* end lista de blog */
/*end rota para carregar dados via ajax jquery*/





/*rota para carregar dados via ajax jquery*/
/*carrega lista de blogs na pagina publica */
$app->get('/load_myblogs', function() {


	
//$verify_user=User::verifyLogin();

	/*if($verify_user!='admin'){
		header("Location: /admin/panel");
			
		
			exit;
	}*/

	//echo 'a';


//	echo  json_encode($_GET['idcontent']);


 $dtini="2022-10-01";
$dtfim="2022-10-30";
	
$page= (isset($_GET['page'])) ? (int)$_GET['page'] :1;

		$blogs=Blog::listAllByDesloginOrIduser($_GET['deslogin'],$page);





				$pages=[];





$initCount=(isset($_GET['aux2'])) ? (int)$_GET['aux2'] :0;	


 if($blogs['totalPages']>5){


 	 	/*auxiliares para ajudar a limitar a paginação*/

 	$limitCount=(isset($_GET['aux'])) ? (int)$_GET['aux'] :5;
 	


 }else{

 		$limitCount=(isset($_GET['aux'])) ? (int)$_GET['aux'] : $blogs['totalPages'];

 }

	

//percorrendo as paginas conforma a limitação dos auxiliares
//começa com aux2 =0 aux=5 
for ($x=$initCount; $x < $limitCount ; $x++) { 
		

	array_push($pages, ["page"=>$x+1,"search"=>'','dtini'=>$dtini,'dtfim'=>$dtfim,"aux"=>$limitCount,"aux2"=>$initCount]);
}





$blo= new Blog();

$resp=$blo->limitPagination('',$dtini,$dtfim,$x,$limitCount,$initCount,$blogs['totalPages']);
 
 		
 		echo json_encode(array("blogs"=>$blogs['data'],
 		"pages"=>$pages,
 		"next"=>$resp['btNext'],
 		"previus"=>$resp['btPrev'],
 		"hidden_next"=>$resp['hidden_next'],
 		"hidden_prev"=>$resp['hidden_prev'],'totalPages'=>$blogs['totalPages']));



	//exit;




});
/* end lista de blog */
/*end rota para carregar dados via ajax jquery*/





/*rota para carregar dados via ajax jquery*/
/*enumera contéudo por blog e mostra o número de content by blog na page public */
$app->get('/loadNumContentsByBlogs', function() {


	
//$verify_user=User::verifyLogin();

	/*if($verify_user!='admin'){
		header("Location: /admin/panel");
			
		
			exit;
	}*/

	//echo 'a';

	
	$r=$bg=Blog::listAllByIdblog($_GET['idblog']);

	echo json_encode($r);

	

});
/*enumera contéudo por blog */
/*end rota para carregar dados via ajax jquery*/







////////////////////////////////////////////////////////////////////



/*rota para carregar dados via ajax jquery*/
/*carrega contéudo na pagina publica */
$app->get('/load_contents', function() {


	
//$verify_user=User::verifyLogin();

	/*if($verify_user!='admin'){
		header("Location: /admin/panel");
			
		
			exit;
	}*/

	//echo 'a';


//	echo  json_encode($_GET['idcontent']);



 $dtini="2022-10-01";
$dtfim="2022-10-26";
	
$page= (isset($_GET['page'])) ? (int)$_GET['page'] :1;

			$conts=Content::listAllByIdblog($_GET['idblog'],$page);





				$pages=[];





$initCount=(isset($_GET['aux2'])) ? (int)$_GET['aux2'] :0;	


 if($conts['totalPages']>5){


 	 	/*auxiliares para ajudar a limitar a paginação*/

 	$limitCount=(isset($_GET['aux'])) ? (int)$_GET['aux'] :5;
 	


 }else{

 		$limitCount=(isset($_GET['aux'])) ? (int)$_GET['aux'] : $conts['totalPages'];

 }

	

//percorrendo as paginas conforma a limitação dos auxiliares
//começa com aux2 =0 aux=5 
for ($x=$initCount; $x < $limitCount ; $x++) { 
		

	array_push($pages, ["page"=>$x+1,"search"=>'','dtini'=>$dtini,'dtfim'=>$dtfim,"aux"=>$limitCount,"aux2"=>$initCount]);
}





$con= new Content();

$resp=$con->limitPagination('',$dtini,$dtfim,$x,$limitCount,$initCount,$conts['totalPages']);
 
 		
 		echo json_encode(array("contents"=>$conts['data'],
 		"pages"=>$pages,
 		"next"=>$resp['btNext'],
 		"previus"=>$resp['btPrev'],
 		"hidden_next"=>$resp['hidden_next'],
 		"hidden_prev"=>$resp['hidden_prev'],'totalPages'=>$conts['totalPages']));




});
/* end lista de contéudo */
/*end rota para carregar dados via ajax jquery*/





/*rota para carregar dados via ajax jquery*/
/*enumera comments by content, mostra o num de comentários por contéudo na page public */
$app->post('/loadNumCommentsByContents', function() {


	
//$verify_user=User::verifyLogin();

	/*if($verify_user!='admin'){
		header("Location: /admin/panel");
			
		
			exit;
	}*/

	//echo 'a';

	
	$r=$cont=Content::listAllByIdContent2($_POST['idcontent']);

	echo json_encode($r);

	

});
/*enumera contéudo por blog */
/*end rota para carregar dados via ajax jquery*/

































?>