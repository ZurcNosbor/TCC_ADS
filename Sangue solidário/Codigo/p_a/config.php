<?php
//CONEXÃO COM O BANCO DE DADOS


define('HOST', 'localhost');
define('USER', 'root');
define('PASS', 'coco');
define('BASE', 'projeto_aplicado');

$conn = new MySQLi(HOST,USER,PASS,BASE);
$conn->set_charset("utf8");
?>