<?php
//PROTEÇÃO PARA TENTAR ACESSAR A PAGINA SEM ESTAR LOGADO

if (!isset($_SESSION)) {
	session_start();
}

if (!isset($_SESSION['idUser'])) {
	print "<script>alert('Você não pode acessar esta página porque não está logado.');</script>";
	print "<script>location.href='index.php';</script>";
}

?>