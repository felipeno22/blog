<?php if(!class_exists('Rain\Tpl')){exit;}?>

<div id="container_admin">
   <article>

       <div id="div_content" >

           <h2>Meus blogs</h2>
           <input type="text" id="iduser" name="iduser" value="<?php echo htmlspecialchars( $iduser, ENT_COMPAT, 'UTF-8', FALSE ); ?> " hidden>

         <div id="listblogs">



           </div>

                <input  id="inputTotalPages" type="text"   hidden value="<?php echo htmlspecialchars( $totalPages, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                
                
                
                <div id="container_pagination">

                   <div id="div_pagi_left">


                   </div>
            
                    <div id="_home_page" >
                        
                   
                          
                            <ul class="ulpagination">
                            <!--paginacao, agora via ajax-->
                            </ul>
                        
                              
            
                    </div>
            
                        <div id="div_pagi_right">


                    </div>
            

             
            
                   </div>

                

       </div> 

       




   </article> 

</div>

<script  src="../../res/jqueryAjax/blogsAdmJqueryAjax.js" ></script>