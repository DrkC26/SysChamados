<?php
// inicia sessão
session_start();
// inclui a página "conexao.php" e "users.php" para utilização das variáveis das mesmas
include('conexao.php');
include('users.php');
// variáveis que consultam o bd para poder mostrar visualmente para o usuário na página admin
$consulta = "SELECT * FROM chamados";
$consulta_r = "SELECT * FROM resolvidos ORDER BY id DESC";
//query da consulta ao bd
$con = $mysqli->query($consulta) or die($mysqli->error);
$con_r = $mysqli->query($consulta_r) or die($mysqli->error);

// condição para que nenhum usuário além do "master", entre na página "admin"
if ($_SESSION['login'] != $login_master) {
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- tag para favicon -->
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Chamados</title>
</head>

<body class="p-3 mb-2 text-white">

    <!-- Header -->
    <header>
        <img class="logo" src="images/logoWhite.png">
        <a href="index.php" class="btn btn-primary btnadmin">Home</a>
        <a href="admin.php" class="btn btn-primary btnadmin">Atualizar</a>
    </header>
    <!-- END Header -->

    <h1 class="text-center">Painel Chamados</h1>

    <h4 class="text-center bg-danger rounded">Em aberto:</h4>

    <!-- Tabela "chamados" do bd -->
    <table class="table table-bordered border-primary" style="margin:0 auto;">
        <tr style="text-align: center;">
            <td class="border border, p-3 mb-2 bg-primary text-white">Problema</td>
            <td class="border border, p-3 mb-2 bg-primary text-white">Setor</td>
            <td class="border border, p-3 mb-2 bg-primary text-white">Nome</td>
            <td class="border border, p-3 mb-2 bg-primary text-white">Comentário</td>
            <td class="border border, p-3 mb-2 bg-primary text-white">Data e Hora do Registro</td>
        </tr>
        <?php while ($dado = $con->fetch_array()) { ?> <!-- while da consulta e definição da variável "$dado" -->

            <tr>
                <td class="p-3 mb-2 bg-danger text-white"><?php echo $dado["problema"]; ?></td>
                <td class="p-3 mb-2 bg-danger text-white"><?php echo $dado["setor"]; ?></td>
                <td class="p-3 mb-2 bg-danger text-white"><?php echo $dado["nome"]; ?></td>
                <td class="p-3 mb-2 bg-danger text-white"><?php echo $dado["comentario"]; ?></td>
                <td class="p-3 mb-2 bg-danger text-white"><?php echo  date('d/m/Y H:i:s', strtotime($dado["momento_registro"])); ?></td>
            </tr>
            <!-- End Tabela "chamados" do bd -->
        <?php
            // condição que "recorta" e "cola" todo o conteúdo da tabela "chamados" na tabela "resolvidos".

            // a condição só é valida quando o usuário clica no botão "mover tudo para resolvidos",
            // que é uma variável do metodo $_POST.
            if (isset($_POST['change'])) {
                $sql = $mysqli->prepare("INSERT INTO `resolvidos` VALUES (null,?,?,?,?,?)");
                $sql->execute(array($dado["problema"], $dado["setor"], $dado["nome"], $dado["comentario"], $dado["momento_registro"]));
                $sql = $mysqli->prepare("DELETE FROM chamados WHERE numb = 1");
                $sql->execute();
            }
        }
        ?>
    </table><br>

    <div class="resolvidos">
        <form method="POST">
            <a href="admin.php"><input class="btn btn-primary" type="submit" name="change" value="Mover tudo para Resolvidos"></input></a>
        </form>
    </div><br>

    <!-- tabela "resolvidos" -->
    <h4 class="text-center bg-info rounded">Resolvidos:</h4>

    <table class="table table-bordered border-primary" style="margin:0 auto;">
        <tr style="text-align: center;">
            <td class="border border, p-3 mb-2 bg-primary text-white">Problema</td>
            <td class="border border, p-3 mb-2 bg-primary text-white">Setor</td>
            <td class="border border, p-3 mb-2 bg-primary text-white">Nome</td>
            <td class="border border, p-3 mb-2 bg-primary text-white">Comentário</td>
            <td class="border border, p-3 mb-2 bg-primary text-white">Data e Hora do Registro</td>
        </tr>
        <?php while ($dado = $con_r->fetch_array()) { ?>
            <tr>
                <td class="text-bg-secondary p-3"><?php echo $dado["problema_r"]; ?></td>
                <td class="text-bg-secondary p-3"><?php echo $dado["setor_r"]; ?></td>
                <td class="text-bg-secondary p-3"><?php echo $dado["nome_r"]; ?></td>
                <td class="text-bg-secondary p-3"><?php echo $dado["comentario_r"]; ?></td>
                <td class="text-bg-secondary p-3"><?php echo  date('d/m/Y H:i:s', strtotime($dado["momento_registro_r"])); ?></td>
            </tr>

        <?php
        } ?>
    </table><br>
    <!-- end tabela "resolvidos" -->
    <?php

    // variável sql que seleciona TUDO da tabela "chamados"
    $sql = "SELECT * from chamados";

    // Condição que verifica se existe chamado em aberto e reproduz um "som" (som.mp3).
    if ($result = mysqli_query($mysqli, $sql)) {
        $rowcount = mysqli_num_rows($result);
        // Display result
        if ($rowcount !== 0) {
            echo
            '<audio id="audio" autoplay controls>
        <source src="som.mp3" type="audio/mp3">
        </audio>';
        }
    }
    ?>

    <footer>
        <p>Developed by &copy;Bruno Collange - V4</p>
    </footer>

</body>

</html>