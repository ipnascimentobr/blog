<?php
require '../../config.php';
require '../../src/Artigo.php';
require '../../src/redireciona.php';
require '../../src/Usuario.php';

$usuario = new Usuario($mysql);
$autenticado = $usuario->onlyUser();

if (!($autenticado)){
    redireciona('/blog/admin/login/login.php');
}

$id = $_GET['id'];
$artigo = new Artigo($mysql);
$dadosArtigo = $artigo->encontrarPorId($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $artigo->editar($_POST['id'], $_POST['titulo'], $_POST['conteudo']);
    redireciona('/blog/admin/artigos/index.php');
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../../style.css">
    <meta charset="UTF-8">
    <title>Editar Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Editar Artigo</h1>
        <form action="" method="post">
            <input type="hidden" name="id" id="id" value="<?= $dadosArtigo['id'] ?>">
            
            <p>
                <label for="titulo">Digite o título do artigo</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" value="<?= $dadosArtigo['titulo'] ?>" />
            </p>
            <p>
                <label for="conteudo">Digite o conteúdo do artigo</label>
                <textarea class="campo-form" name="conteudo" id="conteudo"><?= $dadosArtigo['conteudo'] ?></textarea>
            </p>
            <p>
                <button class="botao">Atualizar Artigo</button>
            </p>
        </form>
    </div>
</body>

</html>
