<?php

    // INSERIR NO BANCO DE DADOS
    if(isset($_POST['submit']))
    {
       include_once('config.php');

       $nome = $_POST['nome'];
       $tarefas = $_POST['tarefas'];
       $estado = $_POST['estado'];
       $prioridade = $_POST['prioridade'];
       
       $result = mysqli_query($conexao, "INSERT INTO controle(nome, tarefas, estado, prioridade) VALUES ('$nome','$tarefas','$estado','$prioridade')");
       header("Location: index.php");
    }
    
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;1,500&display=swap" rel="stylesheet">
    <title>Controle de Tarefas</title>
    <style>
        /* ESTAVA BUGADO NO STYLE.CSS, POR ESSE MOTIVO BOTEI AQUI */
        #back {
            color: white;
            background: #7986CB;
            border: none;
            margin-top: 12px;
            padding: 6px;
            border-radius: 2px;
            text-decoration: none;
            text-align: center;

            transition: background 0.3s;
        }

        #back:hover {
            background: #BBDEFB;
        }

    </style>
</head>
<body>
    
    <div class="container">

        <div class="header">
            <h1>Controle de Tarefas</h1>
        </div>

        <div class="form">
            <form action="index.php" method="POST">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" placeholder="(Opcional)">
                
                <label for="tarefas">Tarefa:</label>
                <input type="text" name="tarefas" id="tarefas" placeholder="Nome da Tarefa" required>
                
                <div class="select">
                    <label for="estado" id="labelEstado">Estado:</label>
                    <select name="estado" id="estado" class="selectEstado" required>
                        <option selected disabled value="">-Escolha-</option>
                        <option value="Pendente">Pendente</option>
                        <option value="Em andamento">Em andamento</option>
                        <option value="Concluída">Concluída</option>
                    </select>

                    <label for="prioridade" id="labelPrioridade">Prioridade:</label>
                    <select name="prioridade" id="prioridade" class="selectPrioridade" required>
                        <option selected disabled value="">-Escolha-</option>
                        <option value="Baixa">Baixa</option>
                        <option value="Normal">Normal</option>
                        <option value="Alta">Alta</option>
                    </select>
                </div>

                <button type="submit" name="submit" id="submit">Concluir</button>
                <a href="task.php" id="back">Tarefas</a>

                </form>
        </div>

        <div class="separator"></div>

        <div class="footer">
            <p>Desenvolvido por Allan S.G</p>
        </div>

    </div>


</body>
</html>