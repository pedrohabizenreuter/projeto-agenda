CREATE DATABASE agenda;
USE agenda;

CREATE TABLE pessoas (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(30) NOT NULL,
    cpf VARCHAR(14),
    email VARCHAR(100),
    idade INT,
    
    PRIMARY KEY (id)
);	

SELECT *
FROM pessoas;

drop table pessoas;