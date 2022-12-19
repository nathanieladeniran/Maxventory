<?php 

    session_start();
    spl_autoload_register('detAutoLoader');
    
    function detAutoLoader($className){
        $path = 'classes/';
        $ext = '.class.php';
        $fullpath = '../'.$path.$className.$ext;
        $fullpath2 = $path.$className.$ext;
        
        if(file_exists($fullpath))
        {
           // return false;
           //echo 'no file selected';
           include_once $fullpath;
        }else if(file_exists($fullpath2))
        {
            include_once $fullpath2;
        }else{
            echo 'no file selected';
        }
        
    }