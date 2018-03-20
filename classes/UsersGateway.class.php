<?php
    class UsersGateway extends TableGateway{
        //constructor to instantiate object
        public function __construct($connection){
            parent::__construct($connection);
            
        }
        
        public function getOrderFields(){
            return 'Lastname';
        }
        public function getPrimaryKeyName(){
            return 'UserID';
        }
        public function getTableName(){
            return 'Users';
        }
    }
?>