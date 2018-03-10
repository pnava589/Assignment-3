<?php
    class ImageDetailsGateway extends TableGateway{
        //constructor to instantiate object
        public function __construct($connection){
            parent::__construct($connection);
            
        }
       public function getOrderFields(){
           return "Title";
       }
        public function getPath(){
            return 'Path';
        }
        public function getPrimaryKeyName(){
            return 'ImageID';
        }
        public function getTableName(){
            return 'ImageDetails';
        }
    }
?>