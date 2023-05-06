<?php

//INCLUDE PARA CONEXÃO DA PAGINA CONFIG.PHP
include('config.php');

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$sangue = $_POST["sangue"];

//CONDICIONAL PARA VALIDAR O NOME
if (validar($nome)) {

	//CONDICIONAL FUNÇÃO VALIDAR A SENHA
	if (senhaValida($senha)) {

		if ($email) {

			//SELECIONA TODOS OS EMAIL PARA VERIFICAÇÃO
			$sql_code2 = "SELECT * FROM usuario WHERE email = '$email' LIMIT 1";
			$sql_query2 = $conn->query($sql_code2) or die("falha na execução do codigo sql: " . $conn->error);

			$quantidade2 = $sql_query2->num_rows;

			//CONDICIONAL PARA INSERIR CADASTRO
			if ($quantidade2 == 0) {

				$sql = "INSERT INTO usuario (nome, email, senha, tip_sangue)
				VALUES ('{$nome}', '{$email}','{$senha}','{$sangue}')";

				$res = $conn->query($sql);

				if ($res==true) {
					print "<script>alert('Cadastro criado com sucesso!!!!');</script>";
					print "<script>location.href='index.php';</script>";
				} else {
					print "<script>alert('Não foi possivel realizar o cadastro');</script>";
					print "<script>location.href='cadastro.php';</script>";
				}
			} else {

				//AVISO CASO O EMAIL DIGITADO JÁ ESTIVER CADASTRADO NO BANCO DE DADOS
				print "<script>alert('Email já cadastrado no sistema, por favor insira um email válido!!!');</script>";
				print "<script>location.href='cadastro.php';</script>";
			}
		}
	}

	//AVISO CASO A SENHA NAO COMBINAR COM OS CARACTERES EXIGIDOS
	print "<script>alert('Senha deve conter no mínimo uma letra e um número!!!');</script>";
	print "<script>location.href='cadastro.php';</script>";
}

//AVISO CASO O NOME NAO COMBINAR COM OS CARACTERES EXIGIDOS
print "<script>alert('Nome não pode conter números ou caracters especiais!!!');</script>";
print "<script>location.href='cadastro.php';</script>";

//FUNÇÃO PARA VALIDAR SENHA COM NUMERO E LETRA
function senhaValida($senha)
{
	return preg_match('/[a-z]/', $senha)// PELO MENOS UMA LETRA MINUSCULA
	&& preg_match('/[0-9]/', $senha); // PELO MENOS UM NÚMERO
}

//FUNÇÃO PARA VALIDAR NOME SEM NUMEROS E CARACTERES ESPECIAIS
function validar($nome)
{
	return !!preg_match('|^[\pL\s]+$|u', $nome);
}


?>