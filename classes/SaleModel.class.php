<?php
    class SaleModel extends DataConnect{

        /**Record New Sale */
        protected function newSale($transaction_id,$invoiceno,$bookName,$unitprice,$qty,$soldby,$customerid,$payType,$payMethod,$amountpaid,$amountdue,$discount){

            $setsql="INSERT INTO sales_table (transaction_id,invoice_number,item_id,item_price,quantity_purchased,customer_id) 
                 VALUES (?,?,?,?,?,?)";					
            $setstmt = $this->connect()->prepare($setsql);                    
            $setstmt->execute([$transaction_id,$invoiceno,$bookName,$unitprice,$qty,$customerid]);
            if($setstmt) {
                //echo "New Sale Record Added";
                //$this->fillTransaction($transaction_id,$invoiceno,$soldby,$discount,$amountpaid,$amountdue,$payType,$payMethod);
            }
            else{
                echo "Can Not New Record";
            }            
            
        }


        /**Insert into Transaction Table */
        protected function fillTransaction($transaction_id,$invoiceno,$customerid,$soldby,$discount,$amountpaid,$amountdue,$payType,$payMethod){

            $setTr ="INSERT INTO transactions_table (transaction_no,invoice_no,customer,sold_by,discount,amount_paid,amount_due,paytype,paymtd) 
                 VALUES (?,?,?,?,?,?,?,?,?)";					
            $setStmt = $this->connect()->prepare($setTr);                    
            $setStmt->execute([$transaction_id,$invoiceno,$customerid,$soldby,$discount,$amountpaid,$amountdue,$payType,$payMethod]);
            if($setStmt) {
                echo "New Sale Record Added";
            }
            else{
                echo "Can not Add Sale";
            }
        }

        /**Update Stock after sales */
        protected function updateStock($newqty,$bookid){

            try{                
                $updateDet = "UPDATE stocks_table SET stock_quantity=? WHERE stock_id=? ";
                $updStmt = $this->connect()->prepare($updateDet);                
                $updStmt->execute([$newqty,$bookid]);   
            }
            catch (PDOException $ex)
            {                
                $ex->getMessage();
            }
        }


        /**Get Book Unit Price */
        protected function getUnitPrice($bookid){

            try{
                $getUnit = "SELECT * FROM stocks_table WHERE stock_id=? ";
                $unitStmt = $this->connect()->prepare($getUnit);
                $unitStmt->execute([$bookid]);
                $results = $unitStmt->fetchAll();
                if($results){
                    return $results;
                }else{
                    print_r($unitStmt->errorInfo()); 
                }
                                              
                
            }
            catch (PDOException $ex)
            {                
                $ex->getMessage();
            }
        }

        /**Get all Sales */
        protected function allSale(){

            try{
                $getSale = "SELECT * FROM transactions_table ORDER BY tr_id DESC";
                $saleStmt = $this->connect()->query($getSale);
                $results = $saleStmt->fetchAll();
                if($results){
                    return $results;
                }
                                              
                
            }
            catch (PDOException $ex)
            {                
                $ex->getMessage();
            }
        }

        /**Get Item Under a Transaction */
        protected function getTransaction($trid){

            try{
                $getUnit = "SELECT sales_table.*,transactions_table.* FROM sales_table INNER JOIN transactions_table ON sales_table.transaction_id=transactions_table.transaction_no 
                WHERE sales_table.transaction_id=? ";
                $unitStmt = $this->connect()->prepare($getUnit);
                $unitStmt->execute([$trid]);
                $results = $unitStmt->fetchAll();
                if($results){
                    return $results;
                }else{
                    print_r($unitStmt->errorInfo()); 
                }
                       
            }
            catch (PDOException $ex)
            {                
                $ex->getMessage();
            }
        }

        /**Get Other info about transaction */
        protected function getOtherDetail($transaction_id){

            try{
                $getUnit = "SELECT invoice_number,customer_id FROM sales_table WHERE transaction_id=? GROUP BY invoice_number  ";
                $unitStmt = $this->connect()->prepare($getUnit);
                $unitStmt->execute([$transaction_id]);
                $results = $unitStmt->fetchAll();
                if($results){
                    return $results;
                }else{
                    print_r($unitStmt->errorInfo()); 
                }
                                              
                
            }
            catch (PDOException $ex)
            {                
                print_r($unitStmt->errorInfo()); 
                $ex->getMessage();
            }
        }

        /**Get all Unpaid or Partially Paid Sales */
        protected function payRecord(){

            try{
                $getSale = "SELECT * FROM transactions_table WHERE paytype != 'Full Payment' ORDER BY tr_id DESC";
                $saleStmt = $this->connect()->query($getSale);
                $results = $saleStmt->fetchAll();
                if($results){
                    return $results;
                }else{
                    print_r($saleStmt->errorInfo()); 
                }                                           
                
            }catch (PDOException $ex)
            {                
                $ex->getMessage();
            }
        }

        /**Get SIngle Pay Record */
        protected function singlePayRecord($transaction_no){

            try{
                $getSale = "SELECT * FROM transactions_table WHERE transaction_no='$transaction_no' ";
                $saleStmt = $this->connect()->query($getSale);
                $results = $saleStmt->fetchAll();
                if($results){
                    return $results;
                }else{
                    print_r($saleStmt->errorInfo()); 
                }
                                              
                
            }
            catch (PDOException $ex)
            {                
                $ex->getMessage();
            }
        }

        /**Update Payment Status */
        protected function updatePayStatus($amountpaid,$payType,$payMethod,$transaction_no,$amount){

            try{                
                $updatePay = "UPDATE transactions_table SET amount_paid= ?, paytype= ?, paymtd= ? WHERE transaction_no='$transaction_no' ";
                $updStmt = $this->connect()->prepare($updatePay);                
                $updStmt->execute([$amountpaid,$payType,$payMethod]); 
                if($updStmt){
                    echo "Payment Updated";
                }  
            }
            catch (PDOException $ex)
            {    
                print_r($updStmt->errorInfo()); 
                $ex->getMessage();
            }
        }


        /****
         * Reporting of Sales
         */
    
        /**Daily Sale */
        protected function dailySale(){

            try{
                $rpt = "SELECT SUM(amount_due) AS totalSale, SUM(amount_paid) AS totalPay, COUNT(tr_id) AS totalTransact FROM transactions_table WHERE CAST(transaction_date AS DATE) = CURDATE() ";
                $rptStmt = $this->connect()->query($rpt);  
                $results = $rptStmt->fetchAll();
                if($results){
                    return $results;
                }else{
                    print_r($rptStmt->errorInfo()); 
                }
            }catch (PDOException $ex)
            {                
                print_r($rptStmt->errorInfo()); 
                $ex->getMessage();
            }
        }


        /**Daily Sale */
        protected function weekSale(){

            try{
                $rpt = "SELECT SUM(amount_due) AS totalSale, SUM(amount_paid) AS totalPay, COUNT(tr_id) AS totalTransact FROM transactions_table WHERE WEEK(transaction_date) = (SELECT WEEK(CURDATE()) ) ";
                $rptStmt = $this->connect()->query($rpt);  
                $results = $rptStmt->fetchAll();
                if($results){
                    return $results;
                }else{
                    print_r($rptStmt->errorInfo()); 
                }
            }catch (PDOException $ex)
            {                
                print_r($rptStmt->errorInfo()); 
                $ex->getMessage();
            }
        }

        /**Monthly Sale */
        protected function monthSale(){
            try{
                $rpt = "SELECT SUM(amount_due) AS totalSale, SUM(amount_paid) AS totalPay, COUNT(tr_id) AS totalTransact FROM transactions_table WHERE MONTH(transaction_date) = (SELECT MONTH(CURDATE()) ); ";
                $rptStmt = $this->connect()->query($rpt);  
                $results = $rptStmt->fetchAll();
                if($results){
                    return $results;
                }else{
                    print_r($rptStmt->errorInfo()); 
                }
            }catch (PDOException $ex)
            {                
                print_r($rptStmt->errorInfo()); 
                $ex->getMessage();
            }
        }

        /**Yearly Sale */
        protected function yearSale(){
            try{
                $rpt = "SELECT SUM(amount_due) AS totalSale, SUM(amount_paid) AS totalPay, COUNT(tr_id) AS totalTransact FROM transactions_table WHERE YEAR(transaction_date) = (SELECT YEAR(CURDATE()) ); ";
                $rptStmt = $this->connect()->query($rpt);  
                $results = $rptStmt->fetchAll();
                if($results){
                    return $results;
                }else{
                    print_r($rptStmt->errorInfo()); 
                }
            }catch (PDOException $ex)
            {                
                print_r($rptStmt->errorInfo()); 
                $ex->getMessage();
            }
        }

        /**Get total book sold */
        protected function totalBook(){
            try{
                $bookSold = "SELECT SUM(quantity_purchased) AS totalBook FROM sales_table";
                $bStmt = $this->connect()->query($bookSold);  
                $results = $bStmt->fetchAll();
                if($results){
                    return $results;
                }else{
                    print_r($bStmt->errorInfo()); 
                }
            }catch (PDOException $ex)
            {                
                print_r($bStmt->errorInfo()); 
                $ex->getMessage();
            }
        }

        /**Get all Sales Record between two dates */
        protected function reportSale($dateFrom, $dateTo){

            try{
                $getSale = "SELECT * FROM transactions_table WHERE CAST(transaction_date AS DATE) BETWEEN '$dateFrom' AND '$dateTo' ORDER BY tr_id DESC";
                $saleStmt = $this->connect()->query($getSale);
                $results = $saleStmt->fetchAll();
                if($results){
                    return $results;
                    var_dump($results);
                }else{
                    //print_r($saleStmt->errorInfo()); 
                }                                           
                
            }catch (PDOException $ex)
            {                
                $ex->getMessage();
            }
        }

        //Show Monthly Sales for Chart
        protected function salesPerMonthChart($start, $end, $month){

            try{
                $getSaleChart = "SELECT SUM(amount_due) AS due_amount FROM transactions_table WHERE CAST(transaction_date AS DATE) BETWEEN '$start' AND '$end' AND MONTHNAME(CAST(transaction_date AS DATE)) = '$month' ";
                $chStmt = $this->connect()->query($getSaleChart);
                $results = $chStmt->fetchAll();
                return $results;    
            
            }
            catch (PDOException $ex)
            {
                $ex->getMessage();
            }
        }

        //show individual item on return item page
        protected function allItemSold(){

            try{
                $getSale = "SELECT * FROM sales_table ORDER BY sales_id DESC";
                $saleStmt = $this->connect()->query($getSale);
                $results = $saleStmt->fetchAll();
                if($results){
                    return $results;
                }else{
                    print_r($saleStmt->errorInfo()); 
                }
                                              
                
            }
            catch (PDOException $ex)
            {                
                $ex->getMessage();
            }
        }

        /**Update the sales and transaction table on click of process return */
        protected function updateSales($newqty,$bookid,$transaction_no){

            try{                
                $updateDet = "UPDATE sales_table SET quantity_purchased=? WHERE sales_id=? AND transaction_id=? ";
                $updStmt = $this->connect()->prepare($updateDet);                
                $updStmt->execute([$newqty,$bookid,$transaction_no]); 
               
            }
            catch (PDOException $ex)
            {                
                print_r($updStmt->errorInfo()); 
            }
        }


        /**Update amount due on transactions table */
        protected function updateDueAmount($newAmountDue,$transaction_no){

            try{                
                $updateDet = "UPDATE transactions_table SET amount_due=? WHERE transaction_no=? ";
                $updStmt = $this->connect()->prepare($updateDet);                
                $updStmt->execute([$newAmountDue,$transaction_no]);   
               
            }
            catch (PDOException $ex)
            {                
                print_r($updStmt->errorInfo()); 
            }
        }


        /**Get Transaction details of a single transaction */
        protected function trDetails($transaction_no){

            try{
                $getSale = "SELECT * FROM transactions_table WHERE transaction_no = '$transaction_no' ";
                $saleStmt = $this->connect()->query($getSale);
                $results = $saleStmt->fetchAll();
                if($results){
                    return $results;
                }else{
                    print_r($saleStmt->errorInfo()); 
                }                                           
                
            }catch (PDOException $ex)
            {                
                $ex->getMessage();
            }
        }

        /**get stock quantity */
        protected function getAvailQty($bookid){

            try{
                $getSale = "SELECT * FROM stocks_table WHERE stock_id = '$bookid' ";
                $saleStmt = $this->connect()->query($getSale);
                $results = $saleStmt->fetchAll();
                if($results){
                    return $results;
                }else{
                    print_r($saleStmt->errorInfo()); 
                }                                           
                
            }catch (PDOException $ex)
            {                
                $ex->getMessage();
            }
        }

        /**Update stock after return */
        protected function updateReturn($newStockQty,$stockid){

            try{                
                $updateDet = "UPDATE stocks_table SET stock_quantity=? WHERE stock_id=? ";
                $updStmt = $this->connect()->prepare($updateDet);                
                $updStmt->execute([$newStockQty,$stockid]);   
            }
            catch (PDOException $ex)
            {                
                $ex->getMessage();
            }
        }

        /**Save return into database */
        protected function newReturn($transaction_ref,$itemid,$itemprice,$initialqty,$returnqty,$returnstaff){

            $setsql="INSERT INTO returns_table (transaction_ref,item_no,item_price,initial_qty,return_qty,return_staff) 
                 VALUES (?,?,?,?,?,?)";					
            $setstmt = $this->connect()->prepare($setsql);                    
            $setstmt->execute([$transaction_ref,$itemid,$itemprice,$initialqty,$returnqty,$returnstaff]);
            if($setstmt) {
                //echo "New Sale Record Added";
                //$this->fillTransaction($transaction_id,$invoiceno,$soldby,$discount,$amountpaid,$amountdue,$payType,$payMethod);
            }
            else{
                echo "Can Not New Record";
            }            
            
        }

        /**Get return List */
        protected function getReturnList(){

            try{
                $getUnit = "SELECT * FROM returns_table ORDER BY return_id DESC";
                $unitStmt = $this->connect()->query($getUnit);
                $results = $unitStmt->fetchAll();
                if($results){
                    return $results;
                }
            }
            catch (PDOException $ex)
            {                
                $ex->getMessage();
                print_r($unitStmt->errorInfo()); 
            }
        }


    }