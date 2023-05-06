<?php
//CONEXÃO COM O ARQUIVO PROTECT.PHP
include('protect.php');
include('config.php');

//obtém o ID do usuário logado
$id_usuario = $_SESSION['idUser'];

//consulta SQL para obter os agendamentos do usuário
$sql = "SELECT * FROM agenda WHERE id_usuario = $id_usuario";

$resultado = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang= "pt-br">
	<head>
		<title>LISTA AGENDA</title>
		<meta charset= "UTF-8"/>
		<meta name="author" content="Robson Cruz de Melo">
		<meta name= "description" content= "Projeto Aplicado">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
				<button id="lista" class="btn btn-warning" onclick="window.location.href='painel.php'">Voltar</button>
		
			</p>

		</div>
		<br/>
		<div class="field_tabela">
			<table class="table table-striped">
			<h2 align = "center">Meus agendamentos</h2>
			<?php
			if ($resultado->num_rows <=0 ) {
				echo '<h3 style="text-align: center;">Opps!! Nada por aqui, agende agora mesmo e ajude a salvar uma vida!!</h3>';
			} 
			?>
			</tr>
				<tr align="center">
					<th>N° Registro doação</th>
					<th>Hospital</th>
					<th>Data</th>
					<th>Hora</th>
					<th>Cancelar</th>
				</tr>

			<?php
			while ($linha = mysqli_fetch_assoc($resultado)) :
				$dataArrumada = $linha['data']; 
				$dataCerta = date("d/m/Y", strtotime($dataArrumada));
			?>
			<tr align="center">
					<td><?php echo $linha['id_agenda']; ?></td>
					<td><?php echo $linha['hospital']; ?></td>
					<td><?php echo $dataCerta; ?></td>
					<td><?php echo $linha['hora']; ?></td>
					<td>
						<button class="btn btn-danger" onclick="window.location.href='excluir.php?id_agenda=<?php echo urlencode($linha['id_agenda']); ?>'">Cancelar agendamento</button>
					</td>
						
			</tr>

			<?php
			endwhile; 
			?>

			</table>
			
		</div>

	</body>

</html>