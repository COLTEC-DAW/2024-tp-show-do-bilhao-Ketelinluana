<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $usuarios = json_decode(file_get_contents('usuarios.json'), true);

    foreach ($usuarios as $usuario) {
        if ($usuario['login'] === $login && password_verify($senha, $usuario['senha'])) {
            $_SESSION['user'] = $usuario;
            header('Location: perguntas.php?id=0');
            exit();
        }
    }
    $erro = "Login ou senha incorretos.";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Show do Bilhão</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0; 
        }
        .header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            color:black; 
            padding: 10px;
        }
        .header img {
            margin-right: 15px;
        }
        .header h1 {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="https://media.semprefamilia.com.br/semprefamilia/2017/10/maxresdefault-30415812.jpg" alt="Imagem do Show do Bilhão" width="200" height="100">
        <h1>Show do Bilhão</h1>
    </div>
</body>
</html>


<body>
    <h1>Login</h1>
    <?php if (isset($erro)) echo "<p>$erro</p>"; ?>
    <form action="login.php" method="post">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required><br>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br>
        <input type="submit" value="Login">
    </form>
    <p><a href="cadastro.php">Criar uma conta</a></p>
</body>
</html>


