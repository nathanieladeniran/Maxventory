<?php

    include ('autoLoader.inc.php');
   
    $bookid = filter_var($_POST['bookid'], FILTER_UNSAFE_RAW);
        
    
    $unit = new SaleController();
    $unit->showUnitPrice($bookid);

    