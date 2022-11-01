<?php if(!class_exists('Rain\Tpl')){exit;}?>

<div id="divBtVoltar">
<input type="button" id="btlista" name="idlista"  value=" voltar" onclick="voltarLista('comments')" />



</div>

<br>


<div class="divformInfo">


<form  id="idFormInfo" name="idFormInfo"  onsubmit="return insert_update_comment('insert')"  class="formInfo" action="/insertComm/" method="post">
		



	<fieldset>
		
		<legend>Cadastrar Comentários </legend>


  <?php if( $error!= ''  ){ ?>
  	<?php if( $error== 'deu certo'  ){ ?>
  			<div class="alert alert-success" role="alert">comentario cadastrado com sucesso!!!</div>
  	<?php }else{ ?>
  			<div class="alert alert-danger" role="alert"><?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
  	<?php } ?>		
 <?php }else{ ?>
		 <div> </div>
 <?php } ?>	
			

		
 		 <label for="content">Selecione um contéudo:</label>

				<select name="content" id="content"  style="width:100%;">
  			
					<?php $counter1=-1;  if( isset($contents) && ( is_array($contents) || $contents instanceof Traversable ) && sizeof($contents) ) foreach( $contents as $key1 => $value1 ){ $counter1++; ?>
  				<option value="<?php echo htmlspecialchars( $value1["idcontent"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
  				<?php } ?>
  				
				</select><br> 


			<label>Nome:</label>
			<input type="text" id="title" name="title"   maxlength="64" value="<?php echo htmlspecialchars( $user["deslogin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>(adm)"  hidden  >


			<label>Comentário:</label><br>
			<textarea id="content_text" name="content_text" maxlength="255"  ></textarea><br>



			<label>Status:</label><br>			
			<select name="status_comment" id="status_comment">
  				<option   value="aprovado">Aprovado</option>
  				<option   value="aguardando">Aguardando</option>
  				<option    value="reprovado" >Reprovado</option>
  
			</select>

			 

			
			




	</fieldset>

			


	
	<input id='btcadInfo' type="submit" value="Cadastrar">


</form>




