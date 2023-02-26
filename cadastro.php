<?php
session_start();
if(@$_SESSION['logado']){
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Cadastro</title>
    <?php 
    include "operacoes/Menu.php";
    menu("cadastro");
    ?>
   

    <script src="cadastro.js"></script>
</head>
<body>
    <div id="container">
        <form action="functions/registro.php" method="post" id="form">
            <h1>Formulário de Cadastramento</h1>
            <div class="row mb-3">
                <label for="entradaNome" class="col-sm-2 col-form-label">Nome*</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="entradaNome" placeholder="Digite seu nome" name="nome" value="" onblur="validar('nome')">
                    <div id="nomeAlerta" class="invalid-feedback"  style="display: none;">
                    O campo nome deve conter entre 3 a 50 caracteres.
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="entradaEmail" class="col-sm-2 col-form-label">Email*</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="entradaEmail" placeholder="Digite seu email" name="email" value="" onblur="validar('email')">
                    <div id="emailAlerta"class="invalid-feedback" style="display: none;">
                    Verifique o preenchimento do campo e-mail.
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="entradaSenha1" class="col-sm-2 col-form-label">Senha*</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="entradaSenha" placeholder="Digite sua senha" name="senha1" value="" onblur="validar('senha1'); validar('senha2')">
                    <div id="senhaAlerta" class="invalid-feedback" style="display: none;">
                    O campo senha deve conter mínimo 8 caracteres com letras maiúsculas e minúculas, números, caracteres especiais e não conter sequências.
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="entradaConfirmacaoSenha" class="col-sm-2 col-form-label">Confirmação de senha*</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="entradaConfirmacaoSenha" placeholder="Digite sua confirmação de senha" name="senha2" value="" onblur="validar('senha2')">
                    <div id="senhaConfirmacaoAlerta" class="invalid-feedback" style="display: none;">
                    Campo confirmação de senha e o campo senha não conferem.
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="enviar" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                <button type="submit" class="btn btn-primary" id="enviar" onlick="enviar()">Enviar</button>
                </div>
            </div>
        </form>
        <script>
            document.getElementById("form").addEventListener("submit", function(event){
            if(enviar()){
                
            }else {
                event.preventDefault();
            }
            
        });
    </script>
    </div>
</body>
</html>
