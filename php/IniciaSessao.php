<?php
session_start();
include_once('RegistroUso.php');

//Armazeno duas informações na sessão do usuário: se ele está logado, e o login de acesso. A partir desse momento, qualquer página habilitada a trabalhar com variáveis de sessão, poderá resgatar essas variáveis, manipulá-las, sobreescrevê-las etc.
$_SESSION["logado"] = TRUE;
$_SESSION["filhos"] = $_POST["filhos"];
$_SESSION["estuda"] = $_POST["estuda"];
$_SESSION["trabalha"] = $_POST["trabalha"];
$_SESSION["tpRelac"] = $_POST["tpRelac"];
        
$_SESSION["id"] = RegistroUso::registraUso((date('dmyhis')), $_SESSION["filhos"], $_SESSION["estuda"], $_SESSION["trabalha"], $_SESSION["tpRelac"]);

//Uso a função header() para fazer o redirecionamento para a página principal do site
header ("Teste.php");

?>