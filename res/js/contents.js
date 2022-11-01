


function mostraImg(){

	let photo= document.getElementById('image-previewInfo');
let file=document.getElementById('imgcontent');

		let reader=	new FileReader();


		reader.onload=()=>{

			photo.src=reader.result;
		

		}
			

			reader.readAsDataURL(file.files[0]);

			
		



}




function insert_update_content(crud){
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
          resultado = confirm("Deseja salvar o  contéudo " +  title + " ?");

        if(crud=='update')
          resultado = confirm("Deseja alterar o  contéudo " +  title + " ?");
         
         if(resultado)
          return true;
        else
          return false;
    }


