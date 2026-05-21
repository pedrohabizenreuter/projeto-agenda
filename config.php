<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'agenda');

try {

    $dsn = 'mysql:host=' . DB_HOST .
           ';dbname=' . DB_NAME .
           ';charset=utf8mb4';

    $pdo = new PDO($dsn, DB_USER, DB_PASS, [

        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

        PDO::ATTR_EMULATE_PREPARES => false

    ]);

} catch (PDOException $e) {

    die('Erro de conexão: ' . $e->getMessage());

}

/*
Diferença entre:

PDO::ERRMODE_EXCEPTION
-> Lança exceções quando ocorre erro no banco.
-> O sistema mostra mensagens de erro controladas.
-> Facilita depuração e tratamento.

PDO::ERRMODE_SILENT
-> Não mostra erro automaticamente.
-> O programador precisa verificar manualmente usando
   métodos como errorInfo().
-> É o modo padrão do PDO.
*/
