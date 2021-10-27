<?php

namespace Helpers;

use Config\UrlBase;

class Script
{    
                    
    /*******************************Script necesarios para Datatable*****************************************/
    public static function scriptDatatable()
    {
        echo "<script src='" .UrlBase::urlBase. "/public/libs/datatables/datatables.min.js'></script>";
        echo "<script src='" .UrlBase::urlBase. "/public/libs/datatables/dataTables.buttons.js'></script>";
        echo "<script src='" .UrlBase::urlBase. "/public/libs/datatables/jszip.min.js'></script>";       
        echo "<script src='" .UrlBase::urlBase. "/public/libs/datatables/buttons.html5.min.js'></script>";      
        echo "<script src='" .UrlBase::urlBase. "/public/libs/datatables/dataTables.responsive.min.js'></script>";   
        echo "<script src='" .UrlBase::urlBase. "/public/libs/datatables/responsive.bootstrap.min.js'></script>";                  
    }

    /**************************************Cambiar script dinamicamente*******************************/
    public static function changeScript()
    {
        if (isset($_GET['route'])) {
            $params = explode("/", $_GET['route']);

            if ($params[0] == "user") {
                echo "<script src='" . UrlBase::urlBase. "/public/libs/jquery/jquery-3.6.0.min.js'></script>";
                self::scriptDatatable();
                echo "<script src='" . UrlBase::urlBase. "/src/Pages/user/user.js' type='module'></script>";
            } else if ($params[0] == "product") {                
                echo "<script src='" . UrlBase::urlBase. "/src/Pages/product/product.js' type='module'></script>";
            }
        }
    }
}
