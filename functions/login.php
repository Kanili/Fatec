<?php 


class login {
    public $email;
    public $senha;

    function __construct($email, $senha) {
        $this->email = $email;
        $this->senha = $senha;
    }
    function getEmail() {
        return $this->email;
    }
    function getSenha() {
        return $this->senha;
    }
    function loginValidacao($email, $senha) {
        include "sql_connection.php";
        $comando = $conexao->prepare("SELECT cli_id, cli_nome, cli_email, cli_hash1 FROM Clientes WHERE ? = cli_email AND ? = cli_hash1");
        $comando->bind_param("ss", $email, $senha);
        $comando->execute();
        $resultado = $comando->get_result();
        if(mysqli_num_rows($resultado) > 0){
            session_start();
            $linha = mysqli_fetch_assoc($resultado);
            $_SESSION['id'] = $linha['cli_id'];
            $_SESSION['nome'] = $linha['cli_nome'];
            $_SESSION['email'] = $linha['cli_email'];
            $_SESSION['hash1'] = $linha['cli_hash1'];
            $_SESSION['logado'] = true;
            echo "<h1>FOI</h1>";
            header("Location: ../perfil.php?situacao=LOGADO");
        }else {
            echo "<h1>NAO FOI</h1>";
            header("Location: ../login.php?situacao=CadastroNaoExsite");
        }
    }
    function login(){
        $this->loginValidacao($this->getEmail(), $this->getSenha());
    }
}

$pessoa = new login($_POST['email'], sha1($_POST['senha']));
$pessoa->login();

?>
