<?php
session_start();
include_once('config.php');

// PUXAR TODAS AS VÁRIAVEIS
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$tarefas = filter_input(INPUT_POST, 'tarefas', FILTER_SANITIZE_STRING);
$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
$prioridade = filter_input(INPUT_POST, 'prioridade', FILTER_SANITIZE_STRING);

// ATUALIZAR NO BANCO
$result_usuario = "UPDATE controle SET nome = '$nome', tarefas = '$tarefas', estado = '$estado', prioridade = '$prioridade' WHERE id = '$id' ";
$resultado_usuario = mysqli_query($conexao, $result_usuario);

// TESTAR SE AFETOU ALGUMA LINHA
if(mysqli_affected_rows($conexao)) {
    // $_SESSION['msg'] = "<p style='color:green;'>Tarefa alterada com sucesso.</p>";
    header("Location: edit.php");
}else{
    // $_SESSION['msg'] = "<p style='color:red;' >Não foi possível editar a tarefa.</p>";
    header("Location: edit.php?id=$id");
}

?>
