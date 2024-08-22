<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

function carregaPergunta($id) {
    $perguntasFile = 'perguntas.json';
    if (!file_exists($perguntasFile)) {
        die('Arquivo de perguntas não encontrado.');
    }
    $perguntasJson = file_get_contents($perguntasFile);
    $perguntas = json_decode($perguntasJson, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        die('Erro ao decodificar JSON: ' . json_last_error_msg());
    }

    return $perguntas[$id] ?? null;
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$pergunta = carregaPergunta($id);

if ($pergunta === null) {
    die('Você ganhou !!');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $respostaEscolhida = (int)$_POST['resposta'];
    $_SESSION['pergunta_id'] = $id;  // Armazenar o ID da pergunta na sessão

    if ($respostaEscolhida === $pergunta['resposta']) {
        $id++;
        header('Location: perguntas.php?id=' . $id);
        exit();
    } else {
        header('Location: gameover.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pergunta</title>
    
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
    <h1><?php echo htmlspecialchars($pergunta['enunciado']); ?></h1>
    <form method="post">
        <?php foreach ($pergunta['alternativas'] as $index => $alternativa): ?>
            <input type="radio" name="resposta" value="<?php echo $index; ?>" required>
            <?php echo htmlspecialchars($alternativa); ?><br>
        <?php endforeach; ?>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
