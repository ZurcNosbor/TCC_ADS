<?php
//PAGINA PARA DESLOGAR DO SISTEMA

if (!isset($_SESSION)) {
	session_start();
}

session_destroy();


//ENVIAR USUSARIO PARA PAGINA INICIAL
header("location: index.php")
?>