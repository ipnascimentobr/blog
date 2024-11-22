<?php

require '../../config.php';
include '../../src/Artigo.php';
require '../../src/Usuario.php';
require '../../src/redireciona.php';

$usuario = new Usuario($mysql);
$autenticado = $usuario->onlyUser();

if (!($autenticado)){
    redireciona('/blog/admin/login/login.php');
}

$artigo = new Artigo($mysql);
$artigos = $artigo->exibirTodos();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Página administrativa</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../style.css">
</head>

<body>
    <div id="container">
        <h1>Página Administrativa</h1>
        <div>
            <?php foreach ($artigos as $art) { ?>
            <div id="artigo-admin">
                <p><?php echo $art['titulo']; ?></p>
                <nav>
                    <a class="botao" href="editar.php?id=<?php echo $art['id']; ?>">Editar</a>
                    <a class="botao" href="delete.php?id=<?php echo $art['id']; ?>">Excluir</a>
                </nav>
            </div>
            <?php } ?>
        </div>
        <a class="botao botao-block" href="inserir.php">Adicionar Artigo</a>
        <a class="botao botao-block" href="../index.php">Voltar</a>
        
    </div>
</body>

</html>