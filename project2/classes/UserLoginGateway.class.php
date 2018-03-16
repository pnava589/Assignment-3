<?php
    class UserLoginGateway extends TableGateway{
        //constructor to instantiate object
        public function __construct($connection){
            parent::__construct($connection);
            
        }
        
        public function getOrderFields(){
            return 'UserID';
        }
        public function getPrimaryKeyName(){
            return 'UserID';
        }
        public function getTableName(){
            return 'UsersLogin';
        }
        public function getUsernameCheck(){
            return "SELECT	* FROM UsersLogin WHERE UserName=:id";
        }
        public function getUserLoginCheck(){
            return  "SELECT	* FROM UsersLogin WHERE Username=:user and Password=:pass";
        }
    }
?>