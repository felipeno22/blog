
    


         comments();
  



function comments(){
  var idcontent= document.getElementById("idcontent").value;

  
 

  $.ajax({
      url: "/loadComments",
      method:"GET",
       dataType: "json",
      data: { idcontent: idcontent}
     
     
  }).done(function(result) {
    
     console.log(result); 



       $(".div_comment").remove();


       $(".e").remove();

      for(var i=0; i < result.length; i++){

        var dt=result[i]['dtregister'].split("-");
        var dia=dt[2].split(" ");
        var name=`Anônimo ${result[i]['idcomment']}`; 

        if(result[i]['name'] !='' && result[i]['name'] !=null )
          name=result[i]['name'];
      


           var c=` <div class="div_comment">

        <div id="icon_user_comment" >
        <img id="img_comm_msg" src="../../res/img/icon_anonimous.png"  alt="not found" >
        </div>

        <div class="comment" >

            <p> <strong> ${name}</strong><br> <a href=""> ${dia[0]} de ${month(dt[1])} de ${dt[0]}  ${dia[1]} </a></p>
            
            <p> ${result[i]['comment']}</p>
             
             


            
            <div class='divtotalresp${result[i]['idcomment']}'>
           
              <label class='lbltotalresp'  onclick="focus_inputResp('resp${result[i]['idcomment']}')" >${result[i]['totalresp']} respostas</label>
            </div>
             

             <div class="resp" id="resp${result[i]['idcomment']}"   hidden>

                        <div class="div_insert_respcomment" id="div_insert_respcomment${result[i]['idcomment']}"  ">

                        <p  id="idprespcomment${result[i]['idcomment']}" >Deixe sua resposta aqui:</p>
                        <input  id="nameresp${result[i]['idcomment']}" type="text" name="nameresp${result[i]['idcomment']}" placeholder="Digite seu nome" style="width:100%;padding:5px;border:none;border-bottom: 1px solid black;">
                        <br>
                        <div  class="add_respcomments" id="add_respcomments${result[i]['idcomment']}" >
                        <div  class="div_img_add_resp" ><img src="../../res/img/icon_anonimous.png"  alt="not found" width="100%"></div>
                         <input style="padding:5px;border:none;border-bottom: 1px solid black;width:95%;" type="text" id="input_resp${result[i]['idcomment']}" placeholder="responda"  ></input>
    
    
                      </div>
                    <br>
                    <input id="idcomment${result[i]['idcomment']}" name="idcomment${result[i]['idcomment']}" hidden  type="text" readonly value="c">
                    <button id="btreponder${result[i]['idcomment']}"  onclick="submeter(${result[i]['idcomment']})">Respondendo</button>
                    <div id="infoResponsesAdd" class="alert alert-info" role="alert" hidden>Seu comentário será analisado pelo administrador. Em breve irá ser visualizado aqui.</div>
                    </div>
                    <br>

                    <div id="divresponse${result[i]['idcomment']}" style="width:100%;"  >
                     
                  
                         <div class="respd${result[i]['idcomment']}" style=" box-shadow: 3px 3px black;" ></div>


                  </div>



                   </div><br>     
                 

                     

             </div>
         </p>
     
         </div>
     


    </div><br class='e'>`;




         $("#com").append(c);

         responses(result[i]['idcomment']);
    
      }


    
    
    




  });

    

}

 function showResponse(idcomment,totalresponse){

  if(totalresponse>0){


      if( document.getElementById(`divresponse${idcomment}`).hidden==true)
        document.getElementById(`divresponse${idcomment}`).hidden=false;
      else
        document.getElementById(`divresponse${idcomment}`).hidden=true;

      }



  }

  




function totalresponse(){
  var idcontent= document.getElementById("idcontent").value;

  
 

  $.ajax({
      url: "/loadComments",
      method:"GET",
       dataType: "json",
      data: { idcontent: idcontent}
     
     
  }).done(function(result) {
    
     console.log(result); 



       $(".lbltotalresp").remove();



      for(var i=0; i < result.length; i++){

      


           var c=` <label class='lbltotalresp'  onclick="focus_inputResp('resp${result[i]['idcomment']}')" >${result[i]['totalresp']} respostas</label>`;




         $(`.divtotalresp${result[i]['idcomment']}`).append(c);
    
      }


    
    
    




  });

    








}







/*  submetendo form de filtro com Jquery*/
$("#formInsertComments").submit(function(e){
  e.preventDefault();

         var input_comment= document.getElementById("input_comment").value;
         var input_name= document.getElementById("name").value;
         var idcontent= document.getElementById("idcontent").value;

    if(input_comment!="" && input_name!=""){
    
   

    insertComments(input_name,input_comment,idcontent);

    comments();
    

     document.getElementById('input_comment').value=''
     document.getElementById('name').value=''




    }else{
        alert("insira um comentário e/ou nome!!")

    }    
 


   /*var totalPages=$("#inputTotalPages").val();


            var search=$("#inputbusca").val();

              
           
            var dtiniinfo=$("#dtiniinfo").val();

            var dtfinalinfo=$("#dtfinalinfo").val();
           

           if(totalPages < 5)
            contents(search,dtiniinfo,dtfinalinfo,1,totalPages,0)
           else
            contents(search,dtiniinfo,dtfinalinfo,1,5,0)
      */        

});
/*end  submetendo form de filtro com Jquery*/


function insertComments(name, comment,idcontent){

      var infoCommentsAdd= document.getElementById("infoCommentsAdd");

    $.ajax({
      url: "/insertComments",
      method:"post",
       dataType: "text",
      data: {name: name, comment: comment, idcontent: idcontent}
     
     
  }).done(function(result) {
    
      console.log(result);  

      infoCommentsAdd.hidden=false;





    });


}





    
    function focus_input(){

        var input_comment= document.getElementById("input_comment");
        var input_name= document.getElementById("name");
        document.getElementById("btpublicar").hidden=false;
        document.getElementById("idpcomment").hidden=false;
        input_name.hidden=false;
       input_name.style.borderBottom= "2px solid blue";
       input_comment.style.borderBottom= "2px solid blue";


      /* var add_comments= document.getElementById('add_comments');
       add_comments.innerHTML+="</br>"; 
       var btn=document.createElement("button");
       btn.setAttribute('type', 'submit');
       btn.innerHTML = 'publicar';
      add_comments.appendChild(btn);   */
      

    }


/*********************************************************************************************/




function responses(idcomment){



 

  $.ajax({
      url: "/loadResponses",
      method:"GET",
       dataType: "json",
      data: { idcomment: idcomment}
     
     
  }).done(function(result) {
    
     console.log(result); 
  
       //<div id="divresp${result[i]['idcomment']}" style="border: 1px solid blue"></div>

      $(`.respd${idcomment}`).remove();
         $(`.e${idcomment}`).remove();



       

      for(var i=0; i < result.length; i++){

        var dt=result[i]['dtregister'].split("-");
        var dia=dt[2].split(" ");
        var name=`Anônimo ${result[i]['idresponsecomment']}`; 

        if(result[i]['name'] !='' && result[i]['name'] !=null )
          name=result[i]['name'];
      


           var c=` <br class="e${idcomment}"><div class="respd${idcomment}" style=" box-shadow: 3px 3px black;" >

        
        <div class="comment" >

        <div id="icon_user_comment" >
        <img src="../../res/img/icon_anonimous.png" alt="not found">
        </div>

            <p> <strong> ${result[i]['name']} </strong><br> <a href=""> ${dia[0]} de ${month(dt[1])} de ${dt[0]}  ${dia[1]} </a></p>
                        
            <p> ${result[i]['response']}</p>
             

                 



             </div>
         
     
         </div><br class="e${idcomment}">`;




         $(`#divresponse${idcomment}`).append(c);
      }


    
    
    




  });

    








}




/*  submetendo form de filtro com Jquery*/
function submeter(idcomment){
        
        var resp= document.getElementById("input_resp"+idcomment).value;
        var nameresp= document.getElementById("nameresp"+idcomment).value;

    if(resp!="" && nameresp!=""){
    
   

    insertRespComments(nameresp,resp,idcomment);

totalresponse()
  responses(idcomment);
    

     document.getElementById('input_resp'+idcomment).value=''
     document.getElementById('nameresp'+idcomment).value=''




    }else{
        alert("insira uma reposta e/ou nome!!")

    }    
 
}
/*end  submetendo form de filtro com Jquery*/






function insertRespComments(nameresp, resp,idcomment){


      var infoResponsesAdd= document.getElementById("infoResponsesAdd");

    $.ajax({
      url: "/insertRespComments",
      method:"post",
       dataType: "text",
      data: {nameresp: nameresp, resp: resp, idcomment: idcomment}
     
     
  }).done(function(result) {
    
      console.log(result); 
      infoResponsesAdd.hidden=false 




    });


}





    
    function focus_inputResp(idresp){
        document.getElementById("infoResponsesAdd").hidden=true
        
        if(document.getElementById(idresp).hidden==true)
        document.getElementById(idresp).hidden=false;
      else
        document.getElementById(idresp).hidden=true;
       

    }


function month(m){


  switch(m) {
  case "1":
     m="Janeiro";
    break;
  case "2":
     m="Feveiro";
    break;
  case "3":
     m="Março";
    break;
  case "4":
     m="Abril";
    break;  
case "5":
     m="Maio";
    break;
  case "6":
     m="Junho";
    break;
case "7":
     m="Julho";
    break;
  case "8":
     m="Agosto";
    break;

case "9":
     m="Setembro";
    break;
  case "10":
     m="Outubro";
    break;

 case "11":
     m="Novembro";
    break;
  case "12":
     m="Dezembro";
    break;   
  default:
    m=''
} 


return m;

}
