<?php
    require 'layout/header.php';
    require 'artigos.php';
   
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
        
        <h1>Meu Blog</h1>
        <?php foreach($artigos as $index => $artigo): ?>
            <h2>
                <a href="single.php?id=<?php echo $index; ?>">
                    <?php echo $artigo['titulo']; ?>
                </a>
            </h2>
            <p>
                <?php echo $artigo['conteudo'];?>
            </p>
        <?php endforeach; ?>
        
    </div>
</body>

</html>