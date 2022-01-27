<?php
session_start();
include_once('config.php');

// PEGAR O ID PELA URL
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// PUXAR INFORMAÇÕES PELO ID
$result_usuario = "SELECT * FROM controle WHERE id = '$id'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <style>
        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: #f3f3f5;
        color: #333;
        font-family: 'Ubuntu', sans-serif;
    }

    /*---------- FORMULÁRIO ----------------------------------------*/

    .container {
        background: #fff;
        max-width: 450px;
        margin-top: 6%;
        margin-left: auto;
        margin-right: auto;
        padding: 12px;
    }

    .header {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 4px;
        margin-bottom: 4px;
    }

    .form {
        margin-top: 4px;
        margin-bottom: 4px;
    }

    .form form {
        display: flex;
        justify-content: center;
        flex-direction: column;
    }

    .form label {
        font-weight: bold;
        margin-top: 4px;
        margin-bottom: 4px;
    }

    .form select {
        margin-top: 4px;
        margin-bottom: 4px;
    }

    .form input {
        height: 32px;
        margin-top: 4px;
        margin-bottom: 4px;
        padding-left: 12px;
        border: 1px solid #999;
        border-radius: 4px;

        transition: background 0.3s;
    }

    .form input:focus {
        background: #f0f0f5;
    }

    .form button {
        background: #2196F3;
        height: 32px;
        border: none;
        border-radius: 4px;
        color: white;
        margin-top: 20px;
        margin-bottom: 4px;

        transition: background 0.3s;
    }

    .form button:hover {
        background: #BBDEFB;
    }

    /*---------- SELECTS ----------------------------------------*/

    #labelPrioridade {
        margin-left: 10px;
    }

    #labelEstado {
        margin-left: 10px;
    }

    .select{
        margin-top: 12px;
        margin-bottom: 4px;
    }

    .selectEstado {
        border:none;
        background-image: linear-gradient(to right, rgb(225, 245, 254), rgb(41, 182, 246));
        flex: 1;
        padding: 0 .2em;
        color: rgb(71, 71, 71);
        font-size: 0.9em;
        font-family: 'Ubuntu', sans-serif;
        border-radius: 10px;
        width: 130px;
        height: 22px;
        font-weight: bold;
    }

    .selectPrioridade { 
        border:none;
        background-image: linear-gradient(to right, rgb(225, 245, 254), rgb(41, 182, 246));
        flex: 1;
        padding: 0 .2em;
        color: rgb(71, 71, 71);
        font-size: 0.9em;
        font-family: 'Ubuntu', sans-serif;
        border-radius: 10px;
        width: 110px;
        height: 23px;
        font-weight: bold;
    }
    
    /*---------- BOTÃO PARA VOLTAR PARA TELA DE CADASTRAR E TAREFAS  ----------------------------------------*/

    #buttonCadastrar {
        color: white;
        background: #7986CB;
        border: none;
        margin-top: 12px;
        padding: 6px;
        border-radius: 2px;
        text-decoration: none;
        margin-left: 155px;

        justify-content: left;

        transition: background 0.3s;
    }

    #buttonCadastrar:hover {
        background: #BBDEFB;
    }

    #buttonTarefa {
        color: white;
        background: #7986CB;
        border: none;
        margin-top: 12px;
        padding: 6px;
        border-radius: 2px;
        text-decoration: none;
        margin-left: 10px;

        justify-content: left;

        transition: background 0.3s;
    }

    #buttonTarefa:hover {
        background: #BBDEFB;
    }

    </style>
</head>
<body>

    <?php
        if(isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset ($_SESSION['msg']);
        }
    ?>

    <div class="container">

        <div class="header">
                <h1>Editar tarefa</h1>
        </div>

        <!--------------- FORMULÁRIO PARA EDITAR TAREFA  ------------------>
        
        <div class="form">
            <form method="POST" action="proc_edit.php">
                <!-- Deixar o ID oculto -->
                <input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">

                <label for="">Nome: </label>
                <input type="text" name="nome" placeholder="Responsável da tarefa" value="<?php echo $row_usuario['nome']; ?>">

                <label for="">Tarefa: </label>
                <input type="text" name="tarefas" placeholder="Edite o nome da sua tarefa" value="<?php echo $row_usuario['tarefas']; ?>">

                <div class="select">
                <label for="estado" id="labelEstado">Estado:</label>
                    <select name="estado" id="estado" class="selectEstado" required>
                        <option selected disabled value="">-Escolha-</option>
                        <option value="Pendente">Pendente</option>
                        <option value="Em andamento">Em andamento</option>
                        <option value="Concluida">Concluída</option>
                    </select>
                
                <label for="prioridade" id="labelPrioridade">Prioridade:</label>
                    <select name="prioridade" id="prioridade" class="selectPrioridade" required>
                        <option selected disabled value="">-Escolha-</option>
                        <option value="Baixa">Baixa</option>
                        <option value="Normal">Normal</option>
                        <option value="Alta">Alta</option>
                    </select>
                </div>
                
                <button type="submit">Enviar</button>

            </form>
        </div>
        <br>
            <a href="index.php" id="buttonCadastrar">Início</a>
            <a href="task.php" id="buttonTarefa">Voltar</a>
    </div>

</body>
</html>