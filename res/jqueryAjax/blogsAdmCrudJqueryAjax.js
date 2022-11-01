
        $(document).ready(function() {


           var totalPages=$("#inputTotalPages").val();


            var search=$("#inputbusca").val();


            var dtiniinfo=$("#dtiniinfo").val();

            var dtfinalinfo=$("#dtfinalinfo").val();

            console.log(dtiniinfo);
            console.log(dtfinalinfo);
           

           if(totalPages < 5)
            blogs(search,dtiniinfo,dtfinalinfo,1,totalPages,0)
           else
            blogs(search,dtiniinfo,dtfinalinfo,1,5,0)
        
          
        });




/*  submetendo form de filtro com Jquery*/
$("#formFilter").submit(function(e){
  e.preventDefault();

   var totalPages=$("#inputTotalPages").val();


            var search=$("#inputbusca").val();

              
           
            var dtiniinfo=$("#dtiniinfo").val();

            var dtfinalinfo=$("#dtfinalinfo").val();
           

           if(totalPages < 5)
            blogs(search,dtiniinfo,dtfinalinfo,1,totalPages,0)
           else
            blogs(search,dtiniinfo,dtfinalinfo,1,5,0)
        

});
/*end  submetendo form de filtro com Jquery*/



/*funcao que popula table e pagination via Ajax Jquery*/
function blogs(search,dtiniinfo,dtfinalinfo,pag,aux,aux2){

  $.ajax({
      url: "/loadBlogs",
      method:"GET",
       dataType: "json",
      data: {search: search , dtiniinfo: dtiniinfo, dtfinalinfo: dtfinalinfo ,page: pag, aux: aux, aux2: aux2}
     
     
  }).done(function(result) {
    
      console.log(result);  

     $("tbody tr").remove();
      $("#divIconLoading").remove();

      for(var i=0; i < result['blogs'].length; i++){


           
         


        $("tbody").append('<tr><td hidden>'+result['blogs'][i].idblog+'</td><td>'+result['blogs'][i].name_blog+'</td><td>'+result['blogs'][i].dtblog+'</td><td hidden>'+result['blogs'][i].iduser+'</td><td><a  id="updateLink" href="/updateBlog/'+result['blogs'][i].idblog+'" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a><a  id="deleteLink"  href="/blog/delete/'+result['blogs'][i].idblog+'" onclick="return confirm(\'Deseja realmente excluir este registro?\')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a></tr>');




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
/*end funcao que popula table e pagination via Ajax Jquery*/


/*funcao que popula table conforme a pagina clicada*/
function page(e,aux,aux2){

   var search=$("#inputbusca").val();
          
   var dtiniinfo=$("#dtiniinfo").val();

  var dtfinalinfo=$("#dtfinalinfo").val();
           

        

            blogs(search,dtiniinfo,dtfinalinfo,e,aux,aux2)
   

}

/*end funcao que popula table conforme a pagina clicada*/



