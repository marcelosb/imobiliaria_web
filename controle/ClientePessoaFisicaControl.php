<?php

/**
 * Description of ClientePessoaFisicaControl
 *
 * @author Marcelo
 */

require_once './acesso_banco_de_dados/ConexaoBD.php';
//require_once './modelo/ClientePessoaFisicaBean.php';

/*
$clientePessoaFisica = new ClientePessoaFisicaBean();
$clientePessoaFisica->setNome($_POST['nome']);
$clientePessoaFisica->getEndereco($_POST['endereco']);
$clientePessoaFisica->setCpf($_POST['cpf']);
clientePessoaFisicaControl = new ClientePessoaFisicaControl();
clientePessoaFisicaControl->cadastrar($clientePessoaFisica);
*/

class ClientePessoaFisicaControl {
     
    public function cadastrar(){
        
        $nome = strtoupper($_POST['campo_nome']);
        $endereco = strtoupper($_POST['campo_endereco']); 
        $cpf = $_POST['campo_cpf'];
        
        $conexaoBD = new ConexaoDB();
        $listarClientesPF = $conexaoBD->executarSQL("SELECT * FROM tabela_cliente_pf");
        while($exibe = mysqli_fetch_array($listarClientesPF)){     
            if($cpf == $exibe['cpf']){
                return false;
            }     
        }
                
        $instrucaoSQL = "INSERT INTO tabela_cliente_pf (nome, endereco, cpf) VALUES ('$nome', '$endereco', '$cpf')";
        
        $conexaoBD->executarSQL($instrucaoSQL);
        $conexaoBD->desconectar();
        
        return true;
    }
    
    public function cadastrarDadosDoArquivo($codigo, $nome, $endereco, $cpf){
        
        $conexaoBD = new ConexaoDB();
               
        $instrucaoSQL = "INSERT INTO tabela_cliente_pf (codigo, nome, endereco, cpf) VALUES ('$codigo', '$nome', '$endereco', '$cpf')";
        
        $conexaoBD->executarSQL($instrucaoSQL);
        $conexaoBD->desconectar();
        
        return true;
    }
    
    public function listar(){
        $conexaoBD = new ConexaoDB();
        return $conexaoBD->executarSQL("SELECT * FROM tabela_cliente_pf");
    }
    
    public function atualizar(){
        
        $editar_codigo = $_POST['campo_editar_codigo'];
        $editar_nome = strtoupper($_POST['campo_editar_nome']);
        $editar_endereco = strtoupper($_POST['campo_editar_endereco']);
        $editar_cpf = $_POST['campo_editar_cpf'];
        
        $instrucaoSQL = "UPDATE tabela_cliente_pf SET nome='$editar_nome', endereco='$editar_endereco', cpf='$editar_cpf' WHERE codigo='$editar_codigo' ";
        
        $conexaoBD = new ConexaoDB();
        return $conexaoBD->executarSQL($instrucaoSQL);
    }
    
    public function excluir(){

        $codigo_a_ser_deletado = $_POST['delete_pelo_codigo'];
        $instrucaoSQL = "DELETE FROM tabela_cliente_pf WHERE codigo='$codigo_a_ser_deletado' ";
        
        $conexaoBD = new ConexaoDB();
        return $conexaoBD->executarSQL($instrucaoSQL);
    }
    
    /*
    public function limparTabela(){
        $conexaoBD = new ConexaoDB();
        $instrucaoSQL = "TRUNCATE TABLE tabela_cliente_pf"; 
        return $conexaoBD->executarSQL($instrucaoSQL);
    }
    */
}
