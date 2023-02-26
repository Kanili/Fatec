<?php 
function isNumber($valor){
    $numeros = array(1,2,3,4,5,6,7,8,9,0);
    for($i=0; $i < count($numeros); $i++){
        for($j=0; $j < strlen($valor); $j++){
            if($numeros[$i] == $valor[$j]){
                return true;
            }else if($j == strlen($valor)){
                return false;
            }else {
                continue;
            }
        }
    }
}


function isWord($valor){
    $array_letras = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
    for($i=0; $i < count($array_letras); $i++){
        for($j=0; $j < strlen($valor); $j++){
            if($valor[$j] == $array_letras[$i]){
                return true;
            }else if($i == count($array_letras)){
                return false;
            }else {
                continue;
            }
        }
    }
}


function isWordUpper($valor){
    $array_letras = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
    for($i=0; $i < count($array_letras); $i++){
        for($j=0; $j < strlen($valor); $j++){
            if($valor[$j] == strtoupper($array_letras[$i])){
                return true;
            }else if($i == count($array_letras)){
                return false;
            }else {
                continue;
            }
        }
    }
}


function isCaracterEspecial($valor){
    if(preg_match('/[^\p{L}\p{N}\s]/u', $valor)){
        return true;
    }else {
        return false;
    }
}

function isSequencia($valor){
    for($i=0; $i < strlen($valor); $i++){
        if($i == 0){
            continue;
        }else {
            if($valor[$i] == $valor[$i-1]){
                return true;
            }else if($i == strlen($valor)){
                return false;
            }else {
                continue;
            }
        }
    }
}
function isValor($valor){
    if($valor < 8){
        return false;
    }else {
        return true;
    }
}
function isSenha($senha, $senha2){
    if(isValor($senha)){
        if(isNumber($senha)){
            if(isCaracterEspecial($senha)){
                if(isWord($senha)){
                    if(isWordUpper($senha)){
                        if(isSequencia($senha)){
                            var_dump("sequencia");
                            return false;
                        }else {
                            if($senha != $senha2){
                                return false;
                            }else {
                                echo "<h1>SENHA OK</h1>";
                                return true;
                            }
                        }
                    }else {
                        var_dump("letraAlta");
                        return false;
                    }
                }else {
                    var_dump("letra");
                    return false;
                }
            }else {
                var_dump("especial");
                return false;
            }
        }else{
            var_dump("numero");
            return false;
        }
    }else{
        var_dump("valor");
        return false;
    }
}
?>