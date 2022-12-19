<?php
    class UserController extends UserModel{

        /**Login */
        public function userLogin($loginid, $password){

            $this->setLogin($loginid, $password);
           
        }

        


    }
