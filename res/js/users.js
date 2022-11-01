
	





// When the user clicks on the button, open the modal
function  open_modalSenha() {
// Get the modal
var modal = document.getElementById("containerModalSenha");






  modal.style.display = "block";
   modal.style.opacity=1;
   modal.style.pointerEvents="auto";
  
}


// When the user clicks on <span> (x), close the modal
function  close_modalSenha() {

  // Get the modal
var modal = document.getElementById("containerModalSenha");


  modal.style.display = "none";
}



function insert_update(crud){
        var desperson = document.forms["idFormUser"]["desperson"].value;

        var despassword=document.forms["idFormUser"]["despassword"].value;



       /* var deslogin = document.forms["idFormUser"]["deslogin"].value;
        var despassword = document.forms["idFormUser"]["despassword"].value;

        if (desperson == "") {
            alert("Favor informar o seu nome!");
            return false;     
        }
        else{
            alert("Olá, " + desperson + " !");
            return true;
        }*/

        var resultado=''

        if(crud=='insert')
          resultado = confirm("Deseja salvar o usuário " +  desperson + " ?");

        if(crud=='update')
          resultado = confirm("Deseja alterar o usuário " +  desperson + " ?");
         
         
         if(resultado){


                  if(verifyPasswordSecurity(despassword)){


                            return true;

                  }else{

                        
            
                       return false;

                 }



         }else{


             return false;


         }
         
    }






function update_password(){
        var despassword = document.forms["idFormUserPass"]["despasswordnovo"].value;
        var despasswordconf = document.forms["idFormUserPass"]["despasswordnovoconf"].value;
       
         var opt=confirm("Deseja alterar a senha?");




         if(opt){
                          if(despassword!='' && despasswordconf!=''){

                               //verficar se as senhas são iguais nos campos
                                if(despassword==despasswordconf){


                                          if(verifyPasswordSecurity(despassword)){


                                                 return true;

                                          }else{

                        
            
                                                  return false;

                                          }




                                }else{//se os campos senha  e confirmar senha nao for igual


                                       //campo confirmar senha vazio
                                    alert(" campo senha e confirmar senha  precisam ser iguais !!");
                                    return false;


                                }                              


                             

                          



                          }else{

                                if(despassword=='' && despasswordconf!=''){

                                    //campo confirmar senha vazio
                                    alert(" campo senha vazio!!");
                                    return false;

                                }else if(despassword!='' && despasswordconf==''){

                                    //campo  senha vazio
                                      alert("campo confirmar senha vazio!!");
                                      return false;

                                }else{

                                      //campo senha e de confirmação vazio
                                      alert("campo  de senha e de confirmação vazio!!");
                                      return false;


                                }




                          }




         }else{

            return false;

         }









        var resultado=''

        if(crud=='insert')
          resultado = confirm("Deseja salvar o usuário " +  desperson + " ?");

        if(crud=='update')
          resultado = confirm("Deseja alterar o usuário " +  desperson + " ?");
         
         
         if(resultado)
          return true;
        else
          return false;
    }





    function verifyPasswordSecurity(password){

        var aux = false;

        var uppercase = /[A-Z]/;

        var lowcase = /[a-z]/; 

        var numbers = /[0-9]/;

        var special_char= /[!|@|#|$|%|^|&|*|(|)|-|_|?]/;

           /*if(password.length > 8){

                 alert("Senha Inválida. Insira 8 caracteres !!");
                 return aux;

            }*/

    
          if(password.length < 8){
            alert("Senha Inválida. Insira 8 caracteres !!");
               return aux;

          }


           var auxMaiuscula = 0;

           var auxMinuscula = 0;

           var auxNumero = 0;

          var auxEspecial = 0;

          for(var i=0; i<password.length; i++){

                if(uppercase.test(password[i]))

                            auxMaiuscula++;

                else if(lowcase.test(password[i]))

                            auxMinuscula++;

                else if(numbers.test(password[i]))

                                auxNumero++;

                else if(special_char.test(password[i]))

                                auxEspecial++;

                }

                  if (auxMaiuscula > 0){

                      if (auxMinuscula > 0){

                          if (auxNumero > 0){

                              if (auxEspecial>0) {

                                    aux = true;

                              }else{

                                 alert("Senha Inválida. Insira pelo menos um caracter especial !!");

                              }

                          }else{

                             alert("Senha Inválida. Insira pelo menos um número !!");
                          }

                      }else{

                          alert("Senha Inválida. Insira pelo menos uma letra minúscula !!");
                      }

                  }else{

                      alert("Senha Inválida. Insira pelo menos uma letra maiúscula !!");

                  }

 

        return aux;

}


function voltarParaPainel(){

 //localhost
       window.location.href = "http://www.blog.com.br/panel";
      
      //no umbler
      //window.location.href=  "http://assessoriaconselhos-com.umbler.net/admin/panel";

}


function voltarLista(lista){
  if(lista=="user_comum"){
    //localhost
       window.location.href = "http://www.blog.com.br/panel";
      
      //no umbler
      //window.location.href=  "http://assessoriaconselhos-com.umbler.net/admin/panel";


  }else{
     //localhost
      window.location.href = "http://www.blog.com.br/"+lista;

      //no umbler
     // window.location.href=  "http://assessoriaconselhos-com.umbler.net/"+lista;

  }
  

  

}



    


