<?php
    session_start();
class Registro{
    public $nome;
    public $email;
    public $hash1;
    public $hash2;

    public function __construct($nome, $email, $hash1, $hash2){
        $this->setNome($nome);
        $this->setEmail($email);
        $this->setHash1($hash1);
        $this->setHash2($hash2);
    }

    public function setNome($value){
        $this->nome = $value;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setEmail($value){
        $this->email = $value;
    }
    public function getEmail(){
        return $this->email;
    }
    public function  setHash1($value){
        $this->hash1 = $value;
    }
    public function getHash1(){
        return $this->hash1;
    }
    public function setHash2($value){
        $this->hash2 = $value;
    }
    public function getHash2(){
        return $this->hash2;
    }

    public function exibir(){
        var_dump($this->getNome());
        var_dump($this->getEmail());
        var_dump($this->getHash1());
        var_dump($this->getHash2());
    }

    public function validacaoCadastro(){
        function isNome($nome){
            if(strlen($nome) > 3 && strlen($nome) < 50){
                echo "<h1>NOME OK</h1>";
                return true;
            } else {
                return false;
            }
        }

        function isEmail($email1){
            if($email1 != $_SESSION['email']){
                echo "<h1>Email error</h1>";
                return false;
            }else {
                echo "<h1>EMAIL OK</h1>";
                return true;
            }
            
        }
        include "password.php";

        if(isEmail($this->getEmail()) && isNome($this->getNome()) && isSenha($this->getHash1(), $this->getHash2())){
            return true;
        }else{
            if(!isNome($this->getNome())){
                header('Location: ../perfil.php?error=nome');
                return false;
            }
            if(!isEmail($this->getEmail())){
                header('Location: ../perfil.php?error=email');
                return false;
            }
            if(!isSenha($this->getHash1(), $this->getHash2())){
                header('Location: ../perfil.php?error=senha');
                return false;
            }
            
        }

    }
    //
    //-
    //
    public function update($nome, $hash1, $hash2, $email){
        include "sql_connection.php";
        $comando = $conexao->prepare("UPDATE Clientes SET cli_nome = ?, cli_hash1 = ?, cli_hash2 = ? WHERE cli_email = ?");
        $comando->bind_param("ssss", $nome, $hash1, $hash2, $email);
        $comando->execute();
        echo "<h2 style='color: blue'>Cadastro OK</h2>";
    }
    public function atualizar() : void{
        if($this->validacaoCadastro()){
            $this->update($this->getNome(), sha1($this->getHash1()), sha1($this->getHash2()), $this->getEmail());
            header('Location: ../perfil.php?situacao=cadastrado');
        }else {
           header('Location: ../perfil.php?error=cadastro');
            echo "<h2 style='color: red'>Cadastro ERROR</h2>";
        }
    }
}

$registro = new Registro($_POST['nome'], $_POST['email'], $_POST['senha1'], $_POST['senha2']);
$registro->atualizar();
$registro->exibir();
?>