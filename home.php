<?php
include('conexao.php');
include('chat.php');
$consultachat = "SELECT * FROM chat";
$conchat = $mysqli->query($consultachat) or die ($mysqli->error);
?>


<header>
        <?php 
         echo"<br><p>Você logou como: <u>".$_SESSION['login']."</u></p>";
         echo'<h3><a href="?logout">Sair</a></h3>'
        ?>
</header>



<body>
    
    <h2 style="text-align:center;margin: 1%;">Abra um chamado caso esteja com problemas:</h2>
    <div class="painelchamados">

        <h3>Soluções de problemas frequentes:</h3><br>
        <p>- Reinicie o dispositivo;</p>
        <p>- Verifique se todos os cabos estão conectados corretamente.</p><br>
        <h3>Nenhuma dessas soluções te ajudou? Abra um chamado para o TI:</h3><br>
            <form method="post">
                <input style="height:50px;" class="inputchamado" type="text" name="problema" placeholder="Digite seu problema (detalhadamente)*"required ><br>
                <input class="inputchamado"type="text" name="nome" placeholder="Digite seu nome*" required><br> 
                <input class="inputchamado"type="text" name="comentario" placeholder="Comentário (opcional)"><br>
                <input class="submit" name="acao" type="submit">
            </form>
           
    </div>

    <div class="chat">
        <h3>Após enviar o chamado, atualize a página depois de um breve tempo para ver se há novas mensagens: <a class="btn btn-warning" href="index.php">Atualizar</a></h3><br>
        <?php while($dadochat = $conchat->fetch_array()) { ?>
        <h1><?php echo '<h5 class="msg">T.I para '.$dadochat["mensagem"];'</h5>'?></h1>
        <?php } ?>
        </div>

        <div class="download">
            <p>Baixe o manual do usuário para aprender utilizar o sistema:  <a class="btn btn-success" href="manualUser.pdf" download>Baixar</a></p>
        </div>

</body>

<footer class="homefooter">
    <h3 style="color:white;text-shadow: 0.1em 0.1em 0.1em black;">Se necessário, entre em contato com o TI:</h3>
    <a href="https://join.skype.com/invite/iIlPiMyjVZ22"><img src="images/skypeicon.png"></a>
    <a href="tel:+5511944535088"><img src="images/telicon.png"></a>
    <p>Developed by &copy;Bruno Collange - Version 21112022</p>
</footer>

</html>
