<?php
//CONEXÃO COM O ARQUIVO PROTECT.PHP
include('protect.php');

include('config.php');
//obtém o ID do usuário logado
$id_usuario = $_SESSION['idUser'];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$hospital = $_POST['hospital'];
	$dataAgenda = $_POST['data'];
	$hora = $_POST['hora'];

	// INSERIR AGENDAMENTO NO BANCO DE DADOS
	$sql = "INSERT INTO agenda (hospital, data, hora, id_usuario) VALUES ('$hospital', '$dataAgenda', '$hora', '$id_usuario')";
}
?>

<!DOCTYPE html>
<html lang= "pt-br">
<head>
	<title>AGENDAR</title>
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
	<!-LOGADO NA CONTA, EXIBE MENSAGEM E NOME DO USUARIO E TIPO DE SANGUE->
	<h3 class="cb3">Bem vindo <?php echo $_SESSION['nome']; ?>!!</h3>
	<h3 class="cb3">Tipo sanguíneo: <?php echo $_SESSION['sangue']; ?></h3>

	<p>
		<!-LINK QUE SAI DA CONTA->
		<button id="sair" class="btn btn-danger" onclick="window.location.href='index.php'">Sair da conta</button>
		<button id="voltar_painel" class="btn btn-warning" onclick="window.location.href='painel.php'">Voltar para lista de hospitais</button>
	</p>

</div>
<br>
	<div class="agendamento">
	<img id = "certo" src="img/certo.png" alt="Minha Imagem">
		<h4>
			<?php
			if ($conn->query($sql) === TRUE) {
				$data = date("d/m/Y", strtotime($dataAgenda));
				echo "Agendamento realizado com sucesso no Hospital $hospital, para o dia $data às $hora.";
			} else {
			echo "Erro ao criar agendamento: " . $conn->error;
			}
			?>
		</h4>
	</div>

</body>
</html>