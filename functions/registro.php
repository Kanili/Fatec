<?php
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

    public function  setEmail($value){
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
        
        function isEmail($email){
            for($i=0; $i < strlen($email); $i++){
                if($email[$i] == "@"){
                    include "sql_connection.php";
                    $comando = $conexao->prepare("SELECT cli_email FROM Clientes WHERE ? = cli_email");
                    $comando->bind_param("s", $email);
                    $comando->execute();
                    $resultado = $comando->get_result();
                    if($resultado->fetch_assoc() > 0){
                        return false;
                    }else{
                        
                        echo "<h1>EMAIL OK</h1>";
                            return true;
                        }
                }else if($i == strlen($email)){
                    return false;
                }else {
                    continue;
                }
            }
        }
        include "password.php";









        //  && isSenha($this->getHash1(), $this->getHash2())
        if(isEmail($this->getEmail()) && isNome($this->getNome()) && isSenha($this->getHash1(), $this->getHash2())){
            return true;
        }else{
            if(!isNome($this->getNome())){
                header('Location: ../cadastro.php?error=nome');
                return false;
            }
            if(!isEmail($this->getEmail())){
                header('Location: ../cadastro.php?error=email');
                return false;
            }
            if(!isSenha($this->getHash1(), $this->getHash2())){
                header('Location: ../cadastro.php?error=senha');
                return false;
            }
            
        }

    }
    //
    //
    //
    public function cadastrar() : void{
        if($this->validacaoCadastro()){
            include "sql_connection.php";
            $comando = $conexao->prepare("INSERT INTO `Clientes` (cli_nome, cli_email, cli_hash1, cli_hash2) VALUES (? , ? , ? , ?)");
            $comando->bind_param("ssss", $this->getNome(), $this->getEmail(), sha1($this->getHash1()), sha1($this->getHash2()));
            $comando->execute();
            echo "<h2 style='color: blue'>Cadastro OK</h2>";
            header('Location: ../login.php?situacao=cadastrado');
        }else {
           // header('Location: ../cadastro.php?error=cadastro');
            echo "<h2 style='color: red'>Cadastro ERROR</h2>";
        }
    }
}


$registro = new Registro($_POST['nome'], $_POST['email'], $_POST['senha1'], $_POST['senha2']);
$registro->cadastrar();
?>