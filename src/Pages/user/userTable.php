<div class="card" style="border:1px solid gray; box-shadow: 1px 2px 5px;">

    <div class="card-header bg-success text-white">
        <strong style="font-size:20px;">Administrar Usuarios</strong>
    </div>
       
    <div class="card-body">   
            <!--Aqui se muestran los errores-->
            <div class="alert mt-3" role="alert" style="display: none;" id="messageUserDelete">
            </div>

            <button class="btn btn-success mb-3" id="btnUserSave"><i class="fa fa-user mr-2"></i>Registrar</button>    
            <div class="row">   
                
                <div class="col-lg-12 col-sm-12" style="background-color:#fdfdfd; border-radius:5px; box-shadow: 1px 1px 3px;">
                <br>
                    <div class="table-responsive">          
                        <table class="table table-hover table-bordered" style="width:100%;" id="userTable">
                            <thead class="bg-success text-white">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">NOMBRE</th>
                                    <th scope="col">DNI</th>
                                    <th scope="col">CORREO</th>
                                    <th scope="col">ROL</th>
                                    <th scope="col">FECHA</th>                  
                                    <th scope="col">ACCIONES</th>               
                                </tr>
                                </thead>
                                <tbody id="userTableBody">               
                                </tbody>
                        </table>
                    </div>
                </div>              
            </div><!--end row-->        
    </div><!--end card-body -->
    <div class="card-footer text-muted">
         <button class="btn btn-success" id="btnReloadUserTable" type="submit"><i class="fa fa-sync mr-2" aria-hidden="true"></i>Actualizar</button>         
    </div>  
</div><!--end card-->