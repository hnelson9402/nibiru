<?php
use Config\UrlBase;
use Core\Auth;
use Core\Route;
use Helpers\Script;

$view = Route::route();

if ($view === 'login') {
   require './src/Pages/login/login.php';
} else if ($view === '404') {
   require './src/Pages/404/404.php';
} else {
   Auth::accessMain();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="shortcut icon" href="<?php echo UrlBase::urlBase;?>/public/img/anony.jpg">
    <title>Dashboard</title>
    <link href="<?php echo UrlBase::urlBase;?>/public/css/styles.css" rel="stylesheet" />
    <link href="<?php echo UrlBase::urlBase;?>/public/css/mdb.min.css" rel="stylesheet" />
    <script src="<?php echo UrlBase::urlBase;?>/public/libs/fontawesome/all.min.js"></script>
</head>

<body class="sb-nav-fixed">
   
    <!--Navbar-->
    <?php require './src/Pages/components/navbar.php'; ?>

    <!--Modal Change Password-->
    <?php require './src/Pages/components/modalChangePassword.php'; ?>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">                  

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Usuario
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?php echo UrlBase::urlBase; ?>/user/">Administrar usuario</a>
                                <!-- <a class="nav-link" href="<?php echo UrlBase::urlBase; ?>/adminuser/">Administrar usuario</a> -->
                            </nav>
                        </div>

                        <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>

                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"></div>
                                </a>

                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"></div>
                                </a>
                            </nav>
                        </div> -->
                      
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Bienvenido</div>                   
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">

            <main>
                <div class="container-fluid">
                    <?php include $view; ?>
                </div>
            </main>          

        </div>
    </div>

    <script src="<?php echo UrlBase::urlBase;?>/public/libs/bootstrap5/bootstrap.bundle.min.js"></script>
    <script src="<?php echo UrlBase::urlBase;?>/public/js/scripts.js" type="module"></script>

    <!--Cambiar script dinamicamente-->
    <?php Script::changeScript(); ?>

</body>

</html>
<!--Cerramos las etiquetas PHP del else-->
<?php
   }
?>