
function insert_update_blog(crud){
        var title = document.forms["idFormInfo"]["title"].value;
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
          resultado = confirm("Deseja salvar o nome do blog " +  title + " ?");

        if(crud=='update')
          resultado = confirm("Deseja alterar o  nome do blog" +  title + " ?");
         
         if(resultado)
          return true;
        else
          return false;
    }