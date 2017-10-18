<?php

class EJDataAdapter {

    private $host = 'localhost';
    //usuario 
    private $usuario = 'root';
    //senha 
    private $senha = '';
    //banco de dados 
    private $database = 'dbempodera';
    private $mysqli;

    public function construct() {
        $this->conectarBanco();
    }

    public function conectarBanco() {
        $this->mysqli = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);
        mysqli_set_charset($this->mysqli, 'utf8');
        if (mysqli_connect_errno()) {
            echo 'Erro ao Conectar com o Banco de Dados:' . mysqli_connect_error();
        }
    }

    public function fecharBanco() {
        $this->mysqli->close();
    }

    public function realizarSelect($sql) {
        $resultado = mysqli_query($this->mysqli, $sql);
        $resultadoConsulta = retornaResultado($resultado);
        return $resultadoConsulta;
    }

    public function retornaResultado($resultado) {
        if ($resultado) {
            while ($resultadoAssoc = mysqli_fetch_assoc($resultado)) {
                $arrayresultados[] = $resultadoAssoc;
                return $arrayresultados;
            }
        } else {
            return "Erro na execução da consulta";
        }
    }

}

?>