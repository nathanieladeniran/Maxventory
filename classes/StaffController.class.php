<?php
    class StaffController extends StaffModel{

        /**Craete New Book */
        public function InsertStaff($rollno,$fname,$lname,$role,$email,$mobile,$username,$address,$status,$dob,$image){

            $this->createNewStaff($rollno,$fname,$lname,$role,$email,$mobile,$username,$address,$status,$dob,$image);
           
        }

        /**Get all Staff */
        public function showStaffs(){

            global $staff;
            $staff = $this->getAllStaff();
                 
        }

        /**Get all Staff Apart from Managing director */
        public function showMyStaffs(){

            global $myStaff;
            $myStaff = $this->getMyStaff();
                 
        }

        /**Specific Staff Details */
        public function userDetails($userid, $rollno){
            global $user;
             $user = $this->getUser($userid, $rollno);
                 
         }

         /**Craete Staff Login */
        public function createNewLogin($userid, $userpass){

            $this->createPassword($userid, $userpass);
           
        }

        /**Update Staff Details */
        public function updateStaffDetails($fname,$lname,$role,$email,$mobile,$username,$address,$status,$dob,$gname,$gemail,$rollno,$staffid){

            $this->updateStaff($fname,$lname,$role,$email,$mobile,$username,$address,$status,$dob,$gname,$gemail,$rollno,$staffid);
           
        }

        /**Update Staff Picture */
        public function updateStaffProfilePics($image,$staffid,$rollno){

            $this->updatePics($image,$staffid,$rollno);
           
        }


    }
