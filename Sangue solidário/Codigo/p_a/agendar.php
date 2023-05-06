<?php
//CONEX�O COM O ARQUIVO PROTECT.PHP
include('protect.php');

include('config.php');

$nomeHospital = $_GET['hospital'];

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
		<button id="voltar_painel" class="btn btn-warning" onclick="window.location.href='painel.php'">Voltar</button>
	</p>

</div>
<br>
<div class="agendamento">
	
	<h4 align="center">Você selecionou o agendamento para o <?php echo $nomeHospital; ?>. Agora adicione a data e hora desejadas:</h4>
	<br>
		<form method = "post" action="agendamento.php">
			<fieldset class="field_agenda">
				<input type="hidden" name="hospital" value="<?php echo $nomeHospital; ?>">
				<div class="input-group mb-3">
					<span class="input-group-text" >Data:</span>
					<input type="date" id="data" name="data" required>
				</div>

				<div class="input-group mb-3">
					<span class="input-group-text" >Hora:</span>
					<input type="time" id="hora" name="hora" required>
				</div>
				<br>
				<button class="btn btn-success" onclick="window.location.href='agendamento.php'">Confirmar Agendamento</button>
			</fieldset>
		</form>
</div>


</body>
</html>