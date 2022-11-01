<?php if(!class_exists('Rain\Tpl')){exit;}?>

<div id="divBtVoltar">
<input type="button" id="btlista" name="idlista"  value=" voltar" onclick="voltarLista('blogs')" />



</div>

<br>


<div class="divformInfo">


<form  id="idFormInfo" name="idFormInfo"  onsubmit="return insert_update_blog('update')"  class="formInfo" action="/updateBlog/:idblog" method="post" enctype="multipart/form-data">
		



	<fieldset>
		
		<legend>Alterar Blog </legend>


  <?php if( $error!= ''  ){ ?>
  	<?php if( $error== 'deu certo'  ){ ?>
  			<div class="alert alert-success" role="alert">Blog alterada com sucesso!!!</div>
  	<?php }else{ ?>
  			<div class="alert alert-danger" role="alert"><?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
  	<?php } ?>		
 <?php }else{ ?>
		 <div> </div>
 <?php } ?>	
			

			<input type="text" hidden  id="idblog" name="idblog"  value="<?php echo htmlspecialchars( $blog["idblog"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

			<label>Nome:</label>
			<input type="text" id="title" name="title"  value="<?php echo htmlspecialchars( $blog["name_blog"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" maxlength="64" required><br>



			<label>Data de criação :</label>
			 <input type="date" id="dtcontent" name="dtcontent" value="<?php echo htmlspecialchars( $blog["dtblog"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled><br>

			
			<input type="text" hidden  id="iduser" name="iduser" value="<?php echo htmlspecialchars( $blog["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
			


	</fieldset>

	
	<input id='btcadInfo' type="submit" value="Alterar">


</form>
