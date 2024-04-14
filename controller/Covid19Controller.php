<?php
require "./model/Covid19Connection.php";


class Covid19Controller
{
    public function index()
    {
        include_once "./view/index.php";
    }

    public function getInformation($pais)
    {
        $model = new Covid19Connection();
        print json_encode($model->getDetailCountry($pais));
    }

    public function dateCountry()
    {
        $model = new Covid19Connection();
        print json_encode($model->getDateCountry());
    }
}

?>