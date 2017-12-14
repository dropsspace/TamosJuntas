<?php

//ini_set("display_errors", 1);
ini_set('default_charset', 'UTF-8');
setlocale(LC_ALL, 'pt_BR');
date_default_timezone_set('America/Sao_Paulo');


$connection = array(
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '',
    'db' => 'dbempodera'
);

session_start();

function __autoload($class_name)
{
    require_once '' . $class_name . '_class.php';
}

$mysql = new Mysql($connection);


?>