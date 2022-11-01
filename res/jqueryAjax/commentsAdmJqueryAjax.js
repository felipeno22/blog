
       



 $(document).ready(function() {

     


           var totalPages=$("#inputTotalPages").val();


            var search=$("#inputbusca").val();


            var dtiniinfo=$("#dtiniinfo").val();

            var dtfinalinfo=$("#dtfinalinfo").val();

           // console.log(dtiniinfo);
           // console.log(dtfinalinfo);
           

           if(totalPages < 5)
            comments_adm(search,dtiniinfo,dtfinalinfo,1,totalPages,0)
           else
            comments_adm(search,dtiniinfo,dtfinalinfo,1,5,0)
        
          
        });






/*  submetendo form de filtro com Jquery*/
$("#formFilter").submit(function(e){
  e.preventDefault();

   var totalPages=$("#inputTotalPages").val();


            var search=$("#inputbusca").val();

              
           
            var dtiniinfo=$("#dtiniinfo").val();

            var dtfinalinfo=$("#dtfinalinfo").val();


           if(totalPages < 5)
            comments_adm(search,dtiniinfo,dtfinalinfo,1,totalPages,0)
           else
            comments_adm(search,dtiniinfo,dtfinalinfo,1,5,0)
        

});
/*end  submetendo form de filtro com Jquery*/


/*funcao que popula table e pagination via Ajax Jquery*/
function comments_adm(search,dtiniinfo,dtfinalinfo,pag,aux,aux2){

  $.ajax({
      url: "/loadCommentsAdm",
      method:"GET",
       dataType: "json",
      data: {search: search , dtiniinfo: dtiniinfo, dtfinalinfo: dtfinalinfo ,page: pag, aux: aux, aux2: aux2}
     
     
  }).done(function(result) {
    
      console.log(result);  

     $("#tb tbody tr").remove();
      $("#divIconLoading").remove();


      var selected_aprovado='';
    var selected_aguardando='';
    var selected_reprovado='';


      for(var i=0; i < result['comments'].length; i++){

       
       if(result['comments'][i].status_comment == 'aprovado'){

            selected_aprovado="selected";
            selected_aguardando="";
            selected_reprovado="";
          }else if(result['comments'][i].status_comment == 'aguardando'){
            selected_aprovado="";
            selected_aguardando="selected";
            selected_reprovado="";


          }else if(result['comments'][i].status_comment == 'reprovado'){
            selected_aprovado="";
            selected_aguardando="";
            selected_reprovado="selected";
          }
            
       
           
         


        $("#tb tbody").append(`<tr>
                        <td hidden>${result['comments'][i].idcomment}</td>
                        <td>${result['comments'][i].name}</td>
                        <td>${result['comments'][i].dtcomment}</td>
                        <td style="border: 1px solid black;padding:10px;"><select style="width:100px" name="status_comment" id="status_comment"  onchange="status_comment_change(this.value,${result['comments'][i].idcomment})" ><option  ${selected_aprovado}  value="aprovado">Aprovado</option><option  ${selected_aguardando}  value="aguardando">Aguardando</option><option  ${selected_reprovado}   value="reprovado" >Reprovado</option></select>&nbsp;&nbsp;</td>
                        <td hidden>${result['comments'][i].idcontent}</td>
                        <td><a  id="updateLink" href="javascript:showModalComment('${result['comments'][i].idcomment}','${result['comments'][i].name}','${result['comments'][i].comment}','${result['comments'][i].status_comment}')" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Detalhes</a> <a  id="deleteLink"  href="/comment/delete/${result['comments'][i].idcomment}" onclick="return confirm(\'Deseja realmente excluir este registro?\')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a></td>
                 </tr>`);




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
           

        

            comments_adm(search,dtiniinfo,dtfinalinfo,e,aux,aux2)
   

}

/*end funcao que popula table conforme a pagina clicada*/





function status_comment_change(status_comment,idcomment){

     $.ajax({
      url: "/updateStatusComments",
      method:"POST",
       dataType: "json",
      data: {status_comment: status_comment, idcomment: idcomment }
     
     
  }).done(function(result) {
    
      console.log(result);  

})  
 

}



function showModalComment(idcomment,name,comment,status_comment){
  



  var modal= document.querySelector("#dialog_detail_comm")
    var idcomm= document.getElementById("idcomment")
    var title= document.getElementById("title")
    var comm= document.getElementById("content_text")
    var sts= document.getElementById("input_sts")

    idcomm.value=idcomment
    title.value=name
    comm.value=comment
    sts.value=status_comment

     call_responses_adm()
    
  modal.hidden=false

  modal.showModal()


}



function closeModalComment(){
  var modal= document.querySelector("#dialog_detail_comm")
  modal.hidden=true

  modal.close()


}


document.onkeydown = function(e) {

  if(e.key === 'Escape') {
     var modal= document.querySelector("#dialog_detail_comm")
       modal.hidden=true
  }

}
