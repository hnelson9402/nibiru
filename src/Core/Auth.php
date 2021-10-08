<?php

namespace Core;

use Config\UrlBase;

class Auth{    

    /*************Validar si el usuario esta logeado************/
    public static function accessLogin(){
        if (isset($_SESSION['status'])) {
            return header("location: ".UrlBase::urlBase."/main/");
        }
    }
    
    /*********Validar si el usuario no esta logeado********/
    public static function accessMain(){
        if (!isset($_SESSION['status'])) {
            return header("location: ".UrlBase::urlBase."");
        }  
    }

    /*******************Validar si el usuario tiene privilegios*************************/
    // public static function userPrivilege(){
    //     if (isset($_GET['route'])) {
    //         $route = explode("/",$_GET['route']);
    //         $privilege = $_SESSION['user']['rol'];
            
    //         if ($route[0] == "user" && $privilege > 1) {
    //             echo "<script>window.location.href='".UrlBase::urlBase."main/'</script>";               
    //         }else if($route[0] == "group" && $privilege > 2){
    //             echo "<script>window.location.href='".UrlBase::urlBase."main/'</script>";
    //         }        
    //     }
    // }    
}