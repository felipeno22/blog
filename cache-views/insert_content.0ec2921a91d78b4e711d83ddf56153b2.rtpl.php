<?php if(!class_exists('Rain\Tpl')){exit;}?>
<div id="divBtVoltar">
<input type="button" id="btlista" name="idlista"  value=" voltar" onclick="voltarLista('contents')" />



</div>

<br>

<div class="divformInfo">

<form   id="idFormInfo" name="idFormInfo"  onsubmit="return insert_update_content('insert')" class="formInfo" action="/content/insert" method="post" enctype="multipart/form-data">
	

	<fieldset>
		
		<legend>Criar Contéudo do Blog</legend>



	
  <?php if( $error!= ''  ){ ?>
  	<?php if( $error== 'deu certo'  ){ ?>
  			<div class="alert alert-success" role="alert">Contéudo criado com sucesso!!!</div>
  	<?php }else{ ?>
  			<div class="alert alert-danger" role="alert"><?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
  	<?php } ?>		
 <?php }else{ ?>
		 <div> </div>
 <?php } ?>	
		
 			 <label for="blogs">Selecione um blog:</label>

				<select name="blogs" id="blogs"  style="width:100%;" required>
  			
					<?php $counter1=-1;  if( isset($blogs) && ( is_array($blogs) || $blogs instanceof Traversable ) && sizeof($blogs) ) foreach( $blogs as $key1 => $value1 ){ $counter1++; ?>
  				<option value="<?php echo htmlspecialchars( $value1["idblog"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["name_blog"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
  				<?php } ?>
  				
				</select><br> 
 		

			<label>Titulo:</label>
			<input  type="text" id="title" name="title" maxlength="64" required><br>


			<label>Informação:</label><br>
			<textarea    id="content_text" name="content_text" maxlength="255"   required></textarea><br>


			<label>Data :</label>
			 <input  type="date" id="dtcontent" name="dtcontent" required><br>



			 <label>Foto:</label>
			 <input type="file" id="imgcontent" name="imgcontent" accept="image/*" onchange="mostraImg()" ><br>
			 <img class="img-responsive" id="image-previewInfo"  name="image-previewInfo" src="/../../res/img/blog.jpg"  alt="image not found"><br>

			 <label>Legenda imagem:</label>
			<input  type="text" id="legendimg" name="legendimg" maxlength="64" ><br>

			


	</fieldset>

		
	<input id='btcadInfo' type="submit" value="Salvar">


</form>






</div>		



<script>
        $(document).ready(function() {
        
            var campo = document.querySelector('textarea');
			campo.value = '';

        });



    </script>