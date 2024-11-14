<?php

require '../../config.php';
require '../../src/Usuario.php';
require '../../src/redireciona.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if(is_null($_POST['admin'])){
        $_POST['admin'] = 0;
    }
    $usuario = new Usuario($mysql);
    $usuario->adicionar($_POST['nome'], 
            $_POST['apelido'],$_POST['email'],
            $_POST['cpf'], $_POST['senha'],
            $_POST['admin']);

    redireciona('/blog/admin/usuarios/index.php');
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../../style.css">
    <meta charset="UTF-8">
    <title>Adicionar Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Adicionar Artigo</h1>
        <form action="inserir.php" method="post">
            <p>
                <label for="">Digite nome do usuário</label>
                <input class="campo-form" type="text" name="nome" id="nome" />
            </p>
            <p>
                <label for="">Digite o apelido</label>
                <input class="campo-form" type="text" name="apelido" id="apelido">
            </p>
            <p>
                <label for="">digite e-mail</label>
                <input class="campo-form" type="text" name="email" id="email">
            </p>
            <p>
                <label for="">digite cpf</label>
                <input class="campo-form" type="text" name="cpf" id="cpf">
            </p>
            <p>
                <label for="">Digite a senha</label>
                <input  class="campo-form" type="password" name="senha" id="senha">
            </p>
            <p>
                Administrador? <input type="checkbox" name="admin" id="admin">
            </p>
            <p>
                <button class="botao">Criar Usuário</button>
            </p>
        </form>
    </div>
</body>

</html>