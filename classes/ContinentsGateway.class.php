<?php
    class ContinentsGateway extends TableGateway{
        //constructor to instantiate object
        public function __construct($connection){
            parent::__construct($connection);
          
        }
        public function getLeftNavStatement(){
            return 'select c.ContinentName, c.ContinentCode from Continents c inner join ImageDetails i on i.ContinentCode = c.ContinentCode group by i.ContinentCode';
        }
        public function getOrderFields(){
            return 'ContinentName';
        }
        public function getPrimaryKeyName(){
            return 'ContinentCode';
        }
        public function getTableName(){
            return 'Continents';
        }
    }
?>