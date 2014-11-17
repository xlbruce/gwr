<?php
include 'functions.inc';
include 'connect.php';
//somente o usuário ADMIN tem acesso a esta page
$login = "";
if(isset($_COOKIE['login'])) {
    $login = $_COOKIE['login'];
    if ($login !== "admin" OR empty($login)) {
        header("location: /gilson/tw/projeto/index2.php");
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Área administrativa</title>
    </head>
    <body>
        <form name="frm_admin" id="frm_admin" action="" method="GET">
            <input type="radio" name='opcao' value="inserir" onclick="submit();">Inserir<br>
            <input type="radio" name='opcao' value="buscar" onclick="submit();">Buscar<br>
            <input type="radio" name='opcao' value="atualizar" onclick="submit();">Atualizar<br>
            <input type="radio" name='opcao' value="remover" onclick="submit();">Remover<br><br>
        </form>
        <?php if ($_GET['opcao'] == 'inserir'): //opção inserir escolhida   ?>
            <fieldset>
                <legend>Inserir novo usuário</legend>
                <form name="cadastro" target="_blank" enctype="multipart/form-data" method="POST" action="cadastro.php">
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
                    </table>
                    <br> <input type="submit" name="enviar" value="Enviar">
                </form>
            </fieldset>
        <?php elseif ($_GET['opcao'] == 'buscar'): //opcao buscar   ?>
            <fieldset>
                <legend>Busca de usuário</legend>
                <form name="frm_busca_admin" method="POST" action="">
                    <table>
                        <tr><td>ID:</td> <td><input type="text" name="id" autofocus></td></tr>
                        <tr><td>Usuario:</td> <td><input type="text" name="usuario" maxlength="25"></td></tr> 
                        <tr><td>Nome: </td> <td><input type="text" name="nome" maxlength="20"></td></tr>
                        <tr><td>Sobrenome: </td> <td><input type="text" name="sobrenome" maxlength="50"</td></tr>
                        <tr><td>Sexo: </td> <td><input type="radio" name="sexo" value="m">Masculino
                                <input type="radio" name="sexo" value="f">Feminino</td></tr>

                        <tr><td>Email: </td> <td><input type="text" name="email"></td></tr>
                    </table>
                    <br><input type="submit" value="Enviar">
                </form>
            </fieldset>
            <?php
            $frm = getFormData();

            $busca = Array();
            if (!empty($frm['id'])) {
                $busca[] = "ID = '{$frm['id']}'";
            }
            if (!empty($frm['login'])) {
                $busca[] = "login LIKE '%{$frm['login']}%'";
            }
            if (!empty($frm['nome'])) {
                $busca[] = "nome LIKE '%{$frm['nome']}%'";
            }
            if (!empty($frm['sobrenome'])) {
                $busca[] = "sobrenome LIKE '%{$frm['sobrenome']}%'";
            }
            if (!empty($frm['email'])) {
                $busca[] = "email LIKE '%{$frm['email']}%'";
            }
            if (!empty($frm['sexo'])) {
                $busca[] = "sexo = '{$frm['sexo']}'";
            }

            $sql = "SELECT * FROM usuarios WHERE ";
            $sql .= implode(" AND ", $busca);

            //require 'connect.php';
            if (sizeof($busca)) {
                $query = mysql_query($sql);
                printTable($query);
            } else {
                printTable(mysql_query("SELECT * FROM usuarios"));
            }
            ?>
        <?php elseif ($_GET['opcao'] == "atualizar"): //opcao atualizar  ?>
            <fieldset>
                <legend>Atualizaçao de usuário</legend>

                <form name="frm_atualiza_admin" action="" method="POST">
                    ID do usuário a ser atualizado: <input type="text" id="id" name="id"><br>
                    <input type="submit" name="envia_atualizar_consulta" value="Enviar"><br><hr>
                    Novos dados*:<br>
                    <table>
                        <tr><td>Login:</td> <td><input type="text" name="usuario" maxlength="25" autocomplete="off"></td></tr> 
                        <tr><td>Senha:</td> <td><input type="password" name="senha" maxlength="20"</td></tr>
                        <tr><td>Nome: </td> <td><input type="text" name="nome" maxlength="20"></td></tr>
                        <tr><td>Sobrenome: </td> <td><input type="text" name="sobrenome" maxlength="50"</td></tr>
                        <tr><td>Sexo: </td> <td><input type="radio" name="sexo" value="m">Masculino
                                <input type="radio" name="sexo" value="f">Feminino</td></tr>

                        <tr><td>Email: </td> <td><input type="email" name="email"></td></tr>
                    </table>
                    <br><input type="submit" name="envia_atualizar"value="Enviar"><br>
                </form>
                *Campos em branco não serão alterados

                <?php
                if (!empty($_POST['envia_atualizar_consulta'])) {//exibe o usuario antes de atualizar
                    $frm = getFormData();
                    echo "<script>document.getElementById('id').value = '{$frm['id']}'; </script>";
                    echo printTable(mysql_query("SELECT * FROM usuarios WHERE id = {$frm['id']}"));
                }
                if (!empty($_POST['envia_atualizar'])) {//só executa a atualização após o click do botão enviar                    
                    $frm = getFormData();

                    $busca = Array();
                    if (!empty($frm['id'])) {
                        $erro = Array();
                        $busca[] = "ID = '{$frm['id']}'";
                        //se o campo id não for preenchido, a atualização não é realizado

                        if (!empty($frm['login'])) {
                            //verifica se o login já está cadastrado
                            $query = mysql_query("SELECT * FROM usuarios WHERE login = '{$frm['login']}'");
                            if (mysql_num_rows($query) > 0) {
                                $erro[] = "Nome de usuário já está em uso!";
                            }
                            $busca[] = "login = '{$frm['login']}'";
                        }
                        if (!empty($frm['nome'])) {
                            $busca[] = "nome = '{$frm['nome']}'";
                        }
                        if (!empty($frm['sobrenome'])) {
                            $busca[] = "sobrenome = '{$frm['sobrenome']}'";
                        }
                        if (!empty($frm['email'])) {
                            //verifica se o email já está cadastrado
                            $query = mysql_query("SELECT * FROM usuarios WHERE email = '{$frm['email']}'");
                            if (mysql_num_rows($query) > 0) {
                                $erro[] = "Email já cadastrado!";
                            }
                            $busca[] = "email = '{$frm['email']}'";
                        }
                        if (!empty($frm['sexo'])) {
                            $busca[] = "sexo = '{$frm['sexo']}'";
                        }
                        if (!empty($frm['senha'])) {
                            $pass = md5(addslashes($frm['senha']));
                            $busca[] = "senha = '{$pass}'";
                        }
                        if (!empty($erro)) { //caso nome de usuário/email ja esteja em uso, exibe os erros na tela
                            foreach ($erro as $i) {
                                echo "<script>alert('{$i}');</script>";
                            }
                            echo printTable(mysql_query("SELECT * FROM usuarios WHERE id = {$frm['id']}"));
                        } else {//caso tudo OK, procede com a atualização
                            
                            $sql = "UPDATE usuarios SET ";
                            $sql .= implode(" , ", $busca);
                            $sql .= " WHERE ID = '{$frm['id']}'";

                            $query = mysql_query($sql);
                            if (mysql_affected_rows() > 0) {
                                    echo "<script>alert('Usuário atualizado com sucesso');</script>";
                                echo printTable(mysql_query("SELECT * FROM usuarios WHERE id = {$frm['id']}"));
                            } else {
                                echo "<script>alert('Usuário não atualizado!');</script>";
                            }
                        }
                    }
                }
                ?>
            <?php else: ?>
                <fieldset>
                    <legend>Usuário a ser deletado</legend>
                    <form name="frm_deleta_admin" action="" method="post">
                        ID: <input type="text" name="id" id="id">
                        <input type="submit" name="envia_deletar" value="Buscar"<br><hr>

                    
                    <?php
                    $frm = getFormData();
                    if (!empty($frm['id'])) {     
                        echo "<script> document.getElementById('id').value = '{$frm['id']}' </script>";
                        printTable(mysql_query("SELECT * FROM usuarios WHERE ID = '{$frm['id']}'"));
                    }
                    ?> <?php if(!empty($frm['id'])): ?>
                        <br><input type="submit" name="deleta" value="Apagar">
                        
                        <?php endif; ?>
                        
                    <?php
                    if(!empty($_POST['deleta'])) {
                        $sql = "DELETE FROM usuarios WHERE id = '{$frm['id']}'";
                        $query = mysql_query($sql);
                        
                        if(mysql_affected_rows() > 0) {
                            echo "<script>alert('Usuário deletado com sucesso');</script>";
                            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=/gilson/tw/projeto/admin.php?opcao=remover'>";
                        } else {
                            echo "<script>alert('Usuário não deletado');</script>";
                        }
                    }
                    
                ?>
                    </form>
                </fieldset>
                
            <?php endif; ?>
    </body>
</html>