<?php





//use felipeno22\DB\Sql;
use felipeno22\Page;
use felipeno22\PageAdmin;
use felipeno22\Model\Blog;
use felipeno22\Model\Content;
use felipeno22\Model\Comment;
use felipeno22\Model\Response;




$app->get('/blogs/:deslogin', function($deslogin) {

//$sql= new Sql();
//$arr=$sql->select("select * from conselhos");

//echo json_encode($arr);

$page = new  Page();



$pagi= (isset($_GET['page'])) ? (int)$_GET['page'] :1;


// $dtini="2022-10-01";
//$dtfim="2022-10-30";
 		

 			
 			
 		
 				$blogs=Blog::listAllByDesloginOrIduser($deslogin,$pagi);

	/*$pages=[];

for ($x=0; $x < $blogs['totalPages'] ; $x++) { 

	array_push($pages, ["href"=>"/blogs?".http_build_query(["page"=>$x+1,"search"=>'','dtini'=>$dtini,'dtfim'=>$dtfim]),
						"text"=>$x+1]);
}*/
 	
 	



$page->setTpl("index",["deslogin"=>$deslogin,'totalPages'=>$blogs['totalPages']]);




});


$app->get('/contents_blog/:idblog', function($idblog) {

	
	

$page = new  Page();




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
 	
 	



$page->setTpl("contents_by_blog",[//"cont"=>$cont,
									"name_blog"=>$bg[0]['name_blog'],
									"idblog"=>$bg[0]['idblog'],
									'totalPages'=>$cont['totalPages']]);

});



$app->get('/text_content/:idcontent', function($idcontent) {

//$sql= new Sql();
//$arr=$sql->select("select * from conselhos");

//echo json_encode($arr);

	$content = new Content();


	$content->get((int)$idcontent);//convertendo o id passado para int 



$comment = new Comment();

$comment->listAllByIdContent($idcontent);



//echo $content->getValues()['content_text'];

//echo "<br>";
 //echo htmlspecialchars($content->getValues()['content_text']);
 //echo "<br>";
//echo addslashes(htmlspecialchars($content->getValues()['content_text']));
//echo "<br>";
//str_replace("\n",'<br />',addslashes(htmlspecialchars($content->getValues()['content_text'])) );



 //$a=str_replace("\n",'<br />', addslashes(htmlspecialchars()));


//echo json_encode($content->getValues()['content_text']);
//echo "<br>";
//echo $content->getValues()['content_text'];
//exit;
$page = new  Page();

$page->setTpl("text_content",["cont"=>$content->getValues(),"a"=>$content->getValues()['content_text'], "comments"=> $comment->getValues()]);


});




$app->get('/quem_sou', function() {



$page = new  Page(array('footer'=>false,));





$page->setTpl("quem_sou");


});











?>