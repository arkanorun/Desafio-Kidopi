<?php 
require "./model/CountryConnection.php";

class CountryController {
    
    public function indexCountry()
    {
        include_once "./view/DifferenceInDeathRate.php";
    }
    
    public function getInformationCountry()
    {
        $model = new CountryConnection();
        print json_encode($model->getCountry());
    }

}

?>