<?php
    class CustomerController extends CustomerModel{

        /**Craete New Book */
        public function InsertCustomer($category,$custname,$custmobile,$custaddress,$custemail){

            $this->createNewCustomer($category,$custname,$custmobile,$custaddress,$custemail);
           
        }

        /**Get all Customer */
        public function showCustomers(){

            global $cust;
            $cust = $this->getAllCustomer();
                 
        }

        /**Single Customer Details */
        public function customerDetails($custid){
            global $singleCust;
             $singleCust = $this->getSingleCustomer($custid);
                 
         }

        /**Update Customer Details */
        public function updateCustomerDetail($category,$custname,$custmobile,$custaddress,$custemail,$custid){

            $this->updateCustomer($category,$custname,$custmobile,$custaddress,$custemail,$custid);
           
        }

    }
