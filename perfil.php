<?php
session_start();
if($_SESSION['logado']){

    $id = $_SESSION['id'];
    $nome = $_SESSION['nome'];
    $email = $_SESSION['email'];
    $hash1 = $_SESSION['hash1'];
    if(@$_POST['sair'] == "apagar"){
        session_destroy();
        header("Location: login.php?situacao=saiu");
    }
    if(@$_POST['cookie'] == "cookie"){
        setcookie("email", $email);
    }
    if(@$_POST['cookieA'] == "cookieA"){
        setcookie('email', '', time() - 3600);
    }
}else{
    header("Location: login.php?situacao=loginINVALIDO");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <?php
    include "operacoes/Menu.php";
    menu("perfil");
    ?>
    <script src="cadastro.js"></script>
    <style>
        .forma{
            display: inline-block;
        }
        #enviar{
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div id="container">
        <form action="functions/atualizar.php" method="post" id="form">
            <h1>Perfil</h1>
            <div class="row mb-3">
                <label for="entradaNome" class="col-sm-2 col-form-label">Nome*</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="entradaNome" placeholder="Digite seu nome" name="nome" value="<?php echo $nome;?>" onblur="validar('nome')">
                    <div id="nomeAlerta" class="invalid-feedback"  style="display: none;">
                    O campo nome deve conter entre 3 a 50 caracteres.
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="entradaEmail" class="col-sm-2 col-form-label">Email*</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="entradaEmail" placeholder="Digite seu email" name="email" value="<?php echo $email;?>" onblur="validar('email')" readonly  style="background: gainsboro;">
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
                    <button type="submit" class="btn btn-primary" id="enviar" onlick="enviar()">Atualizar</button>
                </div>
            </div>
        </form>
        <div class="row mb-3">
            <label for="enviar" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                    <form action="perfil.php" method="post" class="forma">
                        <input type="hidden" name="cookie" value="cookie">
                        <button type="submit" class="btn btn-primary">Salvar Login</button>
                    </form>
                    <form action="perfil.php" method="post" class="forma">
                        <input type="hidden" name="cookieA" value="cookieA">
                        <button type="submit" class="btn btn-primary">Limpar Login</button>
                    </form>
                    <form action="perfil.php" method="post" class="forma">
                        <input type="hidden" name="sair" value="apagar">
                        <button type="submit" class="btn btn-danger" value="Sair">Sair</button>
                    </form>
                    </div>
                </div>
    </div>
</body>
</html>