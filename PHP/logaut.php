<?php
require_once __DIR__ . '/bootstrap.php';
startDemoSession();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    requirePost();
    unset($_SESSION['usuario_id']);
    session_regenerate_id(true);
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
    redirectTo('index.php');
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sair | Scoring</title>
    <link rel="stylesheet" href="../Estilos/estilos_index/style.css">
    <link rel="stylesheet" href="../Estilos/responsivo.css">
</head>
<body class="sair">
    <main style="padding: 2rem">
        <h1>Sair da conta demonstrativa?</h1>
        <form method="post">
            <?= csrfField() ?>
            <button>Sair</button>
        </form>
        <a href="index.php">Voltar ao catálogo</a>
    </main>
</body>
</html>
