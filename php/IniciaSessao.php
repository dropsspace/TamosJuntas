<?php

include("config.php");

#include_once 'RegistroUso.php';

//Armazeno duas informações na sessão do usuário: se ele está logado, e o login de acesso. A partir desse momento, qualquer página habilitada a trabalhar com variáveis de sessão, poderá resgatar essas variáveis, manipulá-las, sobreescrevê-las etc.

$_SESSION["logado"] = TRUE;
$_SESSION["filhos"] = $_POST["filhos"];
$_SESSION["estuda"] = $_POST["estuda"];
$_SESSION["trabalha"] = $_POST["trabalha"];
$_SESSION["tpRelac"] = $_POST["tpRelac"];

//armazena perguntas perguntadas
$_SESSION["perguntas"] = array();
//armazena respostas respondidas
$_SESSION["respostas"] = array(); 
//armazena violências que já apresentaram todas perguntas;
$_SESSION["violenciasFinalizadas"] = array();
$_SESSION["violenciasIdentificadas"] = array();
//contador de perguntas 
$_SESSION["controlador"] = array(1 =>0, 2=>0, 3=>0, 4=>0, 5=>0, 6=>0);
//controla a repetição do teste
$_SESSION["terminouTeste"] = FALSE;

$registro = new RegistroUso($mysql);
$retorno = $registro->registraUso(date('dmyhis'), $_SESSION["filhos"], $_SESSION["estuda"], $_SESSION["trabalha"], $_SESSION["tpRelac"] );

$_SESSION["id"] = $retorno;

//$_SESSION["id"] = RegistroUso::registraUso((date('dmyhis')), $_SESSION["filhos"], $_SESSION["estuda"], $_SESSION["trabalha"], $_SESSION["tpRelac"]);
//Uso a função header() para fazer o redirecionamento para a página principal do site
header ("Location:Teste.php");

?>