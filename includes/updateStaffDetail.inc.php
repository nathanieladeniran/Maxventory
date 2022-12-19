<?php

    include ('autoLoader.inc.php');
   
    $rollno=filter_var($_POST['rollno'], FILTER_UNSAFE_RAW);
    $fname=filter_var($_POST['staff_fname'], FILTER_UNSAFE_RAW);
    $lname=filter_var($_POST['staff_lname'], FILTER_UNSAFE_RAW);
    $role=filter_var($_POST['staff_category'], FILTER_UNSAFE_RAW);
    $email=filter_var($_POST['staff_email'], FILTER_SANITIZE_EMAIL);
    $mobile=filter_var($_POST['staff_mobile'], FILTER_UNSAFE_RAW);
    $address=filter_var($_POST['staff_address'], FILTER_UNSAFE_RAW);
    $dob=filter_var($_POST['staff_dob'], FILTER_UNSAFE_RAW);
    $username=$fname;
    $status = filter_var($_POST['user_status'], FILTER_UNSAFE_RAW);
    $gname = filter_var($_POST['g_name'], FILTER_UNSAFE_RAW);
    $gemail = filter_var($_POST['g_email'], FILTER_UNSAFE_RAW);
    $staffid = filter_var($_POST['staffid'], FILTER_UNSAFE_RAW);
    
    
    $editStaff = new StaffController();
    $editStaff->updateStaffDetails($fname,$lname,$role,$email,$mobile,$username,$address,$status,$dob,$gname,$gemail,$rollno,$staffid);

    