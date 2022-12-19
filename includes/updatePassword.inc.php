<?php

    include ('autoLoader.inc.php');
    $oldpass=filter_var($_POST['old_pass']);
    $currentpass=filter_var($_POST['currentpass']);
    
    if(password_verify($oldpass,$currentpass)){
        $userid = filter_var($_POST['userid'], FILTER_UNSAFE_RAW);
        $password = password_hash($_POST['new_password'],PASSWORD_BCRYPT);
        $userpass = $password;           
        
        $newLogin = new StaffController();
        $newLogin->createNewLogin($userid,$userpass);
    }else {
        echo 'incorrect';
    }
   
    

    