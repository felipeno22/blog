<?php




use \felipeno22\PageAdmin;
use \felipeno22\Model\User;




$app->get('/users', function() {

	$verify_user=User::verifyLogin();

	/*if($verify_user!='admin'){
		header("Location: /panel");
			
		
			exit;
	}*/

	$u=User::getFromSession();

		$search= (isset($_GET['search'])) ? $_GET['search'] :'';


		$status='todos';

		if(isset($_GET['status']) &&  $_GET['status']!='todos' ){

			if($_GET['status']=='ativo')
				$status='ativo';				
			if($_GET['status']=='inativo')
				$status='inativo';	



		}
		

		$admin='todos';

		if(isset($_GET['admin']) &&  $_GET['admin']!='todos' ){

			if($_GET['admin']=='1')
				$admin='1';				
			if($_GET['admin']=='0')
				$admin='0';	



		}



 	$page= (isset($_GET['page'])) ? (int)$_GET['page'] :1;


 		if($search != ''){

 		$users=User:: getPageSearch($admin,$status,$search,$page);	

 		}else{


 		$users=User:: getPage($admin,$status,$page);

 		}

	
 			$pages=[];

for ($x=0; $x < $users['totalPages'] ; $x++) { 

	array_push($pages, ["href"=>"users?".http_build_query(["page"=>$x+1,"search"=>$search,"admin"=>$admin,"status"=>$status]),
						"text"=>$x+1]);
}
 	



$pageAdmin = new  PageAdmin(["user"=>$u->getValues()]);


 	$pageAdmin->setTpl("users",array("users"=>$users['data'],
 								  "search"=>$search,
 								  "admin"=>$admin,
 								  "status"=>$status,
 									"pages"=>$pages,"error"=>User::getMsgError(),'totalPages'=>$users['totalPages']));



	



    
});




/*rota para carregar dados via ajax jquery*/
$app->get('/loadUsers', function() {

$verify_user=User::verifyLogin();

	/*if($verify_user!='admin'){
		header("Location: /panel");
			
		
			exit;
	}*/



	$search= (isset($_GET['search'])) ? $_GET['search'] :'';
	

	$status='todos';

		if(isset($_GET['status']) &&  $_GET['status']!='todos' ){

			if($_GET['status']=='ativo')
				$status='ativo';				
			if($_GET['status']=='inativo')
				$status='inativo';	



		}
		

		$admin='todos';

		if(isset($_GET['admin']) &&  $_GET['admin']!='todos' ){

			if($_GET['admin']=='1')
				$admin='1';				
			if($_GET['admin']=='0')
				$admin='0';	



		}


 	


 	$page= (isset($_GET['page'])) ? (int)$_GET['page'] :1;

 	

 	if($search != ''){

 		$users=User:: getPageSearch($admin,$status,$search,$page);	

 		}else{


 		$users=User:: getPage($admin,$status,$page);

 		}



 			$pages=[];




$initCount=(isset($_GET['aux2'])) ? (int)$_GET['aux2'] :0;	


 if($users['totalPages']>5){


 	 	/*auxiliares para ajudar a limitar a paginação*/

 	$limitCount=(isset($_GET['aux'])) ? (int)$_GET['aux'] :5;
 	


 }else{

 		$limitCount=(isset($_GET['aux'])) ? (int)$_GET['aux'] :$users['totalPages'];

 }

	

//percorrendo as paginas conforma a limitação dos auxiliares
//começa com aux2 =0 aux=5 
for ($x=$initCount; $x < $limitCount ; $x++) { 

	array_push($pages, ["page"=>$x+1,"search"=>$search,"status"=>$status,"admin"=>$admin,"aux"=>$limitCount,"aux2"=>$initCount]);
}





$use= new User();

$resp=$use->limitPagination($search,$status,$admin,$x,$limitCount,$initCount,$users['totalPages']);
 
 		
 		echo json_encode(array("users"=>$users['data'],
 		"pages"=>$pages,
 		"next"=>$resp['btNext'],
 		"previus"=>$resp['btPrev'],
 		"hidden_next"=>$resp['hidden_next'],
 		"hidden_prev"=>$resp['hidden_prev'],'totalPages'=>$users['totalPages']));






});
/*end rota para carregar dados via ajax jquery*/






$app->get('/user/insert', function() {

	$verify_user=User::verifyLogin();

	/*if($verify_user!='admin'){
		header("Location: /panel");
			
		
			exit;
	}*/

	$user=User::getFromSession();


	$pageAdmin= new PageAdmin(array('footer'=>false,"user"=>$user->getValues()),'/views/admin/');


$pageAdmin->setTpl("insert_user",["error"=>User::getMsgError()]);
    
});



$app->post('/user/insert', function() {

	$verify_user=User::verifyLogin();

	/*if($verify_user!='admin'){
		header("Location: /panel");
			
		
			exit;
	}*/

	
try {

	$user = new User();
	



 

 	if(!isset($_POST["inadmin"])){
 		$_POST["inadmin"]='0';

 	} 

 	if(!isset($_POST["status_user"])){
 		$_POST["status_user"]='inativo';

 	} 



 	$user->setData($_POST);

 	
 	
	
	$u=$user->save();

	


	

if($u!=0){//se o retorno nao for zero houve alteração entao pode alterar os conselhos tbm



User::setMsgError('deu certo');

}else{


User::setMsgError('Usuário e/ou email ja existem !!!');


}

	
	
}catch(Exception $e){

		

			User::setMsgError($e->getMessage());

		

	}

 	header("Location: /user/insert");
 	exit;


    
});




$app->get('/update/:iduser',function($iduser) {
	$verify_user=User::verifyLogin();

	/*if($verify_user!='admin'){
		header("Location: /panel");
			
		
			exit;
	}*/
	$u=User::getFromSession();
	$user = new User();

	

	$user->get((int)$iduser);//convertendo o id passado para int 
	
	



	
	

	
	$pageAdmin= new PageAdmin(array('footer'=>false,'inadmin'=>$u->getinadmin(),"user"=>$user->getValues()),'/views/admin/');
	

	

	
$pageAdmin->setTpl("update_user",["user"=>$user->getValues(),"error"=>User::getMsgError(),"errorPass"=>User::getMsgPassError()]);
    
});




$app->post('/update/:iduser',function($iduser) {


$verify_user=User::verifyLogin();

/*	if($verify_user!='admin'){
		header("Location: /panel");
			
		
			exit;
	}*/
try{

	$user = new User();
	
	



	$user->setData($_POST);

	//var_dump($user);
	$u=$user->update();
	
	

if($u!=0){



User::setMsgError('deu certo');
}else{

User::setMsgError('Usuário e/ou email ja existe !!');

}




	
		}catch(Exception $e){

		

			User::setMsgError($e->getMessage());

		

	}




 header("Location:/update/".$user->getiduser());
 	exit;


    
});



$app->get("/user/delete/:iduser", function ($iduser) {

 $verify_user=User::verifyLogin();

	/*if($verify_user!='admin'){
		header("Location: /panel");
			
		
			exit;
	}*/


	$user = new User();

	

	

	

	
	if($user->delete($iduser)==[]){

		User::setMsgError('');


	}else{

			User::setMsgError('Esse usuário possui conselhos,competências,legislações e/ou notícias vinculadas!!');
	}


 	header("Location: /users");
 	exit;




});


$app->post("/updatepassword/:iduser", function($iduser){

	$verify_user=User::verifyLogin();

	/*if($verify_user!='admin'){
		header("Location: /panel");
			
		
			exit;
	}*/


try{
	$user = new User();


	$id_user=$user->updatepassword($iduser,$_POST['despasswordnovo'],$_POST['despasswordnovoconf']);
	
	if($id_user!=0){

		User::setMsgPassError('senha alterada');

	}else{

		User::setMsgPassError('erro ao alterar senha!!');

	}



		
		}catch(Exception $e){

		

			User::setMsgPassError($e->getMessage());

		

	}


 
 header("Location:/update/".$id_user);
 	exit;




});


$app->post("/myupdatepassword/:iduser", function($iduser){

	$verify_user=User::verifyLogin();

	/*if($verify_user!='comum'){
		header("Location: /panel");
			
		
			exit;
	}*/


try{
	$user = new User();


	$id_user=$user->updatepassword($iduser,$_POST['despasswordnovo'],$_POST['despasswordnovoconf']);
	
	if($id_user!=0){

		User::setMsgPassError('senha alterada');

	}else{

		User::setMsgPassError('erro ao alterar senha!!');

	}



		
		}catch(Exception $e){

		

			User::setMsgPassError($e->getMessage());

		

	}


 
 header("Location: /myuserupdate");
 	exit;






});




?>