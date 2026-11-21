<?php
require_once __DIR__ . '/bootstrap.php';
startDemoSession();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    requirePost();
    if ($_SESSION['carrinho']) {
        $_SESSION['carrinho'] = [];
        $_SESSION['compra_simulada'] = true;
    }
    redirectTo('email.php');
}
if (empty($_SESSION['compra_simulada'])) {
    redirectTo('Carrinho.php');
}
unset($_SESSION['compra_simulada']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Compra simulada | Scoring</title>
    <style>
        body{
            margin: 0;
        }

        *{
            margin: 0;
            padding: 0;
        }

       #idtela{
        min-height: 100vh;
        width: 100vw;
        background-color: black;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        z-index: 1;

       } 

       p{
        font-size: 25pt;
       }

       span{
        font-size:40pt;
       }

    </style>
    <link rel="stylesheet" href="../Estilos/responsivo.css">
</head>
<body class="confirmacao">
    <main id="idtela">
        <div>
            <p>Compra simulada com sucesso!</p>
            <p>Nenhuma cobrança ou mensagem foi enviada.</p>
            <a style="color:white" href="index.php">Voltar ao catálogo</a>
        </div>
    </main>
</body>
</html>
