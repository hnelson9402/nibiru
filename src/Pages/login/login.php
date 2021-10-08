<?php

use Config\UrlBase;
use Core\Auth;

Auth::accessLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="shortcut icon" href="<?php echo UrlBase::urlBase; ?>/public/img/anony.jpg">
    <title>Login</title>
    <link href="<?php echo UrlBase::urlBase; ?>/public/css/styles.css" rel="stylesheet" />
    <link href="<?php echo UrlBase::urlBase;?>/public/css/mdb.min.css" rel="stylesheet" />
</head>

<style>
     body{
        background: rgb(49,135,76);
        background: linear-gradient(90deg, rgba(49,135,76,1) 0%, rgba(124,157,99,1) 35%, rgba(0,255,85,1) 100%);
     }
</style>

<body class="p-2 text-dark bg-opacity-50">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header bg-success">
                                    <h3 class="text-center fw-bold my-4 text-white">Iniciar sesión</h3>
                                </div>
                                <form id="frmLogin">
                                    <div class="card-body">

                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="email" id="email" type="email" placeholder="name@example.com" required/>
                                            <label for="inputEmail">Correo</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="password" id="password" type="password" placeholder="Password" required/>
                                            <label for="inputPassword">Contraseña</label>
                                        </div>

                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-success" type="submit" href="#">Ingresar</button>
                                        </div>
                                        <!--Aqui se muestran los errores-->
                                        <div class="alert mt-3 alert-dismissible" role="alert" style="display: none;" id="error"> 
                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>                                           
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="<?php UrlBase::urlBase; ?>/src/Pages/login/login.js" type="module"></script>    
</body>

</html>