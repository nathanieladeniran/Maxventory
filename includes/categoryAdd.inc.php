<?php

    include ('autoLoader.inc.php');
   
    $catname=filter_var($_POST['catname'], FILTER_UNSAFE_RAW);;
    $catdescription=filter_var($_POST['catdescription'], FILTER_UNSAFE_RAW);
    $addby=filter_var($_POST['addby'], FILTER_UNSAFE_RAW);
    
    
    $newBook = new BookController();
    $newBook->InsertBookCategory($catname,$catdescription,$addby);

    