<?php

    include ('autoLoader.inc.php');
   
    $itemCount = count($_POST["retcheck"]);
    $transaction_no=filter_var($_POST['trid'], FILTER_UNSAFE_RAW);
    $discount=filter_var($_POST['discount'], FILTER_UNSAFE_RAW);
    $returnstaff=filter_var($_POST['returnstaff'], FILTER_UNSAFE_RAW);
    $oldamountdue=filter_var($_POST['oldamountdue'], FILTER_UNSAFE_RAW);
    $returnsubtotal=filter_var($_POST['subtotal'], FILTER_UNSAFE_RAW);
    $newSubtotal = ($oldamountdue - $returnsubtotal);
    $newDiscount = ($discount/100)*($newSubtotal);  
    $newAmountDue = $newSubtotal-$newDiscount;
    //$returncustomer=filter_var($_POST['customer'], FILTER_UNSAFE_RAW);
    if($itemCount < 1){
        echo 'No Item Added';
    }else{
            for($i=0; $i<$itemCount; $i++){
                $qty=filter_var($_POST['qty'][$i], FILTER_UNSAFE_RAW);
                $qtyreturn=filter_var($_POST['qtyreturn'][$i], FILTER_UNSAFE_RAW);
                $newqty = $qty - $qtyreturn;
                $bookid=filter_var($_POST['saleid'][$i], FILTER_UNSAFE_RAW);                
                $stockid=filter_var($_POST['stockid'][$i], FILTER_UNSAFE_RAW);
                $price=filter_var($_POST['itemprice'][$i], FILTER_UNSAFE_RAW);   
                /*$newAmount = ($newqty*$price);
                $newDiscount = ($discount/100)*($newAmount);  
                $newAmountDue = $newAmount-$newDiscount;*/
                $availStock=filter_var($_POST['availqty'][$i], FILTER_UNSAFE_RAW);
                $newStockQty = $qtyreturn+$availStock;
                
                
                
                $updQty = new SaleController();
                $updQty->updateSalesQuantity($newqty,$bookid,$transaction_no,$newAmountDue);
                $updQty->updateAmount($newAmountDue,$transaction_no);
                $updQty->finishUpdateStock($newStockQty,$stockid);
                $updQty->addNewReturn($transaction_no,$stockid,$price,$qty,$qtyreturn,$returnstaff);
                
            }
    }

    