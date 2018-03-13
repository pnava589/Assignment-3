<?php
    class CountriesGateway extends TableGateway{
        //constructor to instantiate object
        public function __construct($connection){
            parent::__construct($connection);
            
        }
        public function getBrowseCountriesStatement(){
            return "select c.CountryName,c.ISO from Countries c inner join ImageDetails i on i.CountryCodeISO = c.ISO group by c.CountryName";
        }
        public function getLeftNavStatement(){
            return "select c.CountryName, c.ISO from Countries c inner join ImageDetails i on i.CountryCodeISO = c.ISO group by c.CountryName";
        }
         public function getDropdownStatement(){
            return 'SELECT coun.CountryName, coun.ISO FROM Countries coun JOIN ImageDetails image ON coun.ISO = image.CountryCodeISO GROUP BY coun.ISO ORDER BY coun.CountryName';
        }
        public function getOrderFields(){
            return 'CountryName';
        }
        public function getPrimaryKeyName(){
            return 'ISO';
        }
        public function getTableName(){
            return 'Countries';
        }
    }
?>