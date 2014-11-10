<html>
    <?php
    /* 23/10/2014 - 08:37
      - Inicio da implementação do BD
     */
    /* 27/10/2014 - 16:12
     * *** ALTERAÇÕES ***
     *
     * *** OBSERVAÇÕES ***
     * - Revisar os seguintes arquivos:
     *     index.php (funcionamento da page)
     * - "img/perfil_blank.jpg" é a imagem usada por padrao para qualquer usuário logado (*TEMPORÁRIO*)
     * - Alterar a estrutura do site! (importante)
     *     
     */
    
    /* 28/10/2014 - 20:17
     * *** NOVIDADES ***
     * - Implementado o sistema de cadastro
     * - Corrigido o bug css quando o usuário efetuava login
     * - Corrigida a funcionalidade da "logout.php"
     */

    //verifica se há alguma sessão ativa e exibe um alert (apenas para efeito de teste)         
    include "valida_cookies_index2.inc";
    ?>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <!--<style>
        body {
background-color:black;
background-image: url("img/fundo2.jpg");}
        </style>-->

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
                            include "connect.php";
                            $login = $_COOKIE['login'];
                            $senha = $_COOKIE['senha'];
                            $query = mysql_query("SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'");
                            $usuario = mysql_fetch_assoc($query);
                            echo $usuario['nome'] . "<br>"; ?>
                        </div>
                        <div class="logout">
                            <a href="logout.php">Logout</a>
                        </div>

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

                            <!-- INICIO DO CONTEÚDO !-->
                            <iframe src="home.html" class="painel_principal" name="painel_principal"></iframe>
                            <iframe src="frameBemVindo.html" class="painel_sec" name="painel_sec"></iframe>


                            </div>		
                            </body>
                            </html>