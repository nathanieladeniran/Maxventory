<?php

    include ('autoLoader.inc.php');
   
    $userid = filter_var($_POST['staff_id'], FILTER_UNSAFE_RAW);
    $password = password_hash($_POST['staff_password'],PASSWORD_BCRYPT);
    $userpass = $password;

    
    
    
    $newLogin = new StaffController();
    $newLogin->createNewLogin($userid,$userpass);

    