<?php

    require_once 'controle/ClientePessoaFisicaControl.php';
    //require_once '../acesso_banco_de_dados/ConexaoBD.php'; 

    $clientePessoaFisicaControl = new ClientePessoaFisicaControl();
    $clientePessoaFisicaControl->limparTabela();
    
    // Abre o Arquvio no Modo r (para leitura)
    $arquivo = fopen("C:\\xampp\\htdocs\\ImobiliariaUEPB\\arquivos\\tabela_pf.txt", "r");

    while (($linha = fgets($arquivo)) !== false) {
         // lê a linha
        $array = explode(';', $linha); 
        $codigo = $array[0];
        $nome = $array[1];
        $endereco = $array[2];
        $cpf = $array[3];
                           
        $clientePessoaFisicaControl->cadastrarDadosDoArquivo($codigo, $nome, $endereco, $cpf);   
    }
    fclose($arquivo);

