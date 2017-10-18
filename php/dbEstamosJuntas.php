<?php

    class dbEstamosJuntas
{
    // host 
     public $host = 'localhost';
    
    //usuario 
     public $usuario = 'root'; 
    
    //senha 
     public $senha = ''; 
    
    //banco de dados 
     public $database = 'dbempodera';

    public function  conectaMysql()
            {
       $con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);
       
       mysqli_set_charset($con, 'utf8');
       
       if(mysqli_connect_errno())
           {
           echo 'Erro ao Conectar com o Banco de Dados:'. mysqli_connect_error();
           }
            return $con;
            
           }              
}
?>