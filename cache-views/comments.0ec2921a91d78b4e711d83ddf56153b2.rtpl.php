<?php if(!class_exists('Rain\Tpl')){exit;}?>
<div id="divBtVoltar">
<input type="button" id="btlista" name="idlista"  value=" voltar" onclick="voltarParaPainel()" />

<div style="width:400px"></div>
 
 <h2 id="titleList">
    Lista de Comentários
  </h2>


</div>

<br>

<div  class="tela_lista">


 

   <div class="divsearch">
                <form id="formFilter" action='/loadCommentsAdm'>
                  
                    <label for="inputbusca">Descrição</label>
                    <input  id="inputbusca" type="text" name="search"  placeholder="buscador" value="<?php echo htmlspecialchars( $search, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    
                    <label  for="dtiniinfo" >De:</label>
                    <input  type="date" id="dtiniinfo" name="dtiniinfo" value="<?php echo htmlspecialchars( $dtini, ENT_COMPAT, 'UTF-8', FALSE ); ?>" >
                    
                    <label  for="dtfinalinfo" >Até:</label>
                    <input  type="date" id="dtfinalinfo" name="dtfinalinfo"  value="<?php echo htmlspecialchars( $dtfim, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    

                    <button id="btbusca" type="submit" ><i class="fa fa-search">buscar</i></button>
                    
                  
                </form>
     </div>  

   
<input  id="inputTotalPages" type="text"   hidden value="<?php echo htmlspecialchars( $totalPages, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
   
  <a id="insertLink" href="/insertComm/">Cadastrar seu comentário</a>
  

<!-- Main content -->

 <div id='divIconLoading'>
   <div class="c-loader"></div>  

 </div> 

              <table id="tb" >
                <thead>
                  <tr>
                    <th hidden>ID</th>
                    <th  style="width:250px">Name</th>
                    <th style="width:100px">Data</th>
                    <th style="width:100px">Status</th>
                     <th hidden>idcontent</th>
                    <th >Opções</th>
                  </tr>
                </thead>
                <tbody>
                   <!--sem dados, agora alimenta via ajax-->
                </tbody>
              </table>

              
                <!-- /.box-body -->
             <div class="divpagination">
              <ul class="ulpagination">
                <!--paginacao, agora via ajax-->
              </ul>
            </div>

<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<dialog id="dialog_detail_comm" hidden>



<div id="divBtVoltar">



</div>

<br>


<div class="divformInfo">


<form  id="idFormInfo" name="idFormInfo"    class="formInfo">
    



  <fieldset>
    
    <legend>Detalhes do comentário </legend>


  
      <input type="text"  hidden id="idcomment" name="idcomment" >
      

      <label>Nome::</label>
      <input type="text" id="title" name="title"   maxlength="64" disabled ><br>


      <label>Comentário:</label><br>
      <textarea id="content_text" name="content_text" maxlength="255" disabled ></textarea><br>



      <label>Status: </label><br><input type="text" id="input_sts" name="input_sts"  disabled>
      



  </fieldset>


<fieldset>
    
    <legend>Respostas desse comentário </legend>

<div style="overflow-y: scroll;height:200px;">
<table id="commresp" style="border: 1px solid black;background:white;width:100%;">
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


<input id='btcadResp'  type="button"  name='btcadResp' onclick="showModalResponse()"  value="Responder">
<input type="button" id="btlista" name="idlista"  value="cancelar"  onclick="closeModalComment()" />

   <dialog id="dialog_add_resp" style="border:none; border-radius: .5rem;box-shadow: 0 0 1em rgb(0 0 0 /.3);width:300px" hidden>

   
      <label>Responda aqui esse comentário:</label><br>
      <input type="text" id="input_response" name="input_response" style="width: 100%"  ><br>

      <label>Status:</label>      
      <select name="sts_comm" id="sts_comm">
          <option   value="aprovado">Aprovado</option>
          <option   value="aguardando">Aguardando</option>
          <option    value="reprovado" >Reprovado</option>
  
      </select><br>


      <input id='btsaveResp'  type="button"  name='btsaveResp'  onclick="save_response_dialog('<?php echo htmlspecialchars( $user["deslogin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>',document.getElementById('idcomment').value,document.getElementById('input_response').value,document.getElementById('sts_comm').value)"  value="OK">
      <input id='btcloseResp'  type="button"  name='btcloseResp' onclick="closeModalResponse()"  value="Cancelar">        

   </dialog> 






</form>

 

</dialog>

 
 <script  src="../res/jqueryAjax/commentsAdmJqueryAjax.js" ></script>
    <script  src="../../res/jqueryAjax/responsesAdmJqueryAjax.js" ></script>