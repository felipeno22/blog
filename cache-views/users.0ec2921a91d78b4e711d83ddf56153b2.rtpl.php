<?php if(!class_exists('Rain\Tpl')){exit;}?>

<div id="divBtVoltar">
<input type="button" id="btlista" name="idlista"  value=" voltar" onclick="voltarParaPainel()" />

<div style="width:400px"></div>
 
 <h2 id="titleList">
    Lista de Usuários
  </h2>


</div>

<br>

<div class="tela_lista">

 

  <div class="divsearch">
                <form id="formFilter" action="/users">
                 
                      <label for="inputbuscaUser">Descrição:</label>
                    <input  id="inputbuscaUser" type="text" name="search"  placeholder="buscador" value="<?php echo htmlspecialchars( $search, ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                     <label for="status">Status:</label>

                    <select class='status' name="status" id="status">
                           <option <?php if( $status=='todos' ){ ?>selected<?php } ?> value="todos">Todos</option>
                          <option  <?php if( $status=='ativo' ){ ?>selected<?php } ?> value="ativo">Ativo</option>
                          <option   <?php if( $status=='inativo' ){ ?>selected<?php } ?> value="inativo">Inativo</option>
                    </select> 


                     <label for="admin">Administrador:</label>
                    <select class='admin' name="admin" id="admin">
                          <option <?php if( $admin=='todos' ){ ?>selected<?php } ?> value="todos">Todos</option>
                          <option <?php if( $admin=='1' ){ ?>selected<?php } ?> value="1">Sim</option>
                          <option  <?php if( $admin=='0' ){ ?>selected<?php } ?> value="0">Não</option>
                    </select> 


                    <button id="btbusca" type="submit" ><i class="fa fa-search">buscar</i></button>
                    
                  
                </form>
     </div>  

<input  id="inputTotalPages" type="text"   hidden value="<?php echo htmlspecialchars( $totalPages, ENT_COMPAT, 'UTF-8', FALSE ); ?>">

  <a id="insertLink"  href="/user/insert">Cadastrar Usuário</a>
   <div class="box-tools">
                

  
  <?php if( $error!= ''  ){ ?>
  
      
        <div class="alert alert-danger" role="alert"><?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
       
 <?php }else{ ?>
     <div> </div>
 <?php } ?>  
    

<!-- Main content -->

 <div id='divIconLoading'>
   <div class="c-loader"></div>  

 </div> 
              <table id="tb" >
                <thead>
                  <tr>
                    <th hidden style="width: 10px">ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Login</th>
                     <th>Status</th>
                     <th>Admin</th>
                    <th  style="width: 200px;">Opções</th>
                  </tr>
                </thead>
                <tbody>
                   
                   
                 
                </tbody>
              </table>

               

<!-- /.content -->
</div>

 <!-- /.box-body -->
             <div class="divpagination">
              <ul class="ulpagination">

               
              </ul>
            </div>
<!-- /.content-wrapper -->


 <script  src="../res/jqueryAjax/usersJqueryAjax.js" ></script> 