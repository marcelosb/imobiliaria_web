<?php

/**
 * Description of ClientePessoaJuridicaBean
 *
 * @author Marcelo
 */
class ClientePessoaJuridicaBean {
    
    private $codigo;
    private $nome_fantasia;
    private $endereco;
    private $cnpj;
   
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }
    
    public function getCodigo(){
        return $this->codigo;
    }
    
    public function setNomeFantasia($nome){
        $this->nome_fantasia = $nome;
    }
    
    public function getNomeFantasia(){
        return $this->nome;
    }
    
    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }
    
    public function getEndereco(){
        return $this->endereco;
    }
    
    public function setCNPJ($cnpj){
        $this->cnpj = $cnpj;
    }
    
    public function getCNPJ(){
        return $this->cnpj;
    }
    
}
