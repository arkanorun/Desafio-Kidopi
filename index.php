<?php
require 'vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


$action = isset($_GET['action']) ? $_GET['action'] : 'index';
include_once "./controller/Covid19Controller.php";
include_once "./controller/CountryController.php";


$controllerCovid19 = new Covid19Controller();
$controllerCountry = new CountryController();

switch ($action) {
    case 'getInformation':
        $pais = isset($_GET['pais']) ? $_GET['pais'] : '';
        $controllerCovid19->getInformation($pais);
        break;
    case 'getCountry':
        $controllerCountry->indexCountry();
        break;
    case 'Country':
        $controllerCountry->getInformationCountry();
        break;
    case "getLastAcess":
        $controllerCovid19->dateCountry();
        break;
    default:
        $controllerCovid19->index();
        break;
}
