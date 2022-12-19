<?php

    include ('autoLoader.inc.php');
   
    $rollno=filter_var($_POST['rollno'], FILTER_UNSAFE_RAW);    
    $staffid = filter_var($_POST['staffid'], FILTER_UNSAFE_RAW);
    $image ="";
    
    
    $editImg = new StaffController();
    $editImg->updateStaffProfilePics($image,$staffid,$rollno);

    