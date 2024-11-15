<?php

require '../../config.php';
require '../../src/Usuario.php';
require '../../src/redireciona.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $usuario = new Usuario($mysql);
    $validar = $usuario->autenticar($_POST['email'],$_POST['senha']);
    
    if($validar){
        redireciona('/blog/admin/index.php');
    }   
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../../style.css">
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <div id="container">
        <h1>Login</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">   
            <p>
                <label for="">digite e-mail</label>
                <input class="campo-form" type="text" name="email" id="email">
            </p>            
            <p>
                <label for="">Digite a senha</label>
                <input  class="campo-form" type="password" name="senha" id="senha">
            </p>
            
            <p>
                <button class="botao">Entrar</button>
            </p>
        </form>
    </div>
</body>

</html>