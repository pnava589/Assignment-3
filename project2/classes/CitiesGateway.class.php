<?php
    class CitiesGateway extends TableGateway{
        //constructor to instantiate object
        public function __construct($connection){
            parent::__construct($connection);
            $this->tableName = 'Cities';
        }
        public function getDropdownStatement(){
            return 'select cit.AsciiName, cit.CityCode from Cities cit inner join ImageDetails i on cit.CityCode = i.CityCode group by cit.AsciiName';
        }
        public function getOrderFields(){
            return 'AsciiName';
        }
        public function getPrimaryKeyName(){
            return 'CityCode';
        }
        public function getTableName(){
            return 'Cities';
        }
        public function getCitiesWithImages(){
            return "select c.Latitude, c.Longitude from Cities c inner join ImageDetails i on i.CityCode = c.CityCode AND c.CountryCodeISO = :id group by c.AsciiName";
        }
        public function getCityLocation()
        {
            return 'select Latitude, Longitude from Cities where CityCode= :id';
        }
    }
?>