CREATE database consulta;

use consulta;

CREATE TABLE consulta_covid (
    id integer AUTO_INCREMENT PRIMARY KEY,
    data datetime DEFAULT now(),
    pais varchar(30) not null
    );