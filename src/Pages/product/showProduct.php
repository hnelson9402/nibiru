<script>
    const deleteProduct = async (IDtoken,name) => {        

        try {            
            let body = {name,IDtoken};    
            let token = localStorage.getItem("token");
            let req = await fetch('http://apiphp8.test/product/',{
                   headers : {"Content-Type": "application/json", Authorization: `Bearer ${token}`},
                   body: JSON.stringify(body), method: "DELETE"
            });    
            let res = await req.json();
           
            if (res.status == "error") {
                swal({
                    title: res.message,
                    //text: Idtoken,
                    icon: "error",
                    button: "Aceptar"
                });
            } else if(res.status == "ok"){
                swal({
                    title: res.message,
                    //text: Idtoken,
                    icon: "success",
                    button: "Aceptar"
                });
            } else {
                swal({
                    title: "Algo salio mal",
                    //text: Idtoken,
                    icon: "error",
                    button: "Aceptar"
                });
            }    
        } catch (error) {
            console.log(error);
        }
    }
</script>


<div class="card mt-3" style="background-color:#fdfdfd; border-radius:5px; box-shadow: 1px 1px 3px;">

    <div class="card-header bg-success text-white fw-bold">
        Productos registrados
    </div>
   
    <div class="card-body">
        <!--Aqui se muestran los errores-->
        <div class="alert mt-3" role="alert" style="display: none;" id="errorShowProduct">
        </div>

        <div class="row" id="rowProduct"> 
        </div>
        
    </div>      

</div>