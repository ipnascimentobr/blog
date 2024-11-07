<?php
    require 'layout/header.php';
    require 'config.php';
    require 'src/Artigo.php';
    
    $id = $_GET['id'];

    $objArtigo = new Artigo($mysql);
    $artigo = $objArtigo->encontrarPorId($id);
         
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Meu Blog</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    
    <?php echo $header; ?>
    <div id="container">
        <h1>
            <?php echo $artigo['titulo'] ?>
        </h1>
        <p>
            <?php echo $artigo['conteudo'] ?>
        </p>
        <div>
            <a class="botao botao-block" href="index.php">Voltar</a>
        </div>
    </div>
</body>

</html>