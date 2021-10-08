import error from  '../../src/Helpers/error.js';
import config from '../../src/Helpers/config.js';

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

    CounterInactive();

});

/*************Cerrar sesión por inactividad**************/
var t=null;

function CounterInactive() {
    t = setTimeout(() =>{        
        document.getElementById("closeSesion").click();  
    },300000);
}

window.onblur = window.onmousemove=function() {
    clearTimeout(t);    
    CounterInactive();
}

/***********************************************
*       clear Form Change Password             *
************************************************/
const clearFormChangePassword = () => {
   document.getElementById("oldPassword").value = "";
   document.getElementById("newPassword").value = "";
   document.getElementById("confirmNewPassword").value = "";
}

/***************************************************************************************************************
*                                     Actualizar la contraseña del usuario                                     *
****************************************************************************************************************/
document.getElementById("frmChangePassword").addEventListener("submit" , e => {
    e.preventDefault();
    config.validateToken();
    
    (async function () {
        try {           
            let body = {
                "oldPassword": document.getElementById("oldPassword").value,
                "newPassword": document.getElementById("newPassword").value,
                "confirmNewPassword": document.getElementById("confirmNewPassword").value                
            };            
           
            let request = await fetch(`${config.API}user/password/`, {
                headers: {
                        "Content-Type": "application/json",
                         Authorization: `Bearer ${config.token}`
                }, 
                method: 'PATCH', body: JSON.stringify(body)})
            let response = await request.json();
            
            if (response.status == "error") {
               error("errorChangePassword","alert-danger",response.message);                              
            } else if (response.status == "ok") {
                error("errorChangePassword","alert-success",response.message); 
                clearFormChangePassword();
            } else {
                error("errorChangePassword","alert-danger","Algo salio mal");  
            }
            
        } catch (error) {
            console.log(error);
        }
    })()
    
})