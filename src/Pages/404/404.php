<?php

use Config\UrlBase;

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="shortcut icon" href="<?php echo UrlBase::urlBase; ?>/public/img/anony.jpg">         
        <title>404</title>
        <link href="<?php echo UrlBase::urlBase; ?>/public/css/styles.css" rel="stylesheet" />
        <script src="<?php echo UrlBase::urlBase; ?>/public/libs/fontAwesome/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div id="layoutError">
            <div id="layoutError_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="text-center mt-4">
                                    <img class="mb-4 img-error" src="<?php echo UrlBase::urlBase; ?>/public/img/error-404.svg" />
                                    <p class="lead">La página solicitada no existe.</p>
                                    <a href="<?php echo UrlBase::urlBase; ?>">
                                        <i class="fas fa-arrow-left me-1"></i>
                                        Regresar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>           
        </div>            
    </body>
</html>
