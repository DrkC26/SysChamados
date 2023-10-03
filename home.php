<?php
// inclui a página "conexao.php" para utilização das variáveis das mesmas
include('conexao.php');
?>

<body>

    <header>
        <img class="logo" src="images/logoWhite.png">
        <!-- echo que retorna pro usuário qual é o usuário que está logado. -->
        <?php echo "<br><p>Você logou como: <u>" . $_SESSION['login'] . "</u></p>"; ?>
        <?php echo '<h3><a id="ahome" href="?logout">Sair</a></h3>' ?>
    </header>

    <h2 style="text-align:center;color:#ffff;"></h2>
    <!-- formulário para enviar o chamado -->
    <div class="painelchamados">
        <h3>Abrir chamado para o TI:</h3><br>
        <form method="post">
            <p>Problema:*</p>
            <textarea style="height:50px;" class="inputchamado" type="text" name="problema" placeholder="Digite seu problema." required></textarea><br>
            <p>Nome:*</p>
            <input class="inputchamado" type="text" name="nome" placeholder="Digite seu nome." required><br>
            <p>Comentário:</p>
            <textarea class="inputchamado" type="text" name="comentario" placeholder="Digite seu comentário (opcional)."></textarea><br>
            <input class="submit" name="acao" type="submit">
        </form><br>
        <p style="text-align: center;font-size:14px;">Legenda: os campos que contém * são obrigatórios!</p>
    </div>
    <!-- end formulário -->

    <footer>
        <p>Developed by &copy;Bruno Collange - V4</p>
    </footer>

</body>



</html>