<?php

/**
 * @author Marcelo
 */

require_once './acesso_banco_de_dados/ConexaoBD.php';

class ClientePessoaJuridicaControl {
     
    public function cadastrar(){
        
        $nomeFantasia = strtoupper($_POST['campo_nome_fantasia']);
        $enderecoPJ = strtoupper($_POST['campo_endereco_pj']); 
        $cnpj = $_POST['campo_cnpj'];
        
        $conexaoBD = new ConexaoDB();
        $listarClientesPJ = $conexaoBD->executarSQL("SELECT * FROM tabela_cliente_pj");
        while($exibe = mysqli_fetch_array($listarClientesPJ)){      
            if($cnpj == $exibe['cnpj']){
                return false;
            }     
        }
                
        $instrucaoSQL = "INSERT INTO tabela_cliente_pj (nome_fantasia, endereco, cnpj) VALUES ('$nomeFantasia', '$enderecoPJ', '$cnpj')";
        
        $conexaoBD->executarSQL($instrucaoSQL);
        $conexaoBD->desconectar();
        
        return true;
    }
    
    /*
    public function cadastrarDadosDoArquivo($codigo, $nome, $endereco, $cpf){
        
        $conexaoBD = new ConexaoDB();
               
        $instrucaoSQL = "INSERT INTO tabela_cliente_pf (codigo, nome, endereco, cpf) VALUES ('$codigo', '$nome', '$endereco', '$cpf')";
        
        $conexaoBD->executarSQL($instrucaoSQL);
        $conexaoBD->desconectar();
        
        return true;
    }
    */
    
    public function listar(){
        $conexaoBD = new ConexaoDB();
        return $conexaoBD->executarSQL("SELECT * FROM tabela_cliente_pj");
    }
    
    public function atualizar(){
        
        $editar_codigo_pj = $_POST['campo_editar_codigo_pj'];
        $editar_nome_fantasia = strtoupper($_POST['campo_editar_nome_fantasia']);
        $editar_endereco_pj = strtoupper($_POST['campo_editar_endereco_pj']);
        $editar_cnpj = $_POST['campo_editar_cnpj'];
        
        $instrucaoSQL = "UPDATE tabela_cliente_pj SET nome_fantasia='$editar_nome_fantasia', endereco='$editar_endereco_pj', cnpj='$editar_cnpj' WHERE codigo='$editar_codigo_pj' ";
        
        $conexaoBD = new ConexaoDB();
        return $conexaoBD->executarSQL($instrucaoSQL);
    }
    
    public function excluir(){

        $codigo_a_ser_deletado = $_POST['delete_pelo_codigo'];
        $instrucaoSQL = "DELETE FROM tabela_cliente_pf WHERE codigo='$codigo_a_ser_deletado' ";
        
        $conexaoBD = new ConexaoDB();
        return $conexaoBD->executarSQL($instrucaoSQL);
    }
    
}
