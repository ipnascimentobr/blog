<?php
//session_start();
//var_dump($_SESSION['usuario_id']);
require '../config.php';
require '../src/Usuario.php';
require '../src/redireciona.php';

$usuario = new Usuario($mysql);
$autenticado = $usuario->onlyUser();

if (!($autenticado)){
    redireciona('/blog/admin/login/login.php');
}

if($_SERVER['REQUEST_METHOD']==='POST'){
    if ($_POST['logout']== 1){
        $usuario->logout();
        redireciona('/blog/index.php');
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../asset/css/dashboard.css">
</head>

<body>
    <div class="dashboard-container">
        <h1>Painel de Controle</h1>
        
        <a href="/blog/admin/usuarios/index.php" class="dashboard-button">Usuários</a>
        <a href="/blog/admin/artigos/index.php" class="dashboard-button">Artigos</a>
        
        <form action="index.php" method="post">
            <input type="text" name="logout" id="logout" value="1">
            <button class="botao">Logout</button>
        </form>

    </div>
</body>

</html>
