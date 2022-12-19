<?php
    class UserModel extends DataConnect{

        //Admin Account Login
        protected function setLogin($loginid, $password){

            try{
                $loginsql = "SELECT * FROM users_table WHERE (user_email='$loginid' AND user_status='ACTIVE' OR user_rollno = '$loginid' AND user_status='ACTIVE') "; #(user_email = ? AND user_status='ACTIVE') OR
                $logstmt = $this->connect()->prepare($loginsql);
                $logstmt->execute([$loginid]);
                $results = $logstmt->fetchAll();
                foreach($results as $result){
                    $_SESSION['username'] = $result['username'];
                    $_SESSION['password'] = $result['password'];
                    $_SESSION['userid'] = $result['user_id'];
                    $_SESSION['userfname'] = $result['user_fname'];
                    $_SESSION['userlname'] = $result['user_lname'];
                    $_SESSION['useremail'] = $result['user_email'];
                    $_SESSION['userrollno'] = $result['user_rollno'];
                    $_SESSION['userstatus'] = $result['user_status'];
                    $_SESSION['role'] = $result['user_role'];
                    
                    if ((password_verify($password,$_SESSION['password']) && $_SESSION['useremail']==$loginid) || (password_verify($password,$_SESSION['password']) && $_SESSION['userrollno']==$loginid)) {			
                        if($_SESSION['password']){$_SESSION['login']=true;}
                                echo 'valid';	
                                
                    
                    } else {                                           
                            echo 'notvalid'; 
                    }
                }
                
            }
            catch (PDOException $ex)
            {
                $ex->getMessage();
                print_r($logstmt->errorInfo()); 
            }
        }

  
    


    }