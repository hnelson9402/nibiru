import error from '../../helpers/error.js';
import config from '../../helpers/config.js';

document.addEventListener('DOMContentLoaded', () => {
   localStorage.removeItem("token");   
}) 

document.getElementById("frmLogin").addEventListener("submit" , e => {
    e.preventDefault();   

    (async function(){
        try {
            let body = new FormData(document.getElementById("frmLogin"));
            let request = await fetch(config.API + `auth/${body.get('email')}/${body.get('password')}/`);
            let response = await request.json();
    
            //console.log(response);

            if (response.status == "error") {                    
               error("error","alert-danger",response.message);
            } else if (response.status == "ok") {
                localStorage.setItem("token" , response.message.token);
                let body1 = new FormData();
                body1.append("name", response.message.name);
                body1.append("rol", response.message.rol);

                let request1 = await fetch("./src/Core/dataUser.php",{method: "post", body: body1});
                let response1 = await request1.json();

                if (response1 == "vacio") {
                   error("error", "alert-danger","Campos vacios 2");
                } else if(response1 == "listo") {
                    location.reload();
                }                        
            } else {
                error("error","alert-danger","Algo salio mal");
            }      
        } catch (error) {
            console.log(error);
        }        
    })()        
})