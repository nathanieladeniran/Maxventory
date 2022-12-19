<?php

    include ('autoLoader.inc.php');
   
    $authorname=filter_var($_POST['author_name'], FILTER_UNSAFE_RAW);
    $authorphone=filter_var($_POST['author_mobile'], FILTER_UNSAFE_RAW);
    $authoremail=filter_var($_POST['author_email'], FILTER_UNSAFE_RAW);
    $authoraddress=filter_var($_POST['author_address'], FILTER_UNSAFE_RAW);
    
    
    $newAuthor = new BookController();
    $newAuthor->InsertBookAuthor($authorname,$authorphone,$authoremail,$authoraddress);

    