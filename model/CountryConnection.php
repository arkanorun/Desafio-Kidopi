<?php

class CountryConnection
{
    private $_url;
    public function __construct()
    {
        $this->_url = "https://dev.kidopilabs.com.br/exercicio/covid.php?listar_paises=1";
    }

    public function getCountry()
    {
        $result = file_get_contents($this->_url);
        return json_decode($result, true);
    }
}
?>