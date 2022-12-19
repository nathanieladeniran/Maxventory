<?php

    include ('autoLoader.inc.php');
   
    $loginid = filter_var($_POST['loginid'], FILTER_UNSAFE_RAW);
    $password = filter_var($_POST['loginpass']);

    
    
    
    $newLogin = new UserController();
    $newLogin->userLogin($loginid, $password);

    