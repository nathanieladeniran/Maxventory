<?php
    class StaffModel extends DataConnect{

        //Create New Staff
        protected function createNewStaff($rollno,$fname,$lname,$role,$email,$mobile,$username,$address,$status,$dob,$image){

                    $validextensions = array("jpeg", "jpg", "png");
                    $temporary = explode(".", $_FILES['staffImg']['name']);
                    $file_extension = end($temporary);
                    if ((($_FILES["staffImg"]["type"] == "image/png") || ($_FILES["staffImg"]["type"] == "image/jpg") || 
                    ($_FILES["staffImg"]["type"] == "image/jpeg")) && ($_FILES["staffImg"]["size"] < (50000*1024) && in_array($file_extension, $validextensions)))
                    {
                        if (file_exists("../staffimage/".time().'-' . $_FILES["staffImg"]["name"])) {
				
                            echo "Image Already Exist";                        
                        }else{
                            $staffImg="../staffimage/".time().'-'.$_FILES['staffImg']['name']; $image = $staffImg;
                            move_uploaded_file($_FILES["staffImg"]["tmp_name"],"../staffimage/".time().'-'.$_FILES["staffImg"]["name"]);

                            $setsql= "INSERT INTO users_table (user_rollno,user_fname,user_lname,user_role,user_email,user_mobile,username,user_address,user_status,user_dob,user_image) VALUES (?,?,?,?,?,?,?,?,?,?,?)";					
                            $setstmt = $this->connect()->prepare($setsql);                    
                            $setstmt->execute([$rollno,$fname,$lname,$role,$email,$mobile,$username,$address,$status,$dob,$image]);
                            if($setstmt) {
                                echo "New Staff Added";
                            }
                            else{
                                echo "Can not Add New Staff";
                            }
                        }
                    }
        }

         //Get All Staff
         protected function getAllStaff(){
            
            try{
                $getCust = "SELECT * FROM users_table";
                $custStmt = $this->connect()->query($getCust);
                $results = $custStmt->fetchAll();
                return $results;                          
                
            }
            catch (PDOException $ex)
            {
                $ex->getMessage();
            }
        }

        //Get Staff apart from Managing director
        protected function getMyStaff(){
            
            try{
                $getSta = "SELECT * FROM users_table WHERE user_role != 'Managing Director' ";
                $custStmt = $this->connect()->query($getSta);
                $results = $custStmt->fetchAll();
                return $results;                          
                
            }
            catch (PDOException $ex)
            {
                $ex->getMessage();
            }
        }

        /**Get Specific Staff */
        protected function getUser($userid, $rollno){

            try{
                $getUser = "SELECT * FROM users_table WHERE user_id=? AND user_rollno=? ";
                $userStmt = $this->connect()->prepare($getUser);
                $userStmt->execute([$userid, $rollno]);
                $results = $userStmt->fetchAll();
                if($results){
                    return $results;
                }else{
                    print_r($userStmt->errorInfo()); 
                }
                                              
                
            }
            catch (PDOException $ex)
            {                
                $ex->getMessage();
            }
        }
        /**Create Login Password for Staff */
        public function createPassword($userid, $userpass){

            try{
                $setPass = "UPDATE users_table SET password = '$userpass' WHERE user_id=? ";
                $passStmt = $this->connect()->prepare($setPass);
                $passStmt->execute([$userid]);
                if($passStmt){
                    echo "Login Created";
                }else {
                    print_r($passStmt->errorInfo()); 
                }
                
            }
            catch (PDOException $ex)
            {                
                $ex->getMessage();
            }
        }

        /**Update Staff Details */
        protected function updateStaff($fname,$lname,$role,$email,$mobile,$username,$address,$status,$dob,$gname,$gemail,$rollno,$staffid){            

            try{                
                $updateDet = "UPDATE users_table SET user_fname=?,user_lname=?,user_role=?,user_email=?,user_mobile=?,username=?,user_address=?,user_status=?,user_dob=?,g1_name=?,g1_email=?
                WHERE user_rollno=? AND user_id=? ";
                $updStmt = $this->connect()->prepare($updateDet);                
                $updStmt->execute([$fname,$lname,$role,$email,$mobile,$username,$address,$status,$dob,$gname,$gemail,$rollno,$staffid]);                
                if($updStmt){
                    echo "Staff Details Updated";
                }else {
                    print_r($updStmt->errorInfo()); 
                }
                
            }
            catch (PDOException $ex)
            {        
                print_r($updStmt->errorInfo());         
                $ex->getMessage();
            }
        }

        /**Update user picture */
        protected function updatePics($image,$staffid,$rollno){

            try{   
                $validextensions = array("jpeg", "jpg", "png");
                    $temporary = explode(".", $_FILES['staffImg']['name']);
                    $file_extension = end($temporary);
                    if ((($_FILES["staffImg"]["type"] == "image/png") || ($_FILES["staffImg"]["type"] == "image/jpg") || 
                    ($_FILES["staffImg"]["type"] == "image/jpeg")) && ($_FILES["staffImg"]["size"] < (50000*1024) && in_array($file_extension, $validextensions)))
                    {
                        if (file_exists("../staffimage/".time().'-' . $_FILES["staffImg"]["name"])) {
				
                            echo "Image Already Exist";                        
                        }else{
                            $staffImg="../staffimage/".time().'-'.$_FILES['staffImg']['name']; $image = $staffImg;
                            move_uploaded_file($_FILES["staffImg"]["tmp_name"],"../staffimage/".time().'-'.$_FILES["staffImg"]["name"]);       

                            $updateDet = "UPDATE users_table SET user_image = ?  WHERE user_id=? AND user_rollno=? ";
                            $updStmt = $this->connect()->prepare($updateDet);                
                            $updStmt->execute([$image,$staffid,$rollno]);                
                            if($updStmt){
                                echo "Staff Picture Updated";
                            }else {
                                print_r($updStmt->errorInfo()); 
                            }
                        }
                    }
                
            }
            catch (PDOException $ex)
            {        
                print_r($updStmt->errorInfo());         
                $ex->getMessage();
            }
        }


    }