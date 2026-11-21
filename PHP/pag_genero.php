<?php
require_once "conexao_bd.php";
$produtos = new Produto;
$genero = $_GET['genero'] ?? '';
if (!in_array($genero, ['Acao e Aventura', 'Esportes', 'Indie', 'Luta', 'RPG', 'Terror'], true)) {
    http_response_code(404);
    exit('Categoria não encontrada.');
}

$jogos = $produtos->mostrarGenero($genero);
$qtdJogos = count($jogos);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilos/estilos_genero/style_genero.css">
    <title>Gênero</title>
    <style>

    </style>
    <link rel="stylesheet" href="../Estilos/responsivo.css">
</head>

<body class="genero">


    <div class="container">
        <a class="voltar-catalogo" href="index.php">Voltar ao catálogo</a>
        <div class="image">
            <?php
            if ($genero == "Terror") {
                echo "<img src='../assets/imagem_genero/imagens_header/Terror.png' style='width:49vw; margin-left: 8vw'>";
            } else if ($genero == "Acao e Aventura") {
                echo "<img src='../assets/imagem_genero/imagens_header/Acao.png' style='width:40vw; margin-left: 17vw'>";
            } else if ($genero == "Esportes") {
                echo "<img src='../assets/imagem_genero/imagens_header/Esporte.png' style='width:40vw; margin-left: 18vw; margin-bottom:10vh'>";
            } else if ($genero == "Indie") {
                echo "<img src='../assets/imagem_genero/imagens_header/Indie.png' style='width:40vw; margin-left: 25vw'>";
            } else if ($genero == "Luta") {
                echo "<img src='../assets/imagem_genero/imagens_header/Luta.png' style='width:35vw; margin-left: 20vw; margin-bottom:10vh'>";
            } else if ($genero == "RPG") {
                echo "<img src='../assets/imagem_genero/imagens_header/Rpg.png' style='width:25vw; margin-left: 30vw'>";
            }
            ?>
            <!-- <img src="../assets/imagem_genero/imagens_header/Terror.png"> -->
        </div>

        <div class="header-genero">
            <?php
            if ($genero == "Acao e Aventura") {
                echo "<h1>ACAO</h1>";
            } else {
                echo "<h1>" . e($genero) . "</h1>";
            }
            ?>
            <!-- <h1>Terror</h1> -->
        </div>



        <section class="product" id="container">

            <div class="product-category">
                <h4>Confira os títulos</h4>
            </div>
            <button class="pre-btn"><img src="../assets/imagem_genero/arrow.png" alt="seta"> </button>
            <button class="nxt-btn"><img src="../assets/imagem_genero/arrow2.png" alt="seta"> </button>
            <?php if (!$jogos): ?>
                <p class="genero-vazio">Nenhum jogo neste gênero na demonstração.</p>
            <?php endif; ?>
            <div class="product-container">
                <form method="get" action="pag_jogo.php" style="display:flex">
                    <?php
                    for ($i = 0; $i < $qtdJogos; $i++) {
                        echo "<div class='product-card'>
                                <div class='product-image'>
                                        <img src='" . e(capaLocal($jogos[$i]['capa'])) . "' class='product-thumb' alt='" . e($jogos[$i]['id_produto']) . "' onclick='PegarId(this)'>
                                        <button type='button' class='card-btn' onclick='PegarId(this.previousElementSibling)'>Ver jogo</button>
                                </div>
                                <div class='product-info'>
                                    <h2 class='product-brand'>" . e($jogos[$i]['titulo']) . "</h2>
                                    <p class='product-short-description'>Sinopse do jogo...</p>
                                    <span class='actual-price'>" . e($jogos[$i]['preco']) . "</span>
                                </div>
                            </div>";
                    }

                    ?>
                    <input type="hidden" name="idProduto" id="idProduto">
                </form>
            </div>

        </section>
    </div>



    <script src="../JavaScript/js_genero/script-genero.js"></script>
    <script>
        function PegarId(el) {
            const form = el.closest('form');
                        form.elements.idProduto.value = el.alt;
                        form.submit();
        }
    </script>

</body>

</html>