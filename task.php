
<?php
session_start();
include_once('config.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;1,500&display=swap" rel="stylesheet">
    <title>Tarefas</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background: #f3f3f5;
            color: #333;
            font-family: 'Ubuntu', sans-serif;
        }
        
        /*----------- TÍTULO -----------------------------------*/

        .header {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 4px;
            margin-bottom: 14px;
        }

        /*---------- LINHA PARA SEPARAR -----------------------------------*/

        .separator {
            background: #bbb;
            height: 2px;
            border-radius: 1px;
            width: 70%;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 12px;
        }

        /*------------------------------------------------------------------*/

        .container {
            background: #fff;
            max-width: 850px;
            margin-top: 5%;
            margin-left: auto;
            margin-right: auto;
            padding: 12px;
        }

        /*---------- VOLTAR PARA A TELA DE CADASTRO ----------------------------------------*/

        #back {
            color: white;
            background: #7986CB;
            border: none;
            padding: 6px;
            border-radius: 2px;
            text-decoration: none;

            transition: background 0.3s;
        }

        #back:hover {
            background: #BBDEFB;
        }

        /*---------- BOTÃO DELETE E EDIT ----------------------------------------*/

        #buttonDelete{
            color: white;
            background: rgba(229, 57, 53, 0.8);
            border: none;
            padding: 3px;
            border-radius: 2px;
            text-decoration: none;

            justify-content: left;

            transition: background 0.3s; 
        }

        #buttonDelete:hover {
            background: rgba(229, 57, 53, 0.5);
        }

        #buttonEdit {
            color: white;
            background: rgba(120, 144, 156, 0.8);
            border: none;
            padding: 3px;
            border-radius: 2px;
            text-decoration: none;
            margin-right: 4px;

            justify-content: left;

            transition: background 0.3s; 
        }

        #buttonEdit:hover {
            background: rgba(120, 144, 156, 0.5);
        }

        /*---------- BLOCO DAS TAREFAS ----------------------------------------*/

        td {
            padding: 6px;
            width: 800px;

        }
        
        table {
            margin-left: auto;
            margin-right: auto;
            max-width: auto;
            margin-bottom: 12px;
        }

        .trTitle {
            background-image: linear-gradient(to right, rgb(225, 245, 254), rgb(41, 182, 246));
            border: solid;
        }

        .trResult {
            background-image: linear-gradient(to right, rgb(225, 245, 254), rgb(179, 229, 252));
            border: solid;
        }

        .trResult p {
            margin-left: 80%;
            font-size: 12px;
        }

        .tdButton {
            background: white;
        }
        
    </style>
</head>
<body>
    <div class="container">

        <div class="header">
            <h1>Tarefas</h1>
        </div>
        <div class="separator"></div>
    
        <div class="table">

        <table>
             <!-- SELECIONAR DO BANCO DE DADOS PARA APARECER NA TELA  -->
            <?php 
                $sql = "SELECT id, nome, tarefas, estado, prioridade FROM controle order by prioridade";
                $result = $conexao->query($sql);

                if ($result->num_rows > 0) {
                // Saída de cada linha da tabela
                while($linha = $result->fetch_assoc()) { ?>

             <!----------------- MOSTRAR TAREFAS ------------------------->
            <tr class="trResult">
                <td><b>Nome:</b> <?php echo $linha['nome'], '<br>';?>
                    <b>Tarefa:</b> <?php echo $linha['tarefas'];?>
                    <p><b>Estado:</b> <?php echo $linha['estado'], '<br>';?></p>
                    <p><b>Prioridade:</b> <?php echo $linha['prioridade'], '<br>';?></p>
                    
                    <a href=""><?php echo "<a id='buttonEdit' href='edit.php?id=".$linha['id']."'>Alterar</a>";?></a>
                    <a href=""><?php echo "<a id='buttonDelete' href='delete.php?id=".$linha['id']."' onclick=\"return confirm('Tem certeza que deseja deletar essa tarefa?');\">Deletar</a>";?></a>
                </td>
            </tr>
            
            <?php }} ?>
        </table>

        <br>
        <a href="index.php" id="back">Voltar</a>

        </div>

    </div>

</body>
</html>