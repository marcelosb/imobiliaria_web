<?php

/**
 * Description of ClientePessoaFisicaBean
 *
 * @author Marcelo
 */

class ClientePessoaFisicaBean {
    
    private $codigo;
    private $nome;
    private $endereco;
    private $cpf;

    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }
    
    public function getCodigo(){
        return $this->codigo;
    }
    
    public function setNome($nome){
        $this->nome = $nome;
    }
    
    public function getNome(){
        return $this->nome;
    }
    
    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }
    
    public function getEndereco(){
        return $this->endereco;
    }
    
    public function setCpf($cpf){
        $this->cpf = $cpf;
    }
    
    public function getCpf(){
        return $this->cpf;
    }
    
    
}
