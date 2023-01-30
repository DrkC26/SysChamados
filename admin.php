<?php
include ('conexao.php');
include('chat.php');
$consulta = "SELECT * FROM chamados";
$consulta_r = "SELECT * FROM resolvidos ORDER BY id DESC";
$con = $mysqli->query($consulta) or die ($mysqli->error);
$con_r = $mysqli->query($consulta_r) or die ($mysqli->error);
$consultachat = "SELECT * FROM chat";
$conchat = $mysqli->query($consultachat) or die ($mysqli->error);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Chamados</title>
</head>

<header style="background-image: radial-gradient(circle, #d3cfcf, #999797, #646262, #333232, #000000);border:2px solid black;text-align: center;">
<h1 class="text-warning">Sistema de chamados</h1>
<p class>Developed by &copy;Bruno Collange - Version 21112022</p>
</header>

<br>
<body style="background-image: radial-gradient(circle, #0074a6, #075686, #083a66, #042047, #020029);">
<div class="painelc" style="width:90%;margin:0 auto;">
<div class="container text-center" style="width:50%;margin:0 auto; border-radius:5px;">
    <h2 style="-webkit-box-shadow: 0px -3px 47px 3px rgba(255,255,255,1);
-moz-box-shadow: 0px -3px 47px 3px rgba(255,255,255,1);
box-shadow: 0px -3px 47px 3px rgba(255,255,255,1);background-image: linear-gradient(to right top, #4200ff, #6a3dff, #8761ff, #a181ff, #b8a0ff);padding:5px;color:black;">Painel Chamados</h2>
</div> <br>

    <div class="container text-center">
        <h4 style="background-image: linear-gradient(to right top, #ff2828, #de1e1e, #be1414, #9f090a, #810000);color:#FFDAB9;border-radius:5px">Em aberto:</h4>
    </div>
    <table class="table table-bordered border-primary" style="margin:0 auto;">
    <tr style="background-image: linear-gradient(to right, #94befd, #69a3ff, #3d87ff, #0b68ff, #0043ff);border:1px solid black">
             <td>Problema</td>
             <td>Setor</td>
             <td>Nome</td>
             <td>Comentário</td>
             <td>Data e Hora do Registro</td>
             <td>Status</td>
        </tr>
    <?php while($dado = $con->fetch_array()) 
    {?>
        <tr style="background-image: radial-gradient(circle, #ff8181, #ff6b68, #ff534c, #ff372e, #ff0000); border:1px solid black;color:white">
            <td><?php echo $dado["problema"];?></td>
            <td><?php echo $dado["setor"];?></td>
            <td><?php echo $dado["nome"];?></td>
            <td><?php echo $dado["comentario"];?></td>            
            <td><?php echo  date('d/m/Y H:i:s', strtotime($dado["momento_registro"]));?></td>
           
            <td>
            <form method="POST">
                <input style="background:transparent;width:100%;border:none;" class="text-warning p-2" type="submit" name="change" value="Mover para resolvidos"></input>

            </form>
            </td>
        </tr>
          
    <?php 
    
    if (isset($_POST['change'])) {
        $sql = $mysqli->prepare("INSERT INTO `resolvidos` VALUES (null,?,?,?,?,?)");
        $sql->execute(array($dado["problema"],$dado["setor"],$dado["nome"],$dado["comentario"],$dado["momento_registro"]));  
    }if(isset($_POST['change'])){
        $sql = $mysqli->prepare("DELETE FROM chamados WHERE numb = 1");
        $sql->execute();
    }
}     
    ?>
    </table>

    <div class="container text-center"><br>
        <h4 style="background-image: linear-gradient(to right top, #18b900, #29ca36, #37dc56, #45ed73, #54ff8f);color:#228B22;padding:3px;border-radius:5px;">Resolvidos:</h4>
    </div>
    <table class="table table-bordered border-primary" style="margin:0 auto;">
        <tr style="background-image: linear-gradient(to right, #94befd, #69a3ff, #3d87ff, #0b68ff, #0043ff);border:1px solid black">
             <td>Problema</td>
             <td>Setor</td>
             <td>Nome</td>
             <td>Comentário</td>
             <td>Data e Hora do Registro</td>
        </tr>
    <?php while($dado = $con_r->fetch_array()) { ?>
        <tr style="background-image: radial-gradient(circle, #e5e5e5, #cacbca, #b1b1b1, #979797, #7f7f7f);border:1px solid black">
            <td style=""><?php echo $dado["problema_r"];?></td>
            <td><?php echo $dado["setor_r"];?></td>
            <td><?php echo $dado["nome_r"];?></td>
            <td><?php echo $dado["comentario_r"];?></td> 
            <td><?php echo  date('d/m/Y H:i:s', strtotime($dado["momento_registro_r"]));?></td>
        </tr>
        
    <?php
} ?>
    </table>
</div>

<!-- CHAT -->
<div class="p-3 mb-2 text-white border border-light" style="-webkit-box-shadow: -1px 1px 47px 8px rgba(255,255,255,1);
-moz-box-shadow: -1px 1px 47px 8px rgba(255,255,255,1);
box-shadow: -1px 1px 47px 8px rgba(255,255,255,1);background-image: linear-gradient(to top, #94befd, #6596f1, #3e6de0, #2342ca, #1e00ae);max-height:500px;border-radius:15px;width:50%; margin:40px auto;">
        <h3 class="p-3 mb-2 text-success" style="background-image: radial-gradient(circle, #e5e5e5, #cacbca, #b1b1b1, #979797, #7f7f7f);border-radius:6px;text-align:center;"><b>Chat</b></h3>
        <h5 style="text-align:center;"><span class="text-danger"><b>AVISO:</b></span>Para usar o sistema de chat, utilize a seguinte formatação: <p class="text-warning">Destinatário: mensagem</p></h5>
        <form class="container text-center" method="post">
            <input  class="form-control"type="text" name="mensagem" placeholder="Digite sua mensagem"required>
            <input class="d-grid gap-2 col-6 mx-auto btn btn-success border border-dark"  name="acaochat" type="submit" placeholder="Enviar"  style="margin-top:6px;width:30%;">           
        <br>
        </form>
            <?php while($dadochat = $conchat->fetch_array()) { ?>
        <h1><?php echo '<h5 class="msg text-dark">T.I para '.$dadochat["mensagem"];'</h5>'?></h1>
        <?php } ?>
        
        <a style="width: 100%;" class="border border-dark  mx-auto btn btn-primary btn btn-warning" href="admin.php">Atualizar</a>
            <form method="POST"><br>
                <input style="width: 100%;" class="border border-dark btn btn-primary btn btn-danger" type="submit" name="remove" value="Remover todas as mensagens"></input>
            </form>
    </div>
<!-- END CHAT -->

    <?php

$sql = "SELECT * from chamados";

if ($result = mysqli_query($mysqli, $sql)) {
    $rowcount = mysqli_num_rows( $result );
    // Display result
    if($rowcount !== 0){
        echo 
        '<audio id="audio" autoplay controls>
        <source src="som.mp3" type="audio/mp3">
        </audio>';
    }
 }
 
 if(isset($_POST['remove'])){
    $sql = $mysqli->prepare("DELETE FROM chat WHERE numb = 1");
    $sql->execute();
}
    ?>

        <div class="download">
            <p>Baixe o manual do técnico para aprender utilizar o sistema:  <a class="btn btn-success" href="manualTec.pdf" download>Baixar</a></p>
        </div>

</body>
</html>
