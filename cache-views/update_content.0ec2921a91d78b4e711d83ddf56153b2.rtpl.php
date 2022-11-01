<?php if(!class_exists('Rain\Tpl')){exit;}?>

<div id="divBtVoltar">
<input type="button" id="btlista" name="idlista"  value=" voltar" onclick="voltarLista('contents')" />



</div>

<br>


<div class="divformInfo">


<form  id="idFormInfo" name="idFormInfo"  onsubmit="return insert_update_content('update')"  class="formInfo" action="/updateCont/:idcontent" method="post" enctype="multipart/form-data">
		



	<fieldset>
		
		<legend>Alterar Contéudo do Blog </legend>


  <?php if( $error!= ''  ){ ?>
  	<?php if( $error== 'deu certo'  ){ ?>
  			<div class="alert alert-success" role="alert">Notícia alterada com sucesso!!!</div>
  	<?php }else{ ?>
  			<div class="alert alert-danger" role="alert"><?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
  	<?php } ?>		
 <?php }else{ ?>
		 <div> </div>
 <?php } ?>	
			
			 <label for="blogs">Selecione um blog:</label>

				<select name="blogs" id="blogs"  style="width:100%;" required>
  			
					<?php $counter1=-1;  if( isset($blogs) && ( is_array($blogs) || $blogs instanceof Traversable ) && sizeof($blogs) ) foreach( $blogs as $key1 => $value1 ){ $counter1++; ?>
  				<option <?php if( $value1["idblog"] ==$content["idblog"] ){ ?> selected {/else} <?php } ?> value="<?php echo htmlspecialchars( $value1["idblog"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["name_blog"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
  				<?php } ?>
  				
				</select><br> 

			<input type="text" hidden  id="idcontent" name="idcontent"  value="<?php echo htmlspecialchars( $content["idcontent"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

			<label>Titulo:</label>
			<input type="text" id="title" name="title"  value="<?php echo htmlspecialchars( $content["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" maxlength="64" required><br>


			<label>Informação:</label><br>
			<textarea id="content_text" name="content_text" maxlength="255" required><?php echo htmlspecialchars( $content["content_text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea><br>


			<label>Data :</label>
			 <input type="date" id="dtcontent" name="dtcontent" value="<?php echo htmlspecialchars( $content["dtcontent"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required><br>

			


			 <label>Foto:</label>
			 <input type="file" id="imgcontent" name="imgcontent" accept="image/*" onchange="mostraImg()" ><br>
			 <img class="img-responsive" id="image-previewInfo"  name="image-previewInfo" src="<?php echo htmlspecialchars( $content["imgcontent"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="image not found"><br>

			  <label>Legenda imagem:</label>
			<input  type="text" id="legendimg" name="legendimg" maxlength="64"  value="<?php echo htmlspecialchars( $content["legendimg"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" ><br>


			<input type="text" hidden  id="imgInfo" name="imgInfo" value="<?php echo htmlspecialchars( $content["imgcontent"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
			


	</fieldset>

	
	<input id='btcadInfo' type="submit" value="Alterar">


</form>


<script>
      
        var campo = document.querySelector('textarea');
			campo.value = "<?php echo htmlspecialchars( $content["content_text"], ENT_COMPAT, 'UTF-8', FALSE ); ?>";
    </script>