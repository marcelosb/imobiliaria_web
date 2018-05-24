
<?php
    require_once './controle/ClientePessoaJuridicaControl.php';
    require_once './acesso_banco_de_dados/ConexaoBD.php'; 
?>

<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="estilo/icon-font.min.css">
    <link  href="estilo/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="estilo/estilo.css">
    <script type="text/javascript" src="script/jquery-3.2.1.min.js"></script> 
    <script type="text/javascript" src="script/jquery.quicksearch.js"></script> 
    <script type="text/javascript" src="script/bootstrap.min.js"></script>
    <title>Cliente Pessoa Jurídica</title>
     
    <script type="text/javascript" src="script/jquery.masked-input.js"></script>
    
    
</head>
<body>
              
    <header> <label class="lnr lnr-menu logo"></label> </header>
    
    <div class="menu">
        <div class="line"> <a style="text-decoration:none;"  href="index.php"> <label class="lnr lnr-home"><font>Início</font></label></a>  </div>
        <div class="line"><a style="text-decoration:none;"  href="corretor.php"> <label class="lnr lnr-user"><font>Corretor</font></label> </a>  </div>
        <div class="line"><a style="text-decoration:none;"  href="cliente_pf.php"><label class="lnr lnr-smile"><font>ClientePF</font></label></a></div>
        <div class="line"><a style="text-decoration:none;"  href="cliente_pj.php"><label class="lnr lnr-mustache"><font>ClientePJ</font></label></a></div>
        <div class="line"><a style="text-decoration:none;"  href="imovel.php"><label class="lnr lnr-apartment"><font>Imóvel</font></label></a></div>
        <div class="line"><a style="text-decoration:none;"  href="vender_imovel.php"><label class="lnr lnr-cart"><font>Vender</font></label></a></div>
        <div class="line"><a style="text-decoration:none;"  href="alugar_imovel.php"><label class="lnr lnr-license"><font>Alugar</font></label></a></div>  
    </div>    
        
    <main>
        <article id="resposta"> 
            

            <?php 
                if(isset($_POST['cadastrar_pj'])){
                    $clientePessoaJuridicaControl = new ClientePessoaJuridicaControl();
                    
                    if($clientePessoaJuridicaControl->cadastrar() == true){
                        echo '<div class="alert alert-success alert-dismissible"  role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Cadastro realizado com sucesso!
                        </div>';
                    }else{
                        echo '<div class="alert alert-info alert-dismissible"  role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Cadastro não realizado!<br>
                            O <strong>CNPJ</strong> já está sendo utilizado por outra pessoa jurídica!
                        </div>';
                    }
                    

                }

                if(isset($_POST['editar_cliente_pj'])){
                    $clientePessoaJuridicaControl = new ClientePessoaJuridicaControl();
                    $clientePessoaJuridicaControl->atualizar();
                    echo '<div class="alert alert-info alert-dismissible"  role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Cadastro alterado com sucesso!
                        </div>';
                }

                if(isset($_POST['deletar_cliente_pj'])){
                    $clientePessoaJuridicaControl = new ClientePessoaJuridicaControl();
                    $clientePessoaJuridicaControl->excluir();  
                    echo '<div class="alert alert-danger alert-dismissible"  role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Cadastro excluído!
                        </div>';
                }
                                        
                        
            ?>
            
            
           <br>
            
           
            <div class="form-row">
                    
                <form >
                    <div class="row">
                        
                        <div class="form-group col-md-6 "> <!-- <img src="imagens/cad_cliente.svg" width="20px" height="20px" > -->
                            <button style="height:30px; background:transparent; border-color:transparent;" class="lnr lnr-file-add" type="button"  data-toggle="modal" data-target="#myModal"></button>
                        </div>
                        
                        <div class="form-group col-md-6">
                          <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>                        
                          <div class="input-group mb-2 mb-sm-0"> 
                            <div class="input-group-addon"><img src="imagens/pesquisar.svg" ></div>
                            <input id="txt_consulta" type="text" class="form-control" placeholder="Pesquisar por">
                        </div>
                        </div>
                          
                     </div>   
                </form>
                    

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            
                          <div style="background: #286090; color: white;" class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 style="text-align: center ; " class="modal-title">Formulário - Cadastrar Cliente Pessoa Jurídica</h4>
                          </div>
                            
                          <div class="modal-body">
                              
                              <form method="POST" >
                                    <br>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nome Fantasia</label>
                                        <div class="col-sm-10">
                                            <input style="text-transform: uppercase" type="text" class="form-control" id="" placeholder="Nome Fantasia" name="campo_nome_fantasia" required="required" x-moz-errormessage="Campo nome é de preenchimento obrigatório.">
                                        </div>
                                    </div>
                                  
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Endereço</label>
                                        <div class="col-sm-10">
                                            

                                            <input style="text-transform: uppercase;" type="text" class="form-control" id="inputEmail3" placeholder="Endereço" name="campo_endereco_pj" required x-moz-errormessage="Campo de preenchimento obrigatório.">
                                        </div>
                                    </div>
                                  
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">CNPJ</label>
                                        <div class="col-sm-10">
                                            <input maxlength="18" data-masked-input="99.999.999/9999-99" type="text" class="form-control" id="inputEmail3" placeholder="USE SOMENTE NÚMEROS" name="campo_cnpj" required x-moz-errormessage="Por favor, preencha o campo do CNPJ.">
                                        </div>
                                    </div>
                                    <br><br>
                                    
                                    <button name="cancelar" style="float: right" type="button" class="btn btn-default btn-lg" data-dismiss="modal" onclick="teste()" >Cancelar</button>
                                    <p  style="float: right; padding-left: 15px;"></p>
                                    <button name="cadastrar_pj" style="float: right; background-color: #286090 " type="submit" class="btn btn-info btn-lg" value="cadastrar_cliente_pj" >Cadastrar</button>
                                    <br><br><br><br>
  
                                </form>  
       
                          </div>
                         
                            
                        </div>

                      </div>
                    </div>
                    
                

            
            
            <!--
            <div class="form-group input-group">
                    
                    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                    <input style="width: 250px" name="consulta" id="txt_consulta" placeholder="Consultar" type="text" class="form-control">
            </div>
            
            
            -->
           <div  style="height:520px; overflow-style: scrollbar; overflow-x: scroll; overflow-y: scroll; ">
            
            <table  number-per-page="5" current-page="0" id="tabela" class="pagina table table-hover table-bordered" width="100%" cellspacing="0" >
                 <thead>
                     <tr>
                       <th scope="col">Código</th>
                       <th scope="col">Nome Fantasia</th>
                       <th scope="col">Endereço</th>
                       <th scope="col">CNPJ</th>
                       <th scope="col">Ação</th>
                     </tr>
                 </thead>
            
                 
                <tbody >
                    
                    <!-- Aqui começa a listagem dos dados que vem do BD-->
                    
                    <?php 
                    
                        //$arquivo = fopen("C:\\xampp\\htdocs\\ImobiliariaUEPB\\arquivos\\tabela_pf.txt", "w");
                    
                        $clientePessoaJuridicaControl = new ClientePessoaJuridicaControl();
                        $listarClientesPJ = $clientePessoaJuridicaControl->listar();
  
                        while($exibe = mysqli_fetch_array($listarClientesPJ)){     
                            
                            $codigo = $exibe['codigo'];
                            $nome_fantasia = $exibe['nome_fantasia'];
                            $endereco_pj = $exibe['endereco'];
                            $cnpj = $exibe['cnpj'];
                            
                            //fwrite($arquivo, $codigo.";".$nome.";".$endereco.";".$cpf.PHP_EOL);
                            
                            echo "<tr>
                            <td>$codigo</td>
                            <td>$nome_fantasia</td>
                            <td>$endereco_pj</td>
                            <td>$cnpj</td>";
                            
                            ?>
                    
                            <td>
                             <div class='btn-group' role='group' aria-label='...'>
                                 <a style="text-decoration: none;" class="lnr lnr-pencil" href="#editar<?php echo $codigo;?>" data-toggle="modal"></a>
                                 <a style="text-decoration: none; " class="lnr lnr-trash" href="#excluir<?php echo $codigo;?>" data-toggle="modal"></a>
                                 
                             </div>
                             </td> 
                        
                        
                                <!-- Modal Alterar Cliente -->
                                
                                <div id="editar<?php echo $codigo;?>" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div style="background: #2e6da4; color: white" class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 style="text-align: center" class="modal-title" id="exampleModalLabel">Formulário - Editar Cliente Pessoa Jurídica</h4>
                                        <!-- <button   type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span> 
                                            </button> -->
                                      </div>
                                        
                                <div class="modal-body">
                                          
                                    <form method="POST" >
                                        
                                        
                                        <br>

                                        <div class="form-group row">

                                            <div class="col-sm-10">
                                                <input type="hidden" class="form-control" value="<?php echo $codigo;?>" name="campo_editar_codigo_pj" id="campo_editar_codigo">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nome Fantasia</label>
                                            <div class="col-sm-10">
                                                <input autofocus style="text-transform: uppercase" type="text" class="form-control" value="<?php echo $nome_fantasia;?>" placeholder="Nome Fantasia" name="campo_editar_nome_fantasia" id="campo_editar_nome" required="required" x-moz-errormessage="Campo nome fantasia é de preenchimento obrigatório." >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Endereço</label>
                                            <div class="col-sm-10">
                                                <input style="text-transform: uppercase;" type="text" class="form-control" value="<?php echo $endereco_pj;?>" placeholder="Endereço" name="campo_editar_endereco_pj" required x-moz-errormessage="Campo de preenchimento obrigatório.">
                                            </div>
                                        </div>
                                  
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">CNPJ</label>
                                            <div class="col-sm-10">
                                                <input maxlength="18" data-masked-input="99.999.999/9999-99"  type="text" class="form-control" value="<?php echo $cnpj;?>" placeholder="CNPJ" name="campo_editar_cnpj" required x-moz-errormessage="Por favor, preencha o campo do CNPJ.">
                                            </div>
                                        </div>
                                        <br>
  
                                     
                                          
                                </div>
                                        
                                   <div class="modal-footer">
                                        
                                        <button type="submit" class="btn btn-primary btn-lg" name="editar_cliente_pj">Editar</button>
                                        <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Cancelar</button>
                                      </div>
                                        
                                     </form>
                                        
                                    </div>
                                  </div>
                                </div>
                                
                                
                                <a style="padding-left: 10px"></a>
                                
                                

                               
<!-- Modal excluir cliente -->

<div class="modal fade" id="excluir<?php echo $codigo;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div style="background: #c9302c; color: white; " class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 style="text-align: center"  class="modal-title" id="exampleModalLongTitle">Formulário - Excluir Cliente Pessoa Jurídica</h4>
      </div>
      <div class="modal-body" style="text-align: center">
          <form method="POST" >
            <input type="hidden" name="delete_pelo_codigo" value="<?php echo $codigo; ?>">
            <h4>Deseja realmente <strong>excluir</strong> <?php echo $nome_fantasia; ?>?</h4>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-lg" name="deletar_cliente_pj">Excluir</button>
        <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Cancelar</button>
      </div>
        
        </form>
        
    </div>
  </div>
</div>

                             
                        <!-- <td><a href="#" class="btn btn-info">Editar</a></td>
                        <td><a href="#" class="btn btn-danger">Excluir</a></td> -->
                    </tr>

                    <?php } 
                    
                        //fclose($arquivo);
                    
                       
                    
                    ?>
                    
                    
                 
                
                 </tbody>
                
                </table>
                </div>
            
           </div>
           
           
           <?php
           /*

                // Abre o Arquvio no Modo r (para leitura)
                $arquivo = fopen("C:\\xampp\\htdocs\\ImobiliariaUEPB\\arquivos\\tabela_pf.txt", "r");


                while (($linha = fgets($arquivo)) !== false) {
                     // lê a linha
                    $array = explode(';', $linha); 
                    print_r($array);

                }
                fclose($arquivo);
            */
           
           
            /* Conectar com o servidor FTP */
                        //$conecta = ftp_connect('ftp.seudominio.com');
                        
                        /* Autenticar no servidor */
                        //$login = ftp_login($conecta, '$username', '$password');
                        
                        /* Liga modo passivo */
                        //ftp_pasv($conecta, true);
                        
                        /* 
                            Desta vez, utilizamos a função ftp_get() que irá copiar o arquivo 
                            texto.txt, que está na pasta public_html/ na raiz do servidor
                         * 
                         * ftp_get($conecta, 'C:\Documents and Settings\Administrador\Desktop\teste.txt', 
                            '/public_html/arquivos/teste.txt', FTP_BINARY);
                         * 
                         * 
                        */
                        
                         
                        //if (ftp_get($conn_id, $local_file, $server_file, FTP_BINARY)) {
                        //    echo "Successfully written to $local_file\n";
                        //} else {
                        //    echo "There was a problem\n";
                        //}
                        
                        
                        //ftp_close($conecta);
                        
                        /* Envia o arquivo */
                        //$envia = ftp_put($conecta, '/public_html/arquivos/teste.txt', 
                        //'C:\Documents and Settings\Administrador\Desktop\teste.txt', FTP_ASCII);
           
            ?>
             
            
            
           
        </article>
    </main>

    
    
    <!--
    <script>  
        $(document).ready(function(){  
             $('#tabela').DataTable();  
        });  
    </script> 
    -->
    
    
    <style>
        ul {
            list-style: none;
            margin-top: 10px;
            padding: 0px;
            
        }
        
        li {
            border-radius: 5px;
            color: black;
            background: #eee;
            cursor: pointer;
            display: inline;
            font-weight: 200;
            margin: 10px 5px 0px 2px;
            padding: 10px;
            width: 5px;
        
        }

    .active {
      background: #286090;
      color: white;
    }
    
    </style>
    
    
    <script>
        $('input#txt_consulta').quicksearch('table#tabela tbody tr');
    </script>   
        
    <script src="script/script.js"></script>
    

    </body>
</html>



