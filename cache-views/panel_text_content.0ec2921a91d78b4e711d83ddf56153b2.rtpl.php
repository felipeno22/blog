<?php if(!class_exists('Rain\Tpl')){exit;}?><div id="container_admin">
    <article>

    <div id="div_content" >

             <div style="display:flex;flex-direction:column;align-content: center;align-items: center;grid-gap:1em;">  
                    <div id="divTitleDate" >
                        <h2 id="title"><?php echo htmlspecialchars( $cont["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>
                        <div id="divDate"><small ><?php echo htmlspecialchars( $cont["dtcontent"], ENT_COMPAT, 'UTF-8', FALSE ); ?></small><div ></div></div>
                    </div>

                    <div id="img_blog" >
                        <img src="../..<?php echo htmlspecialchars( $cont["imgcontent"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="not found" width="100%">
                        <br>
                        <div style="background-color:gray;border:1px solid black;"  <?php if( $cont["legendimg"]=='' ){ ?>hidden<?php }else{ ?><?php } ?> ><small style="font: normal 7pt Arial;padding:1px;" title="<?php echo htmlspecialchars( $cont["legendimg"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $cont["legendimg"], ENT_COMPAT, 'UTF-8', FALSE ); ?></small></div>
                    </div>

            </div>
    <br>

            <p id="text_content"><?php echo htmlspecialchars( $cont["content_text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>

             <div style="background:gray;padding:15px;">

                <p style="color:black;"><a href="" style="color: white;"><?php echo htmlspecialchars( $cont["deslogin"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a> às <?php echo htmlspecialchars( $cont["hora"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>

            </div>
 
            <div id="com">

                <h2 id="title_comments">Comentários:</h2><br>
    
                <!--Aqui é o onde o jquery insere os comentários-->

            </div>
    <br>

            <form id="formInsertComments" action="/insertComments">
                    <div id="div_insert_comment">

                                <p  id="idpcomment" hidden >Deixe seu comentário aqui:</p>
                                <input id="name" type="text" name="name" placeholder="Digite seu nome"  hidden>
                                <br>
                                <div id="add_comments" >
                                            <div id="divimgaddcomm"><img id="imgcomm" src="../../res/img/icon_anonimous.png"  alt="not found" ></div>
                                            <input  type="text" id="input_comment" placeholder="digite um comentário" onclick="focus_input()" >
    
                                </div>
                                <br>
                                <input id="idcontent" name="idcontent" hidden  type="text" readonly value="<?php echo htmlspecialchars( $cont["idcontent"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                <input id="btpublicar"  hidden type="submit" value="publicar">
                                <div id="infoCommentsAdd" class="alert alert-info" role="alert" hidden>
                                            Seu comentário será analisado pelo administrador. Em breve irá ser visualizado aqui.
                                </div>
                    </div>
            </form>        
     </div>     


</article> 

</div>


<script  src="../../res/jqueryAjax/commentsJqueryAjax.js" ></script> 
 
