<?php if(!class_exists('Rain\Tpl')){exit;}?>
<div id="divBtVoltar">
<input type="button" id="btlista" name="idlista"  value=" voltar" onclick="voltarLista('users')" />



</div>

<br>



<div id="iddivformUser" class="divformUser">


<!--modal alterar senha-->
<div  id="containerModalSenha"   >
  <!-- conteúdo do modal aqui -->
  
  

 <div id="divtitlemodalSenha">
 		<h3>Alterar Senha:</h3>
 	

 </div>	


 			
 
  
 
   
<div id="contentmodalSenha" >
  
			 		
<form id="idFormUserPass" name="idFormUserPass"  onsubmit="return update_password()" action="/updatepassword/<?php echo htmlspecialchars( $user["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="POST" >
	<input type="text" id="iduser" name="iduser" hidden value="<?php echo htmlspecialchars( $user["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"/>
			<label>Nova Senha:</label>
			<input class="inputsUser" type="text" id="despasswordnovo" name="despasswordnovo" maxlength="50" required /><br>

			<label>Confirme Nova Senha:</label>
			<input class="inputsUser" type="text" id="despasswordnovoconf" name="despasswordnovoconf" maxlength="50" required /><br>

	
        <input type="submit" id="btConcluirSenha"   name="btConcluirSenha" value="CONCLUIR" />
        <input  type="button" id="btCancelarSenha"   name="btCancelarSenha" value="CANCELAR" onclick="close_modalSenha()" />
</form>     

</div>
</div>

<!--end modal alterar senha-->






<form  id="idFormUser" name="idFormUser"  class='formUser'  onsubmit="return insert_update('update')" action="/update/:iduser" method="post">
	


	<fieldset>
		
		<legend>Alterar Usuário</legend>




	
  <?php if( $error!= ''  ){ ?>
  	<?php if( $error== 'deu certo'  ){ ?>
  			<div class="alert alert-success" role="alert">Usuário alterado com sucesso!!!</div>
  	<?php }else{ ?>
  			<div class="alert alert-danger" role="alert"><?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
  	<?php } ?>		
 <?php }else{ ?>
		 <div> </div>
 <?php } ?>	


	 <?php if( $errorPass!= ''  ){ ?>
  	<?php if( $errorPass== 'senha alterada'  ){ ?>
  			<div class="alert alert-success" role="alert">Senha alterada com sucesso!!!</div>
  	<?php }else{ ?>
  			<div class="alert alert-danger" role="alert"><?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
  	<?php } ?>		
 <?php }else{ ?>
		 <div> </div>
 <?php } ?>	

	


			
			<input type="text" id="iduser" name="iduser" hidden value="<?php echo htmlspecialchars( $user["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><br>

			<label>Nome:</label>
			<input class="inputsUser" type="text" id="desperson" name="desperson" value="<?php echo htmlspecialchars( $user["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" maxlength="50" required><br>


			<label>Login:</label>
			<input class="inputsUser" type="text" id="deslogin" name="deslogin" value="<?php echo htmlspecialchars( $user["deslogin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" maxlength="50" required><br>




			<label>Email:</label>
			<input class="inputsUser" type="email" id="desemail" name="desemail" value="<?php echo htmlspecialchars( $user["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" maxlength="100" required><br>

			<label>Telefone:</label>
				<input class="inputsUser" type="tel" id="nrphone" name="nrphone" value="<?php echo htmlspecialchars( $user["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"   maxlength="14" ><br>

			<div>
				Administrador:
				<input type="radio" id="inadmin" name="inadmin" value="1"  <?php if( $user["inadmin"] == 1 ){ ?>checked<?php } ?> >
				<label for="inadmin">Sim</label>
				<input type="radio" id="inadmin" name="inadmin" value="0"   <?php if( $user["inadmin"] == 0 ){ ?>checked<?php } ?> >
				<label for="inadmin">Não</label>
		    </div>

		     <div>
				Status:
				<input type="radio" id="status_user" name="status_user"  value="ativo"  <?php if( $user["status_user"] == 'ativo'  ){ ?>checked<?php } ?> >
				<label for="status_user">Ativo</label>
				<input type="radio" id="status_user" name="status_user" value="inativo"  <?php if( $user["status_user"] == 'inativo'  ){ ?>checked<?php } ?> >
				<label for="status_user">Inativo</label>
		  </div>











<input id='btcadUser' type="submit" value="Alterar">
<input id='btopenModalSenha'  onclick="open_modalSenha()"  type="button" value="Alterar Senha">

	</fieldset>


	




</form>




</div>




