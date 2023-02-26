<?php
function menu($atual){
echo
"<ul class='nav nav-pills nav-fill' style='margin: 10px;'>
    <li class='nav-item'>
        <a class='nav-link ";
        if($atual == "login"){
            echo"active";
        } echo "' aria-current='page' href='login.php'>Login</a>
    </li>
    <li class='nav-item'>
        <a class='nav-link ";
        if($atual == "cadastro"){
            echo"active";
        } echo "' aria-current='page' href='cadastro.php'>Cadastro</a>
    </li>
    <li class='nav-item'>
        <a class='nav-link ";
        if($atual == "perfil"){
            echo"active";
        } echo "' aria-current='page' href='perfil.php'>Perfil</a>
    </li>
</ul>";
}

?>