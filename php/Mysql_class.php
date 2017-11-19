<?php

class Mysql {

    public $link;

    function __construct($dados_connect) {
        //Conecta ao banco e seleciona a base
        $this->link = $this->connect($dados_connect);
        $this->selectdb($this->link, $dados_connect['db']);
        mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
    }

    //Função de retorna erro
    static function error($msg) {
        die('<div style="font-family:Arial; font-size:13px;border:#CCC 1px solid;background: #F7F7F7; width:500px; margin: 100px auto 0;"><h1 style="margin: 0; font-size:18px; background:#F00; padding:5px;color:#FFF;">ERRO</h1><div style="padding:5px;">' . $msg . '</div></div>');
    }

    //Função de conexão com o banco
    function connect($dados = NULL) {
        if ($dados == NULL) {
            $this->error('Nenhum servidor de banco de dados informado.');
        } else {
            $con = mysqli_connect($dados['host'], $dados['user'], $dados['pass']) or die($this->error('ERRO: ' . mysqli_error()));
            return $con;
        }
    }

    //Função de seleção de banco de dados
    function selectdb($link = NULL, $db = NULL) {
        if ($db == NULL) {
            $this->error('Nenhum banco de dados informado.');
        } else {
            $sel = mysqli_select_db($link, $db) or die($this->error('ERRO: ' . mysqli_error()));
        }
    }

    //Anti injection
    function anti_sqlinj($string) {
        $string = get_magic_quotes_gpc() ? stripslashes($string) : $string;
        $string = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($this->link, $string) : mysqli_escape_string($this->link, $string);
        return $string;
    }

    //Envio da query
    public function query($sql) {
        $qry = mysqli_query($this->link, $sql) or $this->error('Erro: ' . mysqli_error($this->link), 'error');
        return $qry;
    }

    //Insert
    function insert($tabela, $dados) {
        $chaves = array();
        $valores = array();
        foreach ($dados as $key => $value) {
            $chaves[] = $key;
            $valores[] = $this->anti_sqlinj($value);
        }
        $sql = "INSERT INTO " . $tabela . " (`" . implode('`, `', $chaves) . "`) VALUES ('" . implode('\', \'', $valores) . "');";
        $this->query($sql);
    }

    //Update
    function update($tabela, $dados, $id, $field = 'id') {
        foreach ($dados as $key => $value) {
            $query[] = '`' . $key . '`=\'' . self::anti_sqlinj($value);
        }
        $sql = "UPDATE " . $tabela . " SET " . implode('\', ', $query) . "' WHERE " . $field . "='" . $id . "';";
        $this->query($sql);
    }

    //Delete
    function delete($tabela, $id, $chave = 'id') {
        $sql = "DELETE FROM " . $tabela . " WHERE " . $chave . "='" . $id . "';";
        $this->query($sql);
    }

}
