<?php
   include ('autoLoader.inc.php');
   function userCheck()
   {
   return (isset($_SESSION['login']) && $_SESSION['login']==true && isset($_SESSION['useremail']) && isset($_SESSION['password']) && isset($_SESSION['userstatus']));
   }

   if(!userCheck())
   {
       header("Location: login");
       exit();
   }