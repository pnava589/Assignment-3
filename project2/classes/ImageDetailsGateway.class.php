<?php
    class ImageDetailsGateway extends TableGateway{
        //constructor to instantiate object
        public function __construct($connection){
            parent::__construct($connection);
            
        }
        public function getBrowseCountriesStatement(){
            return "select c.CountryName,c.ISO from Countries c inner join ImageDetails i on i.CountryCodeISO = c.ISO group by c.CountryName";
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