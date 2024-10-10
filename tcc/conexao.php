<?php
$user = 'root';
$password = '';
$banco = 'tcc';
$servidor = 'localhost';

date_default_timezone_set('America/Sao_Paulo');

try{
    $pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8","$user","$password");
}catch(Exception $e){
    echo "Não foi possivel conectar no banco". $e;
}