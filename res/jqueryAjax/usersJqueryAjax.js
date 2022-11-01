        $(document).ready(function() {
           

          
         var totalPages=$("#inputTotalPages").val();

            var search=$("#inputbuscaUser").val();

             var status=$(".status").val();
            var admin=$(".admin").val(); 


                     
          


           if(totalPages <= 5)
            users(search,status,admin,1,totalPages,0)
           else
            users(search,status,admin,1,5,0)

           


        


  });


/*  submetendo form de filtro com Jquery*/
$("#formFilter").submit(function(e){
  e.preventDefault();

  

          var totalPages=$("#inputTotalPages").val();

            var search=$("#inputbuscaUser").val();

             var status=$(".status").val();
            var admin=$(".admin").val(); 


              
          


           if(totalPages <= 5)
            users(search,status,admin,1,totalPages,0)
           else
            users(search,status,admin,1,5,0)

           



});
/*end  submetendo form de filtro com Jquery*/



/*funcao que popula table e pagination via Ajax Jquery*/
function users(search,status,admin,pag,aux,aux2){

  $.ajax({
      url: "/loadUsers",
      method:"GET",
       dataType: "json",
      data: {search: search, status: status, admin: admin , page: pag, aux: aux, aux2: aux2}
     
     
  }).done(function(result) {
    
      console.log(result);  

    
    
      $("tbody tr").remove();
       $("#divIconLoading").remove();

      for(var i=0; i < result['users'].length; i++){


         
         


        $("tbody").append('<tr><td hidden>'+result['users'][i].iduser+'</td><td>'+result['users'][i].desperson+'</td><td  >'+result['users'][i].desemail+'</td/><td  >'+result['users'][i].deslogin+'</td><td  >'+result['users'][i].status_user+'</td><td  >'+result['users'][i].inadmin+'</td><td><a  id="updateLink" href="/update/'+result['users'][i].iduser+'" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a><a  id="deleteLink"  href="/user/delete/'+result['users'][i].iduser+'" onclick="return confirm(\'Deseja realmente excluir este registro?\')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a></tr>');




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
     var status=$(".status").val();
      var admin=$(".admin").val(); 


      
         

            users(search,status,admin,e,aux,aux2)
   

}

/*end funcao que popula table conforme a pagina clicada*/