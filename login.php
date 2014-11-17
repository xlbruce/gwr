<meta charset="UTF-8">
<?php
    //faz a conexão com o DB
    include "connect.php";
    //armazena o valor dos campos "username" e "password" em $login e $senha
    $login = addslashes(strtolower($_POST['username']));
    //aqui é usada a função md5 para criptografar a senha digitada
    $senha = md5(addslashes($_POST['password']));
    
    
    //a variavel $sql contem o comando que busca o login e senha no DB
    $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
    
    //$query armazena o resultado dessa consulta ao banco de dados
    $query = mysql_query($sql) or die ("Erro ao logar-se");
    
    //mysql_num_rows contem o número de registros encontrados
    /*caso este seja <= 0, significa que não foi encontrado nenhum usuario
    com os dados inseridos no formulário */    
    if(mysql_num_rows($query) <= 0) {
        echo "Usuário ou senha incorretos";
    } else {
        $usuario = mysql_fetch_assoc($query);
        //cria um cookie (login), para informar ao sistema que há um usuário logado
        setcookie("usuario", $usuario['nome']);
        setcookie("login", $login);
        setcookie("senha", $senha);
        header("Location: index2.php");
        
    }
    
    
    
?>
