<?php
    class DataConnect{
        private $servername;
        private $username;
        private $password;
        private $dbname;

        protected function connect(){
            $this->servername = "localhost";
            $this->username = "root";
            $this->password = "";
            $this->dbname = "maxventory";

            $datasourcename = 'mysql:host='.$this->servername.';dbname='.$this->dbname;

            $konet = new PDO($datasourcename, $this->username, $this->password);
            $konet->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $konet->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $konet;
        }
    }