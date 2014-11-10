<!DOCTYPE html>
<head>
    <style>
        .lighten {
            color: grey;
        }
        tr{
            font-weight:bold;
        }

    </style>
    <!--<link rel="stylesheet" type="text/css" href="style.css">-->
    <meta charset="UTF-8">  
</head>
<body>
<center><h1>CADASTRO</h1></center>

<!--<div class="cadastro">-->
<form name="cadastro" enctype="multipart/form-data" method="POST" action="cadastro.php">
    <table>
        <script src="valida_formulario.js"></script>
        <tr><td>Usuario <span class="lighten"> *</span> :</td> <td><input type="text" name="usuario" maxlength="25" oninput="validaLength('usuario', this.value, 5)" autofocus required><span id="usuario"></span></td></tr>
        <tr><td>Senha <span class="lighten"> *</span> :</td> <td><input type="password" name="senha" maxlength="20" oninput="validaLength('senha', this.value, 5)" required><span id="senha"></span></td></tr>
        <tr><td>Confirme a senha <span class="lighten"> *</span> :</td> <td><input type="password" name="senha2" maxlength="20" required></td></tr>

        <tr><td>Nome <span class="lighten"> *</span> : </td> <td><input type="text" name="nome" maxlength="20" oninput="validaLength('nome', this.value, 3)" required><span id="nome"></span></td></tr>
        <tr><td>Sobrenome <span class="lighten"> *</span> : </td> <td><input type="text" name="sobrenome" maxlength="50" oninput="validaLength('sobrenome', this.value, 6)" required><span id="sobrenome"></span></td></tr>
        <tr><td>Sexo <span class="lighten"> *</span> : </td> <td><input type="radio" name="sexo" value="m" checked="true">Masculino
                <input type="radio" name="sexo" value="f">Feminino</td></tr>

        <tr><td>Email: </td> <td><input type="email" name="email" required></td></tr>
        <tr><td>Facebook: facebook.com/</td> <td><input type="text" name="facebook" maxlength="50"></td></tr>
        <tr><td>Foto: </td> <td><input type="file" name="foto"><input type="hidden" name="MAX_SIZE_FILE" value=""></td></tr>
        </tr>
        <input type="hidden" name="autentica" value="0">
    </table>

    <center><input type="submit" value="Cadastrar"><br></center>
    
    <?php
//*** Faz a validação dos dados inseridos e efetua o cadastro ***
//lista de erros
$erro[0] = "Usuário já existe!";
$erro[1] = "As senhas não conferem!";
$erro[2] = "O nome de usuário não deve conter espaços";
$erro[3] = "Email inválido";
if (isset($_POST['usuario'])
        AND isset($_POST['senha'])
        AND isset($_POST['nome'])
        AND isset($_POST['sobrenome'])
        AND isset($_POST['sexo'])) {
    if(ereg(" ", $_POST['usuario'])) {
        echo "<script>alert('$erro[1]');</script>";
        exit;
    }
    
    if(!ereg("^[a-z0-9]{3,}@[a-z]{4,}.[a-z]{3}$", $_POST['email'])) {
        echo "<script> alert('$erro[3]'); </script>";
        exit;
    }
    //inicializa as variaveis
    $usuario = addslashes(strtolower($_POST['usuario']));
    $senha = md5(addslashes($_POST['senha']));
    $senha2 = md5(addslashes($_POST['senha2']));
    
    if($senha !== $senha2) {
        echo "<script>alert('$erro[1]');</script>";
        exit;
    }
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $sexo = $_POST['sexo'];

    if (isset($_POST['facebook'])) {
        $facebook = $_POST['facebook'];
    } else {
        $facebook = "";
    }
    
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $email = "";
    }

    //faz a conexão com o db
    include "connect.php";

    //verifica se existe algum usuário já cadastrado

    $sql = "SELECT login FROM usuarios WHERE login = '$usuario' LIMIT 1";
    $query = mysql_query($sql);
    //se existir algum usuário já cadastrado, exibe uma msg de erro e encerra o script.

    if (mysql_fetch_assoc($query)) {
        echo "<script> alert('$erro[0]'); </script>";
        exit;
        //caso não haja usuário no sistema, insere um novo usuário
    } else {

        $sql = "INSERT INTO usuarios (login, senha, nome, sobrenome, sexo, email, facebook)
            VALUES ('$usuario', '$senha', '$nome', '$sobrenome', '$sexo', '$email', '$facebook')";
        $query = mysql_query($sql);
        
        //verifica se o novo usuário foi inserido com sucesso
        
        if (mysql_affected_rows() == 1) {
            echo "<script> alert('Usuário cadastrado com sucesso!\\nSeja bem-vindo(a) $nome'); </script>";
        } else {
            $err = mysql_error();
            echo "<script> alert('Não foi possivel realizar seu cadastro.\\n$err'); </script>";
        }
    }
}
?>
</form>
<!--</div><br>-->
</body>
</html>