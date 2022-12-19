<?php

    include ('autoLoader.inc.php');
   
    $itemname=filter_var($_POST['itemname'], FILTER_UNSAFE_RAW);
    $itemno=filter_var($_POST['itemno'], FILTER_UNSAFE_RAW);
    $itemqty=filter_var($_POST['itemqty'], FILTER_UNSAFE_RAW);
    $retailprice=filter_var($_POST['retailprice'], FILTER_UNSAFE_RAW);
    $saleprice=filter_var($_POST['saleprice'], FILTER_UNSAFE_RAW);
    $author=filter_var($_POST['itemauthor'], FILTER_UNSAFE_RAW);
    $catname=filter_var($_POST['itemcategory'], FILTER_UNSAFE_RAW);
    $itemdescription=filter_var($_POST['itemdescription'], FILTER_UNSAFE_RAW);
    
    
    
    $newBook = new BookController();
    $newBook->InsertNewBook($catname,$itemno,$itemname,$itemdescription,$retailprice,$saleprice,$itemqty,$author);

    