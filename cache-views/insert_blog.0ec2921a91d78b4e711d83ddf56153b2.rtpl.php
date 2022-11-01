<?php if(!class_exists('Rain\Tpl')){exit;}?>
<div id="divBtVoltar">
<input type="button" id="btlista" name="idlista"  value=" voltar" onclick="voltarLista('blogs')" />



</div>

<br>

<div class="divformInfo">

<form   id="idFormInfo" name="idFormInfo"  onsubmit="return insert_update_blog('insert')" class="formInfo" action="/blog/insert" method="post" enctype="multipart/form-data">
	

	<fieldset>
		
		<legend>Criar Blog</legend>



	
  <?php if( $error!= ''  ){ ?>
  	<?php if( $error== 'deu certo'  ){ ?>
  			<div class="alert alert-success" role="alert">Blog criado com sucesso!!!</div>
  	<?php }else{ ?>
  			<div class="alert alert-danger" role="alert"><?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
  	<?php } ?>		
 <?php }else{ ?>
		 <div> </div>
 <?php } ?>	
		

 		

			<label>Nome:</label>
			<input  type="text" id="title" name="title" maxlength="64" required><br>




		<input type="text" hidden id="iduser" name="iduser" value="<?php echo htmlspecialchars( $iduser, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
			


	</fieldset>

		
	<input id='btcadInfo' type="submit" value="Salvar">


</form>






</div>		


