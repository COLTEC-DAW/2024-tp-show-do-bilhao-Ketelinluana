<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

function carregaPergunta($id) {
    $perguntasFile = 'perguntas.json';
    $perguntasJson = file_get_contents($perguntasFile);
    $perguntas = json_decode($perguntasJson, true);
    return $perguntas[$id] ?? null;
}

$pergunta_id = $_SESSION['pergunta_id'] ?? null;
$pergunta = carregaPergunta($pergunta_id);

if ($pergunta === null) {
    die('Pergunta não encontrada.');
}

// Limpar a sessão para o próximo jogo
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Game Over</title>
    
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
    <h1>Game Over!</h1>
    <p>Você perdeu o jogo.</p>
    <?php if ($pergunta): ?>
        <h2>Pergunta Incorreta</h2>
        <p><?php echo htmlspecialchars($pergunta['enunciado']); ?></p>
        <p>Alternativa correta: <?php echo htmlspecialchars($pergunta['alternativas'][$pergunta['resposta']]); ?></p>
    <?php endif; ?>
    <p><a href="index.php">Voltar ao início</a></p>
</body>
</html>
