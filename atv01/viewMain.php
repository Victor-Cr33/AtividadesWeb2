<?php

    include_once ("controle.php");

    if( !empty($_POST['form_submit']) ) {
        rotas($_POST["acao"]);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SisCadPF – Sistema de Cadastro de Pessoa Física</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    </head>
    <body>
    <div class="container py-4">    
        <form action="viewMain.php" method="POST">
            <input type="hidden" name="form_submit" value="OK">
            <div class="row">
                <div class="col">
                    <h3 class="display-7 text-dark">Pessoas Físicas Cadastradas</h3>
                </div>          
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <button type='submit' name='acao' value='cadastrar/0' class='btn btn-primary'>
                    Cadastrar Nova Pessoa Física
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table align-middle caption-top table-striped">
                        <thead>
                        <tr>
                            <th scope="col" class="d-none d-md-table-cell">CPF</th>
                            <th scope="col">NOME</th>
                            <th scope="col" class="d-none d-md-table-cell">ENDEREÇO</th>
                            <th scope="col" class="d-none d-md-table-cell">TELEFONE</th>
                            <th scope="col">AÇÕES</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php loadPessoas(); ?>
                        </tbody>    
                    </table>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>
</html>
