<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
    <html lang="pt-br">
      <head>
        <meta charset="utf-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
        <title>bloguinho-admin</title>
        <link rel="stylesheet" type="text/css" href="../res/css/admin/header.css">
         <link rel="stylesheet" type="text/css" href="../res/css/admin/telasCruds.css">
         <script src="../res/js/contents.js" ></script>
         <script src="../res/js/comments.js" ></script>
           <script src="../res/js/users.js" ></script> 
            <script src="../res/js/blogs.js" ></script>   
  <!--bootstrap-->
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   <!--end bootstrap-->


 <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

      <!-- meus jQuery  -->
    


       <!--para configurar o select de conselhos-->
     <link href="../res/select2/css/select2.min.css" rel="stylesheet" />
   <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>-->
    <script src="../res/select2/js/select2.min.js"></script>

     

        <meta charset="utf-8">



<style>



    body{
    
            font: normal 10pt Arial;
            border: 2px solid black;

        }


    #header{
        background-color: #6c6cf7;
    }


    dialog::backdrop{

        background-color: rgb(0 0 0 /.5);
    }



/*para a lista de content na pagina inicial de login*/

    #container_admin{

            padding-left:100px;
            padding-right:100px;
            padding-top:10px;
            padding-bottom: 10px;
            font: normal 10pt Arial;
            border: 2px solid black;

    }


    



     #divTitleDate{

        display:flex;
        flex-direction:row;
        grid-gap:1em;



    }

    #title{
        color:hsl(236, 90%, 61%);
        font: normal 25pt Arial;
         border:none;
       

    }



    #divDate small{
        height:50%

    }

    #divDate div{
        height:50%

    }




 #div_content{
        padding:10px;
        border: 1px solid black;

    }


     
    .content{

        background-color:white;
        padding: 5px;
        border:1px solid black;
        box-shadow: 5px 10px #888888;

    }


 
    p{

        color: gray;
    }


.content span{
        background-color: grey;
        color: white;
        font-style: italic;
        padding: 5px;

    }
    
     .content a {
        font: normal 10pt Arial;
        color: blue;

    }

    
   .content a:hover {
        text-decoration: none;
        font: normal 12pt Arial;
        background-color: aliceblue;

    }

    .content h3{
        color:hsl(236, 90%, 61%);
        font: bold 15pt Arial;

    }

    .content:hover h3 {

        color: gray;
        

    }

      #text_content{
        display:flex;
        flex-direction:row;
        


    }


    #img_blog{

            width:200px;
            border: 1px solid blue;
            box-shadow: 3px 3px 3px;


    }



     #text_blog{
        width:95%;
        padding: 15px;
        color: blue;
        font: bold 10pt Arial;

    }

    #icon_text_blog{
        padding:10px;
        text-align: center;
        border-radius: 30%;
        color: blue;
        font: bold 16pt Arial;
        box-shadow: 3px 3px #888888;
        height:60px;
        width:5%;

    }
    

    .content:hover #text_blog{
        color: gray;
    }


    .content:hover #icon_text_blog{
        
        background-color: gray;
    }

    #container_pagination{
        display:flex;
        flex-direction:row;
        padding:10px;
    }

     #div_pagi_left{
       
        width: 35%;
    }

    #div_pagi_right{
       
        width: 35%;
    }



/*    .arrow{
        background-color:#6c6cf7;
        padding:10px;
        color: white;
        padding:10px;
        text-align: center;
        border-radius: 30%;
        font: bold 16pt Arial;
        box-shadow: 3px 3px #888888;
    }

    .arrow:hover{

        background-color: grey;
        font: bold 17pt Arial;
        box-shadow: 5px 5px #6c6cf7;
       

    }*/



    #_home_page{
        width:30%;
        padding-top: 10px;
        text-align: center;
        background:#6c6cf7;

       
    }

    #_home_page strong{
    padding:10px;
    background-color: #6c6cf7;

    }

       #linkHeader:hover{
background-color: white;
color: #6c6cf7;

    }



/*end para a lista de content na pagina inicial de login*/



 small{
        background-color: grey;
        color: white;
        font-style: italic;
        padding: 5px;

    }

    


    p{

color: gray;
}




 .comment{

        padding-left:5px;
    }

    .comment p{
        font: bold 10pt Arial;

    }

    .comment a{
            color: #6c6cf7;

    }



    #add_comments{

        display: flex;
        flex-direction: row;
    }


    .div_comment{
        display: flex;
        flex-direction: row;
        box-shadow: 3px 3px black;
        padding:10px;

    }


#input_comment{

    padding:5px;
    border:none;
    border-bottom: 1px solid black;
    width:95%;
}


 #input_comment:focus{
  outline-style: none;

}


#name{
padding:5px;
border:none;
width: 100%;
border-bottom: 1px solid black;


}

#name:focus{
  outline-style: none;

}





.resp{
    border: 1px solid blue;
overflow-y: scroll;
height:200px;
width:100%;
padding:10px;


}


.lbltotalresp {
    color:blue;
    border-bottom:1px solid blue;

}

.lbltotalresp:hover{
    color: purple;
    font: bold 12pt Arial;
    border-bottom: 1px solid purple;

}


.div_insert_respcomment{
box-shadow: 3px 3px black;
padding:10px;

}


.add_respcomments{
display: flex;
flex-direction: row;

}

.div_img_add_resp{
background-color:white;
width:5%;
text-align: center;
}

.div_img_add_resp img{
border-radius: 25px;
border: 1px solid blue;

}



#divimgaddcomm{

    background-color:white;
    width:5%;
    text-align: center;
}




#imgcomm{
    border-radius: 25px; 
    border: 1px solid blue;
    width: 100%
}


#icon_user_comment img{
    border-radius: 20px;
    border: 1px solid blue;
    width:25px;

}


#img_comm_msg{

    border-radius: 20px;
    width: 25px;
}





.ulpagination{
   
    display: flex;
    flex-direction: row;
    list-style: none;
    grid-gap:0.2em;
    border: none;

}

.ulpagination a{
    padding:5px ;
    border-radius:1em;
    background: grey;
    color: white;
    text-decoration: none;
}
   

.ulpagination a:hover{
    padding:5px ;
    border-radius:1em;
    background: green;
    color: white;
    text-decoration: none;
}
   

@media only screen and (max-width: 600px) {



/*pagition*/

#container_pagination{
        display:flex;
        flex-direction:row;
        padding:0px;

    }


 #div_pagi_left{ 
        width: 0%;
          
    }

    #div_pagi_right{
       
        width: 0%;
    }


   #_home_page{
        width:100%;
        background:#6c6cf7;

       
    }



.ulpagination{
   
    display: flex;
    flex-direction: row;
    list-style: none;
    grid-gap:0.1em;

}

.ulpagination a{
    padding-left:2px ;
    border-radius:1em;
    background: grey;
    color: white;
    text-decoration: none;
}
   

.ulpagination a:hover{
    padding-left:2px ;
    border-radius:1em;
    background: green;
    color: white;
    text-decoration: none;
}


 #_home_pageinit{
       
       width:50%;
       padding:5px;

    }

/*end pagination*/


    
}


</style>




      </head>


<body id='telaAdm'>     
        


<article>
        <section>

            

            <!-Aqui o header->  
            <header id="header">
                <nav class="navbar navbar-expand-md navbar-light">
                     <label><small>Bem vindo ao bloguinho <?php echo htmlspecialchars( $deslogin, ENT_COMPAT, 'UTF-8', FALSE ); ?>  <?php echo htmlspecialchars( $date_today, ENT_COMPAT, 'UTF-8', FALSE ); ?></small></label>

                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarsExample04" >
                        

                        <ul class="navbar-nav mr-auto">

                        </ul>   
                        <ul class="navbar-nav " >


                            <li  class="nav-item"  ><a  id='linkHeader' href="/users" class="nav-link">Usuários</a></li>

                            <li class="nav-item dropdown" >
                              <a id='linkHeader' class="nav-link dropdown-toggle"  href=""  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blogs</a>
                                  <div class="dropdown-menu" aria-labelledby="linkHeader">
                                    <a id="linkHeader" class="dropdown-item" href="/blogs">Blogs</a>
                                    <a id="linkHeader" class="dropdown-item" href="/contents">Contéudos</a>
                                    <a id="linkHeader" class="dropdown-item" href="/comments">Comentários</a>
                                    <!--<a  id="linkHeader" class="dropdown-item" href="/competences">Competências</a>
                                    <a  id="linkHeader" class="dropdown-item" href="/legislacoes">Legislações</a>
                                    <a  id="linkHeader" class="dropdown-item" href="/informatives">Noticías</a>-->
          
                                   </div>
                             </li>


                         

                            
                            <li class="nav-item" > <a id="linkHeader" href="/logout" class="nav-link" >Sair</a></li>

                        </ul>
                    </div>
                </nav>


      

            </header>   

          

        </section>  


</article>


