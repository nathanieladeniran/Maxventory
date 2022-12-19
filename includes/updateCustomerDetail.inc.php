<?php

    include ('autoLoader.inc.php');
   
    $custname=filter_var($_POST['custname'], FILTER_UNSAFE_RAW);
    $custemail=filter_var($_POST['custemail'], FILTER_SANITIZE_EMAIL);
    $category=filter_var($_POST['custcategory'], FILTER_UNSAFE_RAW);
    $custmobile=filter_var($_POST['custmobile'], FILTER_UNSAFE_RAW);
    $custaddress=filter_var($_POST['custaddress'], FILTER_UNSAFE_RAW);
    $custid=filter_var($_POST['custid'], FILTER_UNSAFE_RAW);
    
    
    $editCust = new CustomerController();
    $editCust->updateCustomerDetail($category,$custname,$custmobile,$custaddress,$custemail,$custid);

    