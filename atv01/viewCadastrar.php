<?php

    include_once ("controle.php");

    if( !empty($_POST['form_submit']) ) {
        cadastrar();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SisCadPF - Cadastrar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    </head>
    <body>
        <div class="container py-4">        
            <form class="form" method="post" action="viewCadastrar.php">
                <input type="hidden" name="form_submit" value="OK">
                <h3 class="display-7 text-secondary"><b>Cadastrar Pessoa Física</b></h3>
                <div class="row pb-2 ps-2 ">
                    <div class="col">
                        <a href="viewMain.php" class="btn btn-warning btn-block align-content-center col-4 me-2">
                            
                            &nbsp; Voltar - Não Alterar
                        <a>
                        <button type='submit' class='btn btn-success btn-block align-content-center col-4'>
                            Confirmar Alteração &nbsp;
                        </a>
                    </div>
                </div>
                
                
                
                <div class="row">
                    <div class="col-3" >
                        <div class="form-floating mb-3">
                            <input 
                            type="text" 
                      
                                class="form-control"
                                name="cpf" 
                                placeholder="CPF"
                            />
                            <label for="cpf">CPF</label>
                        </div>
                    </div>
              
           
                    <div class="col" >
                        <div class="form-floating mb-3">
                            <input 
                                type="text" 
                                class="form-control" 
                                name="nome" 
                                placeholder="Nome"
                            />
                            <label for="nome">Nome</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col" >
                        <div class="form-floating mb-3">
                            <input 
                            type="text" 
                         
                                class="form-control"
                                name="telefone" 
                                placeholder="Telefone"
                            />
                            <label for="telefone">Telefone</label>
                        </div>
                    </div>
                <div class="col" >
                        <div class="form-floating mb-3">
                            <input 
                                type="text" 
                                class="form-control" 
                                name="endereco" 
                                placeholder="Endereço"
                            />
                            <label for="endereco">Enderço</label>
                        </div>
                    </div>
                  
                </div>
               
                
               
            </form>
        </div>
    </body>
</html>