<?php
    class CustomerModel extends DataConnect{

        //Create Book Category
        protected function createNewCustomer($category,$custname,$custmobile,$custaddress,$custemail){

            $setsql="INSERT INTO customers_table (customer_category,customer_name,customer_mobile,customer_address,customer_email) VALUES (?,?,?,?,?)";					
            $setstmt = $this->connect()->prepare($setsql);                    
            $setstmt->execute([$category,$custname,$custmobile,$custaddress,$custemail]);
            if($setstmt) {
                echo "New Customer Added";
            }
            else{
                 echo "Can not Add Customer";
            }
        }

         /** Get All Customer */
         protected function getAllCustomer(){
            
            try{
                $getCust = "SELECT * FROM customers_table ORDER BY customer_id DESC";
                $custStmt = $this->connect()->query($getCust);
                $results = $custStmt->fetchAll();
                return $results;                          
                
            }
            catch (PDOException $ex)
            {
                $ex->getMessage();
            }
        }

        /**Get Specific Customer */
        protected function getSingleCustomer($custid){

            try{
                $getOneCust = "SELECT * FROM customers_table WHERE customer_id=? ";
                $custStmt = $this->connect()->prepare($getOneCust);
                $custStmt->execute([$custid]);
                $results = $custStmt->fetchAll();
                if($results){
                    return $results;
                }else{
                    print_r($custStmt->errorInfo()); 
                }
                                                              
            }
            catch (PDOException $ex)
            {                
                $ex->getMessage();
            }
        }

        /**Update Customer Details */
        protected function updateCustomer($category,$custname,$custmobile,$custaddress,$custemail,$custid){            

            try{                
                $updateDet = "UPDATE customers_table SET customer_category=? ,customer_name=?,customer_mobile=?,customer_address=?,customer_email=? WHERE customer_id=? ";
                $updStmt = $this->connect()->prepare($updateDet);            
                $updStmt->execute([$category,$custname,$custmobile,$custaddress,$custemail,$custid]);  
                if($updStmt){
                    echo "Customer Details Updated";
                }else {
                    print_r($updStmt->errorInfo()); 
                }
                
            }
            catch (PDOException $ex)
            {   
                $ex->getMessage();
            }
        }


    }