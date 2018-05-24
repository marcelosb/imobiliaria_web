<?php

define('SERVIDOR', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('BANCO_DE_DADOS', 'bd_sistema_imobiliario');

class ConexaoDB{
 
    private $conexaoBD;

    public function conectar(){
        $this->conexaoBD = new mysqli(SERVIDOR, USUARIO, SENHA, BANCO_DE_DADOS);
        $this->conexaoBD->set_charset('utf8');
        return $this->conexaoBD;
        
    } 
    
    public function executarSQL($query){
        return $this->conectar()->query($query);
    }
    
    public function desconectar(){
        return $this->conectar()->close();
    } 
   // $conexaoBD = new mysqli(SERVIDOR, USUARIO, SENHA, BANCO_DE_DADOS);
    //$conexaoBD->set_charset('utf8');
}



