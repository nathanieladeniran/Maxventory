<?php

    include ('autoLoader.inc.php');
   
    $itemCount = count($_POST["itemcheck"]);   
    $payMethod = filter_var($_POST['paymethod'], FILTER_UNSAFE_RAW);
    $customerid = filter_var($_POST['custname'], FILTER_UNSAFE_RAW);                       
    $discount = filter_var($_POST['discount'], FILTER_UNSAFE_RAW);
    $soldby = $_SESSION['userfname'];
    $amountpaid = filter_var($_POST['amountpaid'], FILTER_UNSAFE_RAW);
    $amountdue = filter_var($_POST['amountdue'], FILTER_UNSAFE_RAW);
    $transaction_id = $_POST['trid'];
    $invoiceno = "MAX".time(); 
    $diffPay = $amountdue-$amountpaid;
    //$payType = "";
    //$payType = filter_var($_POST['paytype'], FILTER_UNSAFE_RAW);
    if($amountpaid == 0){ $payType = "No Payment"; }else{
    if ($diffPay == 0) {$payType = "Full Payment"; }else if(($diffPay > 0) && ($diffPay < $amountdue)){$payType = "Part Payment";}
    }

    
    if($itemCount < 1){
        echo 'No Item Added';
    }else{
        $newSale = new SaleController();

        for($i=0; $i<$itemCount; $i++){

            $bookName = filter_var($_POST['bookname'][$i]);
            $unitprice = filter_var($_POST['unitprice'][$i]);
            $qty = filter_var($_POST['quantity'][$i]);    
            $availstock = filter_var($_POST['availqty'][$i]);
            $newqty = $availstock-$qty;
            $newSale->addNewSale($transaction_id,$invoiceno,$bookName,$unitprice,$qty,$soldby,$customerid,$payType,$payMethod,$amountpaid,$amountdue,$discount);
            $newSale->updateStockQuantity($newqty,$bookName);    
        }
        $newSale->addTransaction($transaction_id,$invoiceno,$customerid,$soldby,$discount,$amountpaid,$amountdue,$payType,$payMethod);
    }

    