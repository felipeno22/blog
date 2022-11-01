<?php if(!class_exists('Rain\Tpl')){exit;}?>
<div id="divBtVoltar">
<input type="button" id="btlista" name="idlista"  value=" voltar" onclick="voltarLista('users')" />



</div>

<br>

<div id="iddivformUser" class="divformUser">




<form id="idFormUser" name="idFormUser"  onsubmit="return insert_update('insert')"  class='formUser' action="/user/insert" method="post">
	




	<fieldset>
		
		<legend>Cadastrar Usuário</legend>
			


	
  <?php if( $error!= ''  ){ ?>
  	<?php if( $error== 'deu certo'  ){ ?>
  			<div class="alert alert-success" role="alert">Usuário cadastrado com sucesso!!!</div>
  	<?php }else{ ?>
  			<div class="alert alert-danger" role="alert"><?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
  	<?php } ?>		
 <?php }else{ ?>
		 <div> </div>
 <?php } ?>	
	
  

  	

	
			<label>Nome:</label>
			<input class="inputsUser" type="text" id="desperson" name="desperson" maxlength="50" required><br>


			<label>Login:</label>
			<input class="inputsUser" type="text" id="deslogin" name="deslogin" maxlength="50" required><br>


			<label>Senha:</label>
			<input class="inputsUser" type="text" id="despassword" name="despassword" maxlength="50" required><br>


			<label>Email:</label>
			<input class="inputsUser" type="email" id="desemail" name="desemail" maxlength="100" required><br>

			<label>Telefone:</label>
			<input class="inputsUser" type="tel" id="nrphone" name="nrphone"     maxlength="14" ><br>
			
			<div>
				Administrador:
				<input type="radio" id="inadmin" name="inadmin"  value="1">
				<label for="inadmin">Sim</label>
				<input type="radio" id="inadmin" name="inadmin"   checked value="0">
				<label for="inadmin">Não</label>
		  </div>

		  <div>
				Status:
				<input type="radio" id="status_user" name="status_user" checked value="ativo">
				<label for="status">Ativo</label>
				<input type="radio" id="status_user" name="status_user" value="inativo">
				<label for="status">Inativo</label>
		  </div>



<br>


<input id='btcadUser' type="submit" value="Salvar">


	</fieldset>



</form>




</div>


