<?php

class ConectaBD {

    private static $host = 'localhost';
    //usuario 
    private static $usuario = 'root';
    //senha 
    private static $senha = '';
    //banco de dados 
    private static $database = 'dbempodera';
    
    private static $mysqli;

    public function construct() {
        $this->conectarBanco();
    }

    public function conectarBanco() {
        self::$mysqli = mysqli_connect(self::$host, self::$usuario, self::$senha, self::$database);
        mysqli_set_charset( self::$mysqli, 'utf8');
        if (mysqli_connect_errno()) {
            echo 'Erro ao Conectar com o Banco de Dados:' . mysqli_connect_error();
        }
    }
    public function fecharBanco() {
        self::$mysqli->close();
    }

    public function realizarSelect($sql) {
        $resultado = mysqli_query(self::$mysqli, $sql);
        $resultadoConsulta = ConectaBD::retornaResultado($resultado);
        return $resultadoConsulta;
    }

    public function retornaResultado($resultado) {
        if ($resultado) {
            while ($resultadoAssoc = mysqli_fetch_assoc($resultado)) {
                $arrayresultados[] = $resultadoAssoc;                
            }
            return $arrayresultados;
        } else {
            return "Erro na execução da consulta";
        }
    }
    
    public function realizarInsert($sql)
            {
        $insert = mysqli_query(self::$mysqli, $sql);
        return $insert;
            }

}

?>