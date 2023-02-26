let g1, g2, g3;
function validar(valor){
    switch(valor){
        case "nome":
            let valorNome = document.getElementById("entradaNome");
            let nomeAlerta = document.getElementById("nomeAlerta");
            if(valorNome.value.length < 3 || valorNome.value.length > 50){
                nomeAlerta.style.display = "";
                valorNome.classList.add("is-invalid");
            }else {
                g1 = true;
                nomeAlerta.style.display = "none";
                valorNome.classList.remove("is-invalid");
            }
            break;
        case "email":
            let valorEmail = document.getElementById("entradaEmail");
            let emailAlerta = document.getElementById("emailAlerta");
            let emailValor = valorEmail.value;
            let email;
            let email2;
            if(valorEmail.value.length > 10){
                email = true;
            }else {
                email = false;
            }
            for(let i = 0; i < emailValor.length; i++){
                if(emailValor[i] == "@"){
                    email2 = true;
                    break;
                }else {
                    email2 = false;
                }
            }
            if(email && email2){
                emailAlerta.style.display = "none";
                valorEmail.classList.remove("is-invalid");
                g2 = true;
            }else {
                emailAlerta.style.display = "";
                valorEmail.classList.add("is-invalid");
            }
                    
            break;
        case "senha1":
            let valorSenha = document.getElementById("entradaSenha");
            let senhaAlerta = document.getElementById("senhaAlerta");
            let getSenha = valorSenha.value;
            let isSenha, isSenha2;
            if(valorSenha.value.length < 3 ){
                senhaAlerta.style.display = "";
                valorSenha.classList.add("is-invalid");
            }else {
                for(let i = 0; i < valorSenha.value.length; i++) {
                    if(getSenha[i] == "1" || getSenha[i] == "2" || getSenha[i] == "3" || getSenha[i] == "4"  ||  getSenha[i] == "5" || getSenha[i] == "6" || getSenha[i] == "7" || getSenha[i] == "8" || getSenha[i] == "9" || getSenha[i] == "0"){
                    
                    }else {
                        if(getSenha[i] != getSenha[i].toUpperCase()) {
                            isSenha = false;
                        }else{
                            isSenha = true;
                            break;
                        }
                    }
                }
                
                for(let i = 0; i < valorSenha.value.length; i++) {
                    if(getSenha[i] == "1" || getSenha[i] == "2" || getSenha[i] == "3" || getSenha[i] == "4"  ||  getSenha[i] == "5" || getSenha[i] == "6" || getSenha[i] == "7" || getSenha[i] == "8" || getSenha[i] == "9" || getSenha[i] == "0"){
                    }else {
                        if(getSenha[i] != getSenha[i].toUpperCase()) {
                            isSenha2 = true;
                            break;
                        }else{
                            isSenha2 = false;
                        }
                    }
                }
                let numero;
                for(let i = 0; i < valorSenha.value.length; i++) {
                    if(getSenha[i] == "1" || getSenha[i] == "2" || getSenha[i] == "3" || getSenha[i] == "4"  ||  getSenha[i] == "5" || getSenha[i] == "6" || getSenha[i] == "7" || getSenha[i] == "8" || getSenha[i] == "9" || getSenha[i] == "0"){
                        numero = true;
                        break;
                    }else {
                        numero = false;
                    }
                }
                if(isSenha){
                    senhaAlerta.style.display = "none";
                    valorSenha.classList.remove("is-invalid");
                }else {
                    senhaAlerta.style.display = "";
                    valorSenha.classList.add("is-invalid");
                }

                if(isSenha2){
                    senhaAlerta.style.display = "none";
                    valorSenha.classList.remove("is-invalid");
                }else{
                    senhaAlerta.style.display = "";
                    valorSenha.classList.add("is-invalid");
                }

                if(numero){
                    senhaAlerta.style.display = "none";
                    valorSenha.classList.remove("is-invalid");
                }else{
                    senhaAlerta.style.display = "";
                    valorSenha.classList.add("is-invalid");
                }
                
                var regex = /[^a-zA-Z0-9]/g;
                var contemCaracteresEspeciais = regex.test(getSenha);
                if(contemCaracteresEspeciais){
                    senhaAlerta.style.display = "none";
                    valorSenha.classList.remove("is-invalid");
                }else {
                    senhaAlerta.style.display = "";
                    valorSenha.classList.add("is-invalid");
                }
                
                let setSequencia;
                for(let i = 0; i < getSenha.length; i++){
                    if(i == 0){
                        continue;
                    }
                    if(getSenha[i] != getSenha[i - 1]){
                        setSequencia = false;
                    }else{
                        setSequencia = true;
                        break;
                    }
                }

                if(setSequencia){
                    senhaAlerta.style.display = "";
                    valorSenha.classList.add("is-invalid");
                }else {
                    senhaAlerta.style.display = "none";
                    valorSenha.classList.remove("is-invalid");
                }
                
            }
            break;
        case "senha2":
            let valorSenha1 = document.getElementById("entradaSenha");
            let valorSenha2 = document.getElementById("entradaConfirmacaoSenha");
            let senhaAlerta2 = document.getElementById("senhaConfirmacaoAlerta");
            let getSenha2 = valorSenha2.value;
            if(valorSenha1.value == valorSenha2.value){
                senhaAlerta2.style.display = "none";
                valorSenha2.classList.remove("is-invalid");
                g3 = true;
            }else {
                senhaAlerta2.style.display = "";
                valorSenha2.classList.add("is-invalid");
            }
            break;
    }
    
    
}

function enviar(){
    validar("nome");
    validar("email");
    validar("senha1");
    validar("senha2");
    if(g1 && g2 && g3){
        console.log(g1 + " " + g2 + " " + g3);
        return true;
    }else {
        console.log(g1 + " " + g2 + " " + g3);
        return false;
    }
}


