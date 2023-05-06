<?php
	//CONEXÃO COM O ARQUIVO PROTECT.PHP
	include('protect.php');
	
	include('config.php');
	
	$sql = "SELECT hospital, endereco, contato FROM hospitais";
	$resultado = $conn->query($sql);
	
?>

<!DOCTYPE html>
<html lang= "pt-br">
	<head>
		<title>PAINEL</title>
		<meta charset= "UTF-8"/>
		<meta name="author" content="Robson Cruz de Melo">
		<meta name= "description" content= "Projeto Aplicado">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
		integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/estilo2.css">
	</head>

	<body class="corpo">
		<div class="field_painel">
			<img id = "logo2" src="img/logo2.png" alt="Minha Imagem">
			<!-LOGADO NA CONTA, EXIBE MENSAGEM E NOME DO USUARIO->
			<h3 class="cb3">Bem vindo <?php echo $_SESSION['nome']; ?>!!</h3>
			<h3 class="cb3">Tipo sanguíneo: <?php echo $_SESSION['sangue']; ?></h3>

			<p>
				<!-LINK QUE SAI DA CONTA->
				<button id="sair" class="btn btn-danger" onclick="window.location.href='index.php'">Sair da conta</button>
				<button id="lista" class="btn btn-warning" onclick="window.location.href='lista.php'">Doações agendadas</button>
		
			</p>

		</div>
		<br/>
		<div class="field_tabela">
			<table class="table table-striped">
			<h2 align = "center">Lista de hospitais disponíveis para agendamento</h2>
				<tr align="center">
					<th>Nome Hospital</th>
					<th>Endereço</th>
					<th>Contato</th>
					<th>Agendar doação</th>
				</tr>
			<?php
			while ($linha = mysqli_fetch_assoc($resultado)) : 
			?>
			<tr align="center">
					<td><?php echo $linha['hospital']; ?></td>
					<td><?php echo $linha['endereco']; ?></td>
					<td><?php echo $linha['contato']; ?></td>
					<td>
						<button class="btn btn-success" onclick="window.location.href='agendar.php?hospital=<?php echo urlencode($linha['hospital']); ?>'">Agendar</button>
					</td>
				</tr>
			<?php
			endwhile; 
			?>
			</table>
		</div>

	</body>

</html>

