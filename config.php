<?php
    // CONEXÃO COM BANCO DE DADOS

    $dbHost = 'LocalHost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'controle-tarefa';

    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

?>