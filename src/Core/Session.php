<?php 

namespace Core;

use Config\UrlBase;

class Session{         
       
    /*******Iniciar sesión de usuario*********/
    public static function sessionStart(string $name)
    {
        session_name(hash('sha256', $name));
        session_start();
    }
    
    /***************Cerrar sesión de usuario*****************/
    public static function closeSession()
    {    
        session_regenerate_id(true);           
        //Delete all the cookies 
        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', time()-1000);
                setcookie($name, '', time()-1000, '/');
            }
        }
        session_unset();
        session_destroy();
        session_write_close();        	
        header("location: ".UrlBase::urlBase."");        
    }   
}