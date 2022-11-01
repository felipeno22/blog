<?php if(!class_exists('Rain\Tpl')){exit;}?>

<div id="divBtVoltar">
<input type="button" id="btlista" name="idlista"  value=" voltar" onclick="voltarLista('comments')" />



</div>

<br>


<div class="divformInfo">


<form  id="idFormInfo" name="idFormInfo"  onsubmit="return insert_update_comment('update')"  class="formInfo" action="/updateComm/<?php echo htmlspecialchars( $comment["idcomment"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
		



	<fieldset>
		
		<legend>Alterar Comentários </legend>


  <?php if( $error!= ''  ){ ?>
  	<?php if( $error== 'deu certo'  ){ ?>
  			<div class="alert alert-success" role="alert">comentario alterado com sucesso!!!</div>
  	<?php }else{ ?>
  			<div class="alert alert-danger" role="alert"><?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
  	<?php } ?>		
 <?php }else{ ?>
		 <div> </div>
 <?php } ?>	
			

			<input type="text" hidden  id="idcomment" name="idcomment"  value="<?php echo htmlspecialchars( $comment["idcomment"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

			<label>Nome::</label>
			<input type="text" id="title" name="title"  value="<?php echo htmlspecialchars( $comment["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" maxlength="64" disabled ><br>


			<label>Comentário:</label><br>
			<textarea id="content_text" name="content_text" maxlength="255" disabled ><?php echo htmlspecialchars( $comment["comment"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea><br>



			<label>Status:</label><br>			
			<select name="status_comment" id="status_comment">
  				<option  <?php if( $comment["status_comment"] == 'aprovado'  ){ ?> selected {/else} <?php } ?> value="aprovado">Aprovado</option>
  				<option  <?php if( $comment["status_comment"] == 'aguardando'  ){ ?> selected {/else} <?php } ?> value="aguardando">Aguardando</option>
  				<option  <?php if( $comment["status_comment"] == 'reprovado'  ){ ?> selected {/else} <?php } ?>  value="reprovado" >Reprovado</option>
  
			</select>

			 

			
			<input type="text" hidden  id="idcontent" name="idcontent" value="<?php echo htmlspecialchars( $comment["idcontent"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">




	</fieldset>




<fieldset>
		
		<legend>Respostas desse comentário </legend>

<div style="overflow-y: scroll;height:200px;">
<table style="border: 1px solid black;background:white;width:100%;">
  <thead >
    <tr>
      <th style="border: 1px solid black" >Nome</th>
      <th style="border: 1px solid black">Resposta</th>
      <th style="border: 1px solid black">Status</th>
    </tr>
  </thead>		
  <tbody>
    
  </tbody>
</table>
</div>


</fieldset>		

			


	
	<input id='btcadInfo' type="submit" value="Alterar">
		<input id='btcadResp'  type="button"  name='btcadResp' onclick="showModalResponse()"  value="Responder"> 

	 <dialog style="border:none; border-radius: .5rem;box-shadow: 0 0 1em rgb(0 0 0 /.3);width:300px" hidden>

	 
	 		<label>Responda aqui esse comentário:</label><br>
	 		<input type="text" id="input_response" name="input_response" style="width: 100%"  ><br>

	 		<label>Status:</label>			
			<select name="sts_comm" id="sts_comm">
  				<option   value="aprovado">Aprovado</option>
  				<option   value="aguardando">Aguardando</option>
  				<option    value="reprovado" >Reprovado</option>
  
			</select><br>


			<input id='btsaveResp'  type="button"  name='btsaveResp' onclick="save_response_dialog('<?php echo htmlspecialchars( $user["deslogin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>','<?php echo htmlspecialchars( $comment["idcomment"], ENT_COMPAT, 'UTF-8', FALSE ); ?>',document.getElementById('input_response').value,document.getElementById('sts_comm').value)"  value="OK">
			<input id='btcloseResp'  type="button"  name='btcloseResp' onclick="closeModalResponse()"  value="Cancelar"> 	 	 	 	

	 </dialog> 
	


</form>




<script  src="../../res/jqueryAjax/responsesAdmJqueryAjax.js" ></script> 
