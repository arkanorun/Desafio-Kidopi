<?php

class Covid19Connection
{
    private $_url;
    private $_connection;
    public function __construct()
    {
        $this->_url = "https://dev.kidopilabs.com.br/exercicio/covid.php?pais=";
    }

    public function getDetailCountry($pais)
    {
        $url = $this->_url . urlencode($pais);
        $result = file_get_contents($url);
        $this->_connection = new PDO(
            $_ENV['DB_URL'],
            $_ENV['DB_USERNAME'],
            $_ENV["DB_PASS"]
        );

        $stm = $this->_connection->prepare("INSERT INTO consulta_covid (pais) VALUES (:pais)");
        $stm->execute(array(":pais" => $pais));
        return json_decode($result, true);
    }

    public function getDateCountry()
    {
        $this->_connection = new PDO(
            $_ENV['DB_URL'],
            $_ENV['DB_USERNAME'],
            $_ENV["DB_PASS"]
        );

        $stm = $this->_connection->prepare("SELECT * FROM consulta_covid ORDER BY id DESC LIMIT 1");
        $stm->execute();
        $valor = $stm->fetch(PDO::FETCH_ASSOC);
        return json_encode($valor);
    }
}
?>