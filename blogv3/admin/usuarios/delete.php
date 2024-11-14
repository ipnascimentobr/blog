<?php

require '../../config.php';
include '../../src/Usuario.php';
require '../../src/redireciona.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = new Usuario($mysql);
    $usuario->remover($_POST['id']);

    redireciona('/blog/admin/usuarios/index.php');
}


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../../style.css">
    <meta charset="UTF-8">
    <title>Excluir Usuário</title>
</head>

<body>
    <div id="container">
        <h1>Você realmente deseja excluir o artigo?</h1>
        <form method="post" action="delete.php">
            <p>
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
                <button class="botao">Excluir</button>
            </p>
        </form>
    </div>
</body>

</html>