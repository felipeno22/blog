

function call_responses_adm(){

var idcomment= document.getElementById("idcomment").value;

responses_adm(idcomment)


}


/*funcao que popula table e pagination via Ajax Jquery*/
/*search,dtiniinfo,dtfinalinfo,pag,aux,aux2*/
function responses_adm(idresponse){

  $.ajax({
      url: "/loadResponsesAdm",
      method:"GET",
       dataType: "json",
      data: {idresponse: idresponse}
     //search: search , dtiniinfo: dtiniinfo, dtfinalinfo: dtfinalinfo ,page: pag, aux: aux, aux2: aux2
     
  }).done(function(result) {
    
      console.log(result);  

     $(" #commresp tbody tr").remove();
      $("#commresp tbody p").remove();
   	
   	var selected_aprovado='';
   	var selected_aguardando='';
   	var selected_reprovado='';

      for(var i=0; i < result.length; i++){

      		if(result[i]['status_response'] == 'aprovado'){

      			selected_aprovado="selected";
      			selected_aguardando="";
      			selected_reprovado="";
      		}else if(result[i]['status_response'] == 'aguardando'){
      			selected_aprovado="";
      			selected_aguardando="selected";
      			selected_reprovado="";


      		}else if(result[i]['status_response'] == 'reprovado'){
      			selected_aprovado="";
      			selected_aguardando="";
      			selected_reprovado="selected";
      		}

      var c=`<tr>
      <td style="border: 1px solid black" >${result[i]['name']}</td>
      <td style="border: 1px solid black" >${result[i]['response']}</td>
      <td style="border: 1px solid black;padding:10px;"><select style="width:100px" name="status_response" id="status_response"  onchange="status_response_change(this.value,${result[i]['idresponsecomment']})" ><option  ${selected_aprovado}  value="aprovado">Aprovado</option><option  ${selected_aguardando}  value="aguardando">Aguardando</option><option  ${selected_reprovado}   value="reprovado" >Reprovado</option></select>&nbsp;&nbsp;<input type="button"  id="bt_delete_resp" name="bt_delete_resp" onclick="delete_response(${result[i]['idresponsecomment']})" value="excluir" /></td>`;

        $("#commresp tbody").append(c);


      }

      if(result.length==0){
      		$("#commresp tbody ").append("<p>sem respostas !!</p>");
      }

})

}


function status_response_change(status_response,idresponse){

		 $.ajax({
      url: "/updateRespComments",
      method:"POST",
       dataType: "json",
      data: {status_response: status_response, idresponse: idresponse }
     
     
  }).done(function(result) {
    
      console.log(result);  

})	
 

}



function save_response_dialog(name,idcomment,response,status_response){

     $.ajax({
      url: "/saveRespCommDialog",
      method:"POST",
       dataType: "json",
      data: {name: name ,idcomment: idcomment, response:response, status_response: status_response}
     
     
  }).done(function(result) {
    
      console.log(result);  
      closeModalResponse()
      responses_adm(idcomment)

})  
 

}



function delete_response(idresponse){

		 $.ajax({
      url: "/deleteRespComments",
      method:"POST",
       dataType: "json",
      data: {idresponse: idresponse }
     
     
  }).done(function(result) {
    
      console.log(result);  


var idcomment= document.getElementById("idcomment").value;
 responses_adm(idcomment)

})	
 
}


function showModalResponse(){

  var modal= document.querySelector("#dialog_add_resp")
  document.querySelector("#input_response").value=""
  modal.hidden=false

  modal.showModal()


}



function closeModalResponse(){
  var modal= document.querySelector("#dialog_add_resp")
  modal.hidden=true

  modal.close()


}


document.onkeydown = function(e) {

  if(e.key === 'Escape') {
     var modal= document.querySelector("#dialog_add_resp")
       modal.hidden=true
  }

}


