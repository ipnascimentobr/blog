<?php
require '../../config.php';
require '../../src/Usuario.php';
require '../../src/redireciona.php';

$id = $_GET['id'];
$usuario = new Usuario($mysql);
$dadosUsuario = $usuario->encontrarPorId($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;
    $usuario->editar($_POST['id'], $_POST['nome'], $_POST['apelido'], $_POST['email'], $_POST['cpf'], $_POST['senha'], $_POST['admin']);
    redireciona('/blog/admin/usuarios/index.php');
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../../style.css">
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
</head>

<body>
    <div id="container">
        <h1>Editar Usuário</h1>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $dadosUsuario['id'] ?>">
            
            <p>
                <label for="nome">Digite nome do usuário</label>
                <input class="campo-form" type="text" name="nome" id="nome" value="<?= $dadosUsuario['nome'] ?>" />
            </p>
            <p>
                <label for="apelido">Digite o apelido</label>
                <input class="campo-form" type="text" name="apelido" id="apelido" value="<?= $dadosUsuario['apelido'] ?>">
            </p>
            <p>
                <label for="email">Digite e-mail</label>
                <input class="campo-form" type="email" name="email" id="email" value="<?= $dadosUsuario['email'] ?>">
            </p>
            <p>
                <label for="cpf">Digite CPF</label>
                <input class="campo-form" type="text" name="cpf" id="cpf" value="<?= $dadosUsuario['cpf'] ?>">
            </p>
            <p>
                <label for="senha">Digite a senha</label>
                <input class="campo-form" type="password" name="senha" id="senha" value="<?= $dadosUsuario['senha'] ?>">
            </p>
            <p>
                Administrador? <input type="checkbox" name="admin" id="admin" <?= $dadosUsuario['admin'] ? 'checked' : '' ?>>
            </p>
            <p>
                <button class="botao">Salvar Alterações</button>
            </p>
        </form>
    </div>
</body>

</html>
