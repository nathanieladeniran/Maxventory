<?php

    include ('autoLoader.inc.php');
   
    $amount_sent = filter_var($_POST['amount_sent'], FILTER_UNSAFE_RAW);
    $amount = filter_var($_POST['alreadypay'], FILTER_UNSAFE_RAW);
    $amountdue = filter_var($_POST['amtdue'], FILTER_UNSAFE_RAW);
    //$payType = filter_var($_POST['paytype'], FILTER_UNSAFE_RAW);
    $payMethod = filter_var($_POST['paymethod'], FILTER_UNSAFE_RAW);
    $transaction_no = filter_var($_POST['trno'], FILTER_UNSAFE_RAW);
    $amountpaid = $amount_sent+$amount;
    
    //$diffPay = $amountdue-$amount;
    if($amountdue == $amount_sent){ $payType = "Full Payment"; }else{ $payType = "Part Payment"; }
    $updatePay = new SaleController();
    $updatePay->completePayUpdate($amountpaid,$payType,$payMethod,$transaction_no,$amount);

    