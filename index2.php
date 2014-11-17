<html>
    <?php
    include "valida_cookies_index2.inc";
    include 'connect.php';
    ?>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">


        <script src="script.js"></script>
    </head>

    <body onload='setActive("home")'>            
        <div class="principal">
            <!-- TOPO !-->
            <div class="topo_flutuante">
                <div class="logo">
                    <img src="img/logo2.png">

                </div>				
                <div class="busca">
                    <form name="busca" method="GET">
                        <input type="text" placeholder="O que está procurando?">
                        <input type="submit" value="Pesquisar">
                    </form>
                </div>
            </div>
            <!-- FIM-TOPO !-->
            <!-- CABEÇALHO !-->
            <header>
                <div class="slogan">
                    <img src="img/slogan.png" alt="slogan" width="350" height="200">
                </div>

                <div class="login">                                    
                    <fieldset>
                        <legend>Login</legend>
                        <div class="imagem_perfil">
                            <img src="img/perfil_blank.jpg">
                        </div>
                        <div class="bem_vindo">
                            Bem vindo(a) <?php
                            require_once "connect.php";
                            $login = $_COOKIE['login'];
                            $senha = $_COOKIE['senha'];
                            $query = mysql_query("SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'");
                            $usuario = mysql_fetch_assoc($query);
                            echo $usuario['nome'] . "<br>";
                            ?>
                        </div>
                        <div class="logout">
                            <a href="logout.php">Logout</a>
                        </div>
                        <?php
                        if ($_COOKIE['login'] == 'admin'):
                            ?>
                            <div class="admin">
                                <a href="javascript:void(0)" onclick="window.open('/gilson/tw/projeto/admin.php?opcao=buscar')">Área administrativa</a>
                            </div>
                        <?php endif; ?>


                    </fieldset>

                </div>
                <br>

                <nav>
                    <ul>
                        <a href="javascript:void(0)" onClick="abre('home.html', 'frameBemVindo.html');
                                setActive('home')"><li id="home" > Home</li></a>
                        <a href="javascript:void(0)" onClick="abre('HTML.html', 'frameHTML.html');
                                setActive('html')"><li id="html">HTML</li></a>
                        <a href="javascript:void(0)" onClick="abre('PHP.html', 'framePHP.html');
                                setActive('php')"><li id="php">PHP</li></a>
                        <a href="javascript:void(0)" onClick="abre('duvidas.html', 'frameBemVindo.html');
                                setActive('duvidas')"><li id="duvidas">Dúvidas</li></a>
                        <a href="javascript:void(0)" onClick="abre('forum.html', 'frameForum.html');
                                setActive('forum')"><li id="forum">Forum</li></a>
                        <ul>
                            </nav>
                            </header>


                            <iframe src="home.html" class="painel_principal" name="painel_principal"></iframe>
                            <iframe src="frameBemVindo.html" class="painel_sec" name="painel_sec"></iframe>


                            </div>		
                            </body>
                            </html>