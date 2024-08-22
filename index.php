<?php
session_start();

if (isset($_SESSION['user'])) {
    header('Location: perguntas.php?id=0');
    exit();
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
        .container {
            text-align: center;
            margin-top: 200px; 
        }
        .link {
            text-decoration: none;
            color: #fff; 
            background-color:black; 
            padding: 20px 50px; 
            border-radius: 5px; 
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size: 18px; 
            display: inline-block;
            margin-top: 20px;
            transition: background-color 0.3s, transform 0.3s; 
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="https://media.semprefamilia.com.br/semprefamilia/2017/10/maxresdefault-30415812.jpg" alt="Imagem do Show do Bilhão" width="200" height="100">
        <h1>Show do Bilhão</h1>
    </div>
    <div class="container">
        <p><a href="login.php" class="link">Iniciar o jogo</a></p>
    </div>
</body>
</html>

