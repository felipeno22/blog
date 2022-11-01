
 $(document).ready(function() {


           var totalPages=$("#inputTotalPages").val();

           console.log($("#inputTotalPages").val());
           var deslogin= document.getElementById("deslogin").value;

           
           if(totalPages < 5)
            blogs(deslogin,1,totalPages,0)
           else
            blogs(deslogin,1,5,0)
        
          
        });







function blogs(deslogin,page,aux,aux2){
  

   
 

  $.ajax({
      url: "/load_myblogs",
      method:"GET",
       dataType: "json",
        data: { deslogin: deslogin  ,page: page, aux: aux, aux2: aux2}
     
  }).done(function(result) {
    
     console.log(result); 



       $(".content").remove();


       $(".e").remove();

      for(var i=0; i < result['blogs'].length; i++){


        var b= `<div class="content"  >

                     <a href="/contents_blog/ ${result['blogs'][i]['idblog']}"><span> ${result['blogs'][i]['dtblog']}</span><br><br>  
                     <h3> ${result['blogs'][i]['name_blog']}</h3>
                     <div id="text_content"  >
                        <div id="text_blog" >Este blog ensina sobre um contéudo especifico onde o conhecimento é aprofundado...</div>
                        <div id="icon_text_blog" ><strong>></strong></div>
                    </div></a>

                     <div id="divtotalcont${result['blogs'][i]['idblog']}">
           
                          
                            <a id='lbltotalcont${result['blogs'][i]['idblog']}' href="/contents_blog/ ${result['blogs'][i]['idblog']}">contéudos</a>
                    </div>

             
           </div><br class='e'>`;




         $("#div_content #listblogs").append(b);


         totalblogs(result['blogs'][i]['idblog'],`/contents_blog/ ${result['blogs'][i]['idblog']}`)

         
    
      }


    
          
       $(".ulpagination li").remove();
      for(var a=0; a < result['pages'].length; a++){

        if(a==0 && (result['previus'][0])){

          $(".ulpagination ").append('<li '+result['hidden_prev']+' ><a class="page" onclick="page(('+result['pages'][a].page+'-1),'+result['previus'][0].aux+','+result['previus'][0].aux2+')" >anterior</a></li>');
        }
        

        /*pega a pagina inicial  e ultima*/
         var ultimo_pag= result['pages'][result['pages'].length-1].page;
      var primeiro_pag=(result['pages'][0].page-1);

     
        $(".ulpagination ").append('<li><a class="page" onclick="page('+result['pages'][a].page+','+ultimo_pag+','+primeiro_pag+')">'+result['pages'][a].page+'</a></li>');
        
        if(a==(result['pages'].length-1) && (result['next'][0])){
             

             
          
          
            $(".ulpagination ").append('<li '+result['hidden_next']+' ><a class="page" onclick="page(('+result['pages'][a].page+'+1),'+result['next'][0].aux+','+result['next'][0].aux2+')" >proximo</a></li>');


          

          
      }




      }



    




  });

    

}

function totalblogs(idblog,url){
  //var idblog= document.getElementById("idblog").value;

  
 

  $.ajax({
      url: "/loadNumContentsByBlogs",
      method:"GET",
       dataType: "json",
      data: { idblog: idblog}
     
     
  }).done(function(result) {
    
     

     
            console.log(result); 



       $(`#lbltotalcont${idblog}`).remove();



      for(var b=0; b < result.length; b++){

      


           var c=` <a id='lbltotalcont${idblog}' href="${url}"> ${result[b]['totalcont']} contéudos</a>`;




         $(`#divtotalcont${idblog}`).append(c);
    
      }



  });

    
}



/*funcao que popula table conforme a pagina clicada*/
function page(e,aux,aux2){

   
           var deslogin= document.getElementById("deslogin").value;

        
            blogs(deslogin,e,aux,aux2)
   

}

/*end funcao que popula table conforme a pagina clicada*/








