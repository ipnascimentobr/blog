<?php

require '../../config.php';
include '../../src/Usuario.php';
require '../../src/redireciona.php';

$usuario = new Usuario($mysql);
$autenticado = $usuario->onlyUser();

if (!($autenticado)){
    redireciona('/blog/admin/login/login.php');
}

$usuario = new Usuario($mysql);
$usuarios = $usuario->exibirTodos();

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
        <h1>Página Administrativa Usuários</h1>
        <div>
            <?php foreach ($usuarios as $usuario) { ?>
            <div id="artigo-admin">
                <p><?php echo $usuario['nome']; ?></p>
                <p><?php echo $usuario['apelido']; ?></p>
                <p><?php echo $usuario['email']; ?></p>
                <nav>
                    <a class="botao" href="editar.php?id=<?php echo $usuario['id']; ?>">Editar</a>
                    <a class="botao" href="delete.php?id=<?php echo $usuario['id']; ?>">Excluir</a>
                </nav>
            </div>
            <?php } ?>
        </div>
        <a class="botao botao-block" href="inserir.php">Adicionar Usuários</a>
        <a class="botao botao-block" href="../index.php">Voltar</a>
        
    </div>
</body>

</html>