<?php

    include ('autoLoader.inc.php');
   
    $bookname=filter_var($_POST['itemname'], FILTER_UNSAFE_RAW);
    $bookno=filter_var($_POST['itemno'], FILTER_UNSAFE_RAW);
    $bookquantity=filter_var($_POST['itemqty'], FILTER_UNSAFE_RAW);
    $bookretail=filter_var($_POST['retailprice'], FILTER_UNSAFE_RAW);
    $booksale=filter_var($_POST['saleprice'], FILTER_UNSAFE_RAW);
    $bookauthor=filter_var($_POST['itemauthor'], FILTER_UNSAFE_RAW);
    $catname=filter_var($_POST['itemcategory'], FILTER_UNSAFE_RAW);
    $bookdescribe=filter_var($_POST['itemdescription'], FILTER_UNSAFE_RAW);
    $bookid=filter_var($_POST['bookid'], FILTER_UNSAFE_RAW);
    
    $newquantity=filter_var($_POST['newqty'], FILTER_UNSAFE_RAW);

    $bookquantity += $newquantity;
    
    
    $updateBook = new BookController();
    $updateBook->updateBookDetails($bookid, $catname, $bookno, $bookname, $bookdescribe, $bookretail, $booksale, $bookquantity, $bookauthor);

    