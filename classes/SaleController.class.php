<?php
    class SaleController extends SaleModel{

        /**Record New Sale */
        public function addNewSale($transaction_id,$invoiceno,$bookName,$unitprice,$qty,$soldby,$customerid,$payType,$payMethod,$amountpaid,$amountdue,$discount){

            $this->newSale($transaction_id,$invoiceno,$bookName,$unitprice,$qty,$soldby,$customerid,$payType,$payMethod,$amountpaid,$amountdue,$discount);
           
        }

        /**Record New Transaction */
        public function addTransaction($transaction_id,$invoiceno,$customerid,$soldby,$discount,$amountpaid,$amountdue,$payType,$payMethod){

            $this->fillTransaction($transaction_id,$invoiceno,$customerid,$soldby,$discount,$amountpaid,$amountdue,$payType,$payMethod);
           
        }

        /**Update Stocks Quantity */
        public function updateStockQuantity($newqty,$bookid){
            $this->updateStock($newqty,$bookid);           
        }

        /**Show BookUnit Price */
        public function showUnitPrice($bookid){
            global $unitprice;
            echo $unitprice = json_encode($this->getUnitPrice($bookid));
           /* foreach($unitprice as $u){
                echo $u['stock_sale_price'];
            }*/
         }

         /**Show Bookname */
         public function showBookName($bookid){
            $name = $this->getUnitPrice($bookid);
            foreach($name as $name){
                echo $name['stock_name'];
            }
         }

        /**Show BookUnit Price */
        public function showAllSale(){
            global $sale;
             $sale = $this->allSale();            
         }

        /**Show Items Under a Transaction */
        public function showTransaction($trid){
            global $items;
            $items = $this->getTransaction($trid);
            
         }

         /**Show Other Details */
        public function showOtherDetails($transaction_id){
            global $itemDet;
            $itemDet = $this->getOtherDetail($transaction_id);
            
        }


        /**Show Partially Paid or Unpaid Sale */
        public function showPayRecord(){
            global $psale;
             $psale = $this->payRecord();            
        }

        /**Show Single Pay */
        public function showSinglePayRecord($transaction_no){
            global $payRec;
            $payRec = $this->singlePayRecord($transaction_no);            
         }

         /**Update Pay Status */
        public function completePayUpdate($amountpaid,$payType,$payMethod,$transaction_no,$amount){
            $this->updatePayStatus($amountpaid,$payType,$payMethod,$transaction_no,$amount);           
        }

        /**
         * Reporting
         */

        /**Daily Sale */
        public function showDailySale(){
            global $daily;
            $daily = $this->dailySale();            
        }

        /**Weekly Sale */
        public function showWeekSale(){
            global $week;
            $week = $this->weekSale();            
        }

        /**Monthly Sale */
        public function showMonthSale(){
            global $month;
            $month = $this->monthSale();            
        }

        /**Yearly Sale */
        public function showYearSale(){
            global $year;
            $year = $this->yearSale();            
        }

        /**Total Book Sold */
        public function allBookSold(){
            global $soldbook;
            $soldbook = $this->totalBook();            
        }

        /**Show Sales Between two dates */
        public function showSaleReport($dateFrom, $dateTo){
            global $saleRpt;
             $saleRpt = $this->reportSale($dateFrom, $dateTo);            
        }

        //show Sales Month For Chart
        public function showSalesPerMonthChart($start, $end, $month){

            global $resMt, $sum;
            $sum = 0;
            $resMt = $this->salesPerMonthChart($start, $end, $month);   
            foreach($resMt as $sAmt){
                $sum += $sAmt['due_amount'];
            }
            return $sum;            

        }

        /**show individual item on return item page */
        public function showAllItemSold(){
            global $allSale;
             $allSale = $this->allItemSold();            
         }

         /**Update the sales and transaction table on click of process return */
        public function updateSalesQuantity($newqty,$bookid,$transaction_no){
            $this->updateSales($newqty,$bookid,$transaction_no);           
        }

        /**Update the Amount Due */
        public function updateAmount($newAmountDue,$transaction_no){
            $this->updateDueAmount($newAmountDue,$transaction_no);           
        }

        /**Show Transaction details of a single transaction */
        public function showTrDetails($transaction_no){
            global $tr;
             $tr = $this->trDetails($transaction_no);            
        }

        /**Show Available Quantity */
        public function showAvailQty($bookid){            
             $Qt = $this->getAvailQty($bookid);  
             foreach($Qt as $q){
                echo $q['stock_quantity'];
             }          
        }

        /**Update stock after return */
        public function finishUpdateStock($newStockQty,$stockid){
            $this->updateReturn($newStockQty,$stockid);          
        }

        /**Return new sale */
        public function addNewReturn($transaction_ref,$itemid,$itemprice,$initialqty,$returnqty,$returnstaff){

            $this->newReturn($transaction_ref,$itemid,$itemprice,$initialqty,$returnqty,$returnstaff);
           
        }

        /**Show return List */
        public function showReturnList(){
            global $ret;
            $ret = $this->getReturnList();
            
         }


    }