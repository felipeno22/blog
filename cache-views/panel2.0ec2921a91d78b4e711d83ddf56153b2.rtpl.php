<?php if(!class_exists('Rain\Tpl')){exit;}?><div id="container_admin">
   <article>

       <div id="div_content" >

        <h2>Contéudos do blog <?php echo htmlspecialchars( $name_blog, ENT_COMPAT, 'UTF-8', FALSE ); ?>:</h2>

              <input type="text" id="idblog" name="idblog" value="<?php echo htmlspecialchars( $idblog, ENT_COMPAT, 'UTF-8', FALSE ); ?>" hidden>
             <div id="listcontents">



           </div>

                
                
                <div id="container_pagination">

                    <div class="arrow" >
            
                        <strong><</strong>
            
                    </div>
            
                    <div id="_home_page" >
                        
                    
            
                    </div>
            
                    <div class="arrow" >
            
                      <strong>></strong>
             
                     </div>
             
            
                   </div>

       </div> 

       




   </article> 

</div>
  <script  src="../../res/jqueryAjax/commentsJqueryAjaxAdm.js" ></script>