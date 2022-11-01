<?php if(!class_exists('Rain\Tpl')){exit;}?>
<div id="divBtVoltar">
<input type="button" id="btlista" name="idlista"  value=" voltar" onclick="voltarParaPainel()" />

<div style="width:400px"></div>
 
 <h2 id="titleList">
    Lista de Contéudo
  </h2>


</div>

<br>

<div  class="tela_lista">


 

   <div class="divsearch">
                <form id="formFilter" action='/contents'>
                  
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
   
  <a id="insertLink" href="/content/insert">Cadastrar Contéudo</a>
  

<!-- Main content -->

 <div id='divIconLoading'>
   <div class="c-loader"></div>  

 </div> 

              <table id="tb" >
                <thead>
                  <tr>
                    <th hidden>ID</th>
                    <th  style="width:250px">Titulo</th>
                    <th style="width:100px">Data</th>
                     <th hidden>iduser</th>
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



  <script  src="../res/jqueryAjax/contentAdmCrudJqueryAjax.js" ></script>