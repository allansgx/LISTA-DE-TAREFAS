<?php
    session_start();
    include_once('config.php');

    // PEGAR O ID (NUMBER)
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    // DELETAR REGISTRO
    $result_usuario = "DELETE FROM controle WHERE id = '$id'";
    $resultado_usuario = mysqli_query($conexao, $result_usuario);
 
    // AVISO SUCESSO/ERRO
    if (mysqli_affected_rows($conexao)) {
        header("Location: task.php");

    }else {
        header("Location: task.php");
    }

?>