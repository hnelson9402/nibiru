<div class="card mt-3" style="background-color:#fdfdfd; border-radius:5px; box-shadow: 1px 1px 3px;">

  <div class="card-header bg-success text-white fw-bold">
    Registar producto
  </div>

    <form id="frmSaveProduct" enctype="multipart/form-data">
    <div class="card-body">
        <!--Aqui se muestran los errores-->
        <div class="alert mt-3" role="alert" style="display: none;" id="errorSaveProduct">
        </div>

        <div class="row">
            
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="form-group" class="form-label float-left">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="nombre del producto" required>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="form-group" class="form-label float-left">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" placeholder="stock del producto" required>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Máximo 30 caracteres" required></textarea>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="formFile" class="form-label">Imagen del producto</label>
                        <input class="form-control" type="file" id="product" name="product" accept="image/jpeg,image/jpg,image/png" required>
                        <p>La imagen debe ser(jpg,jpeg,png), tamaño(min:10kb , max:500kb), dimensiones(200x200)</p>
                    </div>
                </div>

        </div>
    </div>    

    <div class="card-footer text-muted">
        <button class="btn btn-primary" id="btnSaveProduct" type="submit"><i class="fa fa-plus mr-2" aria-hidden="true"></i>Registrar</button>
    </div>
    </form>

</div>