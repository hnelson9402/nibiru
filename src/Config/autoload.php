<?php

/**
 * *********************************************************
 *       Cargar archivos requeridos dinamicamente          *
 * *********************************************************
 * 
 * 
 */

spl_autoload_register(function($class){

     //Path
     $SERVER = dirname(__DIR__)."/";

     //Cargar clases dinamicamente
     $route = $SERVER. str_replace("\\" , "/" , $class . ".php");       

     //Validar si el archivo es legible
     if (is_readable($route)) {
          require_once "".$route;
     }else{
          echo "No se puede ubicar el archivo";
     }

 });