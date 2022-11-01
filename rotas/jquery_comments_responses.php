<?php



//use felipeno22\DB\Sql;
use felipeno22\Page;
use felipeno22\PageAdmin;
use felipeno22\Model\Blog;
use felipeno22\Model\Content;
use felipeno22\Model\Comment;
use felipeno22\Model\Response;


/*rota para carregar dados via ajax jquery*/
/*carrega comentários da pagina publica */
$app->get('/loadComments', function() {


	
//$verify_user=User::verifyLogin();

	/*if($verify_user!='admin'){
		header("Location: /admin/panel");
			
		
			exit;
	}*/

	//echo 'a';

$comment= new Comment();

//	echo  json_encode($_GET['idcontent']);

	$r=$comment->listAllByIdContent($_GET['idcontent']);

	echo json_encode($r);
	//exit;




});
/*end rota para carregar dados via ajax jquery*/
/*insere comentários na página publica*/
$app->post('/insertComments', function() {

$comment = new Comment();


 	
 	$comment->setData($_POST);



 	
	
	

	
		$comment->save($_POST['name'],$_POST['comment'],$_POST['idcontent']);


	echo "salvo";

	exit;



 	


});




$app->post('/updateComments/:idcomment', function($idcomment){

$comment = new Comment();


 	
 	//$comment->setData($_POST);

 		$comm="alterado o comentario";

 		$idcomment=1;

 		$idcontent=33;
	
	

	
		$comment->update($comm,$idcontent,$idcomment);


		echo "alterado";
		
		exit;	


});



$app->get("/comment/delete/:idcomment", function ($idcomment) {

 //$verify_user=User::verifyLogin();

	

 //$u=User::getFromSession();
	
	

 	



	$comment = new Comment();

	

	
$comment->delete_responsesByIdcomment($idcomment);
	
	$comment->delete($idcomment);



header("Location: /comments");
 	exit;


});




/**************************************************************************************************************************/


/*rota para carregar dados via ajax jquery*/
/*carrega respostas dos comentários na página publica */
$app->get('/loadResponses', function() {


	

	
//$verify_user=User::verifyLogin();

	/*if($verify_user!='admin'){
		header("Location: /admin/panel");
			
		
			exit;
	}*/

	//echo 'a';

$response= new Response();


	$r=$response->listAllByIdComment($_GET['idcomment']);

	echo json_encode($r);
	//exit;




});
/*end rota para carregar dados via ajax jquery*/









$app->post('/updateRespComments', function() {

$response = new Response();


 	//$response->setData($_POST);


$response->update_status($_POST['idresponse'],$_POST['status_response']);


	echo json_encode($_POST['idresponse']." foi alterado !!!");

 		exit;
	
	

 	


});








$app->post('/deleteRespComments', function() {

$response = new Response();


 	//$response->setData($_POST);


$response->delete($_POST['idresponse']); 


	echo json_encode($_POST['idresponse']." foi excluido !!!");

 		exit;
	
	

 	


});





/*rota para carregar dados via ajax jquery*/
$app->get('/loadResponsesAdm', function() {

	


	
//$verify_user=User::verifyLogin();

	/*if($verify_user!='admin'){
		header("Location: /admin/panel");
			
		
			exit;
	}*/


$response= new Response();

echo json_encode($response->listAllResponseByIdComment($_GET['idresponse']));
exit();


 	






});
/*end rota para carregar dados via ajax jquery*/




















?>