<div class="modal fade" id="modalChangePassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title fw-bold text-white" id="exampleModalLabel">Cambiar Contraseña</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="frmChangePassword">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Contraseña Antigua</label>
                        <input type="password" class="form-control" name="oldPassword" id="oldPassword" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword2" class="form-label">Contraseña Nueva</label>
                        <input type="password" class="form-control" name="newPassword" id="newPassword" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword3" class="form-label">Confirmar Contraseña</label>
                        <input type="password" class="form-control" name="confirmNewPassword" id="confirmNewPassword" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
                <!--Mostrar Error-->
                <div class="alert" role="alert" id="errorChangePassword" style="display: none;">                        
                </div>
            </form>
        </div>
    </div>
</div>