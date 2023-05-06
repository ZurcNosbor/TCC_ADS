<?php

//CONEXÃO COM O ARQUIVO PROTECT.PHP
include('protect.php');
include('config.php');

if(!empty($_GET['id_agenda'])){

    $id_agenda = $_GET['id_agenda'];
    echo "ID da agenda a ser excluída: " . $id_agenda;

    $sqlSelect = "SELECT * FROM agenda WHERE id_agenda = $id_agenda";
    $resultado = $conn-> query($sqlSelect);

    if($resultado->num_rows > 0){
        $sqlDelete = "DELETE FROM agenda WHERE id_agenda = $id_agenda";
        $resultadoDelete = $conn->query($sqlDelete);
    }
}

header('Location: lista.php');

?>