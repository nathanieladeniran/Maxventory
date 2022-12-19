<?php

    include ('autoLoader.inc.php');
   
    $catname=filter_var($_POST['catname'], FILTER_UNSAFE_RAW);
    $catdescribe=filter_var($_POST['catdescription'], FILTER_UNSAFE_RAW);
    $catid=filter_var($_POST['catid'], FILTER_UNSAFE_RAW);
    
    
    $updateCat = new BookController();
    $updateCat->updateBookCategoryDetails($catid,$catname,$catdescribe);

    