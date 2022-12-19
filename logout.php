<?php
session_start(); //start session
 
//destroy session
//session_destroy();

unset($_SESSION['password']);
unset($_SESSION['acctid']);
unset($_SESSION['fullname']);
unset($_SESSION['acctemail']);
unset($_SESSION['acctstatus']);
unset($_SESSION['accttype']);
$_SESSION['login']=false;
unset($_SESSION['token']);
 
header ("Location: login");
?>