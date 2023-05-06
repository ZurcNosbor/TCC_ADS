<!DOCTYPE html>
<html lang= "pt-br">
<head>
	<title>SANGUE SOLIDÁRIO</title>
	<meta charset= "UTF-8"/>
	<meta name="author" content="Robson Cruz de Melo">
	<meta name= "description" content= "Projeto Aplicado">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
	integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/estilo2.css">
</head>
<body class = "corpo">
	<form method="post" action="">
		<fieldset>
		    <div id="geral">
			<img id = "logo" src="img/logo.png" alt="Minha Imagem">
				<h3 class="cabecalhoh1">BEM VINDO AO SANGUE SOLIDÁRIO!!</h3>
				
		        <div class="input-group mb-3">
		        <span class="input-group-text" >Email:</span>
		        <input type="email" class="form-control" placeholder="Digite seu email" aria-label="email" name="email_login" required>
		        </div>

		        <div class="input-group mb-3">
		        <span class="input-group-text" >Senha:</span>
		        <input type="password" class="form-control" name="senha_login" required>
		        </div>

		        <input class="btn btn-info" type="submit" value="Entrar">
		        <input class="btn btn-warning" type="reset" value="Limpar campos">
		        <br></br>
				<a href="cadastro.php" class="voltar">Cadastrar Novo Usuário</a>
		        
		    </div>
		</fieldset>
	</form>
	<div class="container"> 
		<div class="row">
			<div class="col mt-5">
				<?php

					//CONEXÃO COM A PAGINA CONFIG.PHP
					include("config.php");
					
					//CONDICIONAL PARA VALIDAR SE FOI PREENCHIDO OS CAMPOS
					if (isset($_POST['email_login']) || isset($_POST['senha_login'])) {

						//LIMPAR A STRING
						$email = $conn->real_escape_string($_POST['email_login']);
						$senha = $conn->real_escape_string($_POST['senha_login']);

						//SELECIONA TODOS OS EMAIL PARA VERIFICAÇÃO
						$sql_code = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha' LIMIT 1";
						$sql_query = $conn->query($sql_code) or die("falha na execução do codigo sql: " . $conn->error);
						
				

						$quantidade = $sql_query->num_rows;

						//CONDICONAL PARA LOGAR NO SISTEMA
						if ($quantidade == 1) {

							$usuarios = $sql_query->fetch_assoc();

							//CRIANDO SESSÃO
							if (!isset($_SESSION)) {
								session_start();
							}
							
							$_SESSION['idUser'] = $usuarios['idUser'];
							$_SESSION['nome'] = $usuarios['nome'];
							$_SESSION['sangue'] = $usuarios['tip_sangue'];

							//MANDA O USUARIO PARA PAGINA PAINEL.PHP
							header("location: painel.php");
						} else {

							//CASO USUARIO DIGITE AS CREDENCIAIS ERRADAS OU NÃO EXISTA CONTA
							print "<script>alert('Não foi possível logar, email ou senha incorretos!!');</script>";
							print "<script>location.href='index.php';</script>";
						}
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>


