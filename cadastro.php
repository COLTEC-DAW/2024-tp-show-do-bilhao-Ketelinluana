<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $usuarios = json_decode(file_get_contents('usuarios.json'), true);
    $usuarios[] = [
        'nome' => $nome,
        'email' => $email,
        'login' => $login,
        'senha' => password_hash($senha, PASSWORD_DEFAULT)
    ];
    
    file_put_contents('usuarios.json', json_encode($usuarios, JSON_PRETTY_PRINT));
    echo "Cadastro realizado com sucesso!";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    
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
</head>
<body>
    <h1>Cadastro de Usuário</h1>
    <form action="cadastro.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required><br>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
