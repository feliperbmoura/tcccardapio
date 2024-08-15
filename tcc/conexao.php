<?php
$user = 'root';
$password = '';
$banco = 'tcc';
$servidor = 'localhost';

try{
    $pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8","$user","$password");
}catch(Exception $e){
    echo "Não foi possivel conectar no banco". $e;
}