<html>
<?php 
	     
        include "valida_cookies_index.inc";
 
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
						<form name="login" method="POST" action="login.php">
							<input type="text" placeholder="Usuário" name="username" required><br>
							<input type="password" placeholder="*********" name="password" required>
							<input type="submit" value="Entrar"><br>
							<a href="javascript:void(0)" onClick="abre('cadastro.php','frameBemVindo.html');setActive('forum')">Novo Usuário</a>
						</form>
					</fieldset>
                                        </div>
                                <br>
				
				<nav>
					<ul>
						<a href="javascript:void(0)" onClick="abre('home.html','frameBemVindo.html');setActive('home')"><li id="home" > Home</li></a>
						<a href="javascript:void(0)" onClick="abre('HTML.html','frameHTML.html');setActive('html')"><li id="html">HTML</li></a>
						<a href="javascript:void(0)" onClick="abre('PHP.html','framePHP.html');setActive('php')"><li id="php">PHP</li></a>
						<a href="javascript:void(0)" onClick="abre('duvidas.html','frameBemVindo.html');setActive('duvidas')"><li id="duvidas">Dúvidas</li></a>
						<a href="javascript:void(0)" onClick="abre('forum.html','frameForum.html');setActive('forum')"><li id="forum">Forum</li></a>
					<ul>
				</nav>
			</header>
			
			<!-- INICIO DO CONTEÚDO !-->
			<iframe src="home.html" class="painel_principal" name="painel_principal"></iframe>
			<iframe src="frameBemVindo.html" class="painel_sec" name="painel_sec"></iframe>
			
			
		</div>		
	</body>
</html>