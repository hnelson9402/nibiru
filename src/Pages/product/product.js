import error from '../../helpers/error.js';
import config from '../../helpers/config.js';

document.addEventListener('DOMContentLoaded', () => {
   getAllProducts();
})

/**********************************************************************************************
*                                        Functions                                            *
**********************************************************************************************/

/******Limpiar formulario de productos******/
const clearProductForm = () => {
    document.getElementById('name').value = "";
    document.getElementById('description').value = "";
    document.getElementById('stock').value = "";
    document.getElementById('product').value = "";
}

/**********************************Mostrar todos los productos********************************/
const getAllProducts = async () => {
    try {  
        let req = await fetch(`${config.API}product/`,{
                                   headers: {Authorization: `Bearer ${config.token}`},
                                   method: 'GET'});
        let res = await req.json();
        
        //console.log(res);

        let row = document.getElementById('rowProduct');

        for (const data of res.data) {
            let name = data.imageName;
            row.innerHTML += `<div class='col-lg-3'>
                <div class='card p-3' style="background-color:#fdfdfd; border-radius:5px; box-shadow: 1px 1px 3px;">
                    <input type='hidden' value='${data.IDtoken}' id='imgIDtoken'>
                    <input type='hidden' value='${data.imageName}' id='imgName'>
                    <div class='card-header bg-success text-white fw-bold d-flex justify-content-center'>${data.name}</div>
                       <img class='img-responsive' src='${data.url}' width='100%' height='200' alt='...' />
                    <div class='card-body'>
                        <p class='card-text'>${data.description}</p>
                    </div>
                    <div class='card-footer text-muted'><span>${data.stock}</span></div>
                    <button type="button" class="btn btn-danger" onClick="deleteProduct('${data.IDtoken}','${data.imageName}')">Eliminar</button>
                </div></div>`;
        }       
    } catch (error) {
        console.log(error);
    }
}

/**********************************************************************************************
*                                           Events                                            *
**********************************************************************************************/

/**********************************Registrar producto*****************************************/
document.getElementById('frmSaveProduct').addEventListener('submit', e => {
    e.preventDefault();  
    config.validateToken();     
    
    (async function () {
        try {
            let body = new FormData(document.getElementById("frmSaveProduct"));             
        
            let req = await fetch(`${config.API}product/`,{
                                       headers: {Authorization: `Bearer ${config.token}`},
                                       method: 'POST',body: body});
            let res = await req.json();
            
            if (res.status == "error") {
                error("errorSaveProduct","alert-danger" , res.message);
            } else if (res.status == "ok") {   
               clearProductForm();                      
               error("errorSaveProduct","alert-success" , res.message);
            } else {
                error("errorSaveProduct","alert-danger" , "Algo salio mal");
            }
        } catch (error) {
            console.log(error);
        }
    })()
 });