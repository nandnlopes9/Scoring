<?php
require_once "conexao_bd.php";
$produtos = new Produto;

$tdsProdutos = $produtos->mostrarInfoProdutos();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilos/estilos_index/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <script src="https://kit.fontawesome.com/c98cb8ad47.js" crossorigin="anonymous" defer></script>

    <title>Scoring</title>
    <style>
        form {
            display: flex;
        }

        .product-container {
            overflow-y: hidden;
        }
    </style>
    <link rel="stylesheet" href="../Estilos/responsivo.css">
</head>

<body class="home">
    <!--BARRA DE NAVEGAÇÃO + LOGO-->
    <form action="./filtro.php" method="get">
        <div class="teste">
            <nav>
                <a href="index.php" aria-label="Página inicial"><img class="logo" src="../Estilos/estilos_index/galeria/logo/logo.png" alt="logo"></a>
                <div class="menu">
                    <ul>
                        <input type="text" placeholder="Procurar..." name="busca" id="busca" value="<?php echo e(is_string($_GET['busca'] ?? null) ? $_GET['busca'] : ''); ?>">
                        <button type="submit" name="buscar" class="btn"><i class="fa fa-search" style="color:white;"></i></button>
                        <a href="./Carrinho.php" aria-label="Carrinho"><i class="fa fa-shopping-cart" style="color:white"></i></a>
                        <a href="./perfil.php" aria-label="Perfil"><i class="fa fa-user" style="color:white"></i></a>
                        <a href="logaut.php" aria-label="Sair"><i class="fa-sharp fa-solid fa-right-from-bracket" style="color:white"></i></a>
                    </ul>
                </div>
            </nav>
        </div>
    </form>

    <!--SLIDER/CARROSSEL-->
    <div class="slider">
        <div class="slides">
            <!--Radio Buttons-->
            <input type="radio" name="radio-btn" id="radio1" checked>
            <input type="radio" name="radio-btn" id="radio2">
            <input type="radio" name="radio-btn" id="radio3">
            <!--Fim Radio Buttons-->

            <!--Slide Images-->
            <div class="slide first">
                <img src="../assets/imagem_index/galeria/slider/banner1.png" alt="Imagem 1">
            </div>
            <div class="slide">
                <img src="../assets/imagem_index/galeria/slider/banner2.png" alt="Imagem 2">
            </div>
            <div class="slide">
                <img src="../assets/imagem_index/galeria/slider/banner3.png" alt="Imagem 3">
            </div>

            <!--Navigation Auto-->
            <div class="navigation-auto">
                <div class="auto-btn1"></div>
                <div class="auto-btn2"></div>
                <div class="auto-btn3"></div>
            </div>
        </div>

        <div class="manual-navigation">
            <label for="radio1" class="manual-btn"></label>
            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
        </div>
    </div>

    <!--Catálogo Inicial: mundo aberto/indie/terror-->
    <div>
        <div class="catalago">
            <hr class="solid">
            <h1>Descubra em nosso catálogo</h1>
        </div>
        <div class="gen">
            <form action="pag_genero.php" method="GET">
                <input type="hidden" name="genero">
                <img class="openw" src="../assets/imagem_index/galeria/categorias/gen1.png" alt="RPG" onclick="PegaGenero(this)">
                <img class="indie" src="../assets/imagem_index/galeria/categorias/gen2.png" alt="Indie" onclick="PegaGenero(this)">
                <img class="terror" src="../assets/imagem_index/galeria/categorias/gen3.png" alt="Terror" onclick="PegaGenero(this)">
            </form>
        </div>
    </div>





    <!-- produtos "EM PROMOÇÃO"------------------------------------------------------------->
    <section class="product">
        <div class="product-category">
            <h2>em promoção</h2>
        </div>
        <button class="pre-btn"><img src="../assets/imagem_index/galeria/produtos-seta/arrow2.png" alt="seta"> </button>
        <button class="nxt-btn"><img src="../assets/imagem_index/galeria/produtos-seta/arrow2.png" alt="seta"> </button>
        <div class="product-container">
            <form action="pag_jogo.php" method="GET">
                <input type="hidden" name="idProduto">
                <?php
                $qtdJogos = (int) ceil(count($tdsProdutos) / 3);
                $i = 0;
                for ($i; $i < $qtdJogos; $i++) {
                    echo "<div class='product-card'>
                            <div class='product-image'>
                                <img src='" . e(capaLocal($tdsProdutos[$i]['capa'])) . " ' class='product-thumb' alt='" . e($tdsProdutos[$i]['id_produto']) . "' onclick='PegarId(this)'>
                                <button type='button' class='card-btn' onclick='PegarId(this.previousElementSibling)'>Ver jogo</button>
                            </div>
                            <div class='product-info'>
                                <h2 class='product-brand'>" . e($tdsProdutos[$i]['titulo']) . "</h2>
                                <p class='price'> R$ " . e($tdsProdutos[$i]['preco']) . "</p>
                            </div>
                        </div>";
                }
                ?>
            </form>
        </div>
    </section>


    <!--Título e banner do HIGH SCORE/SCORING-->
    <div class="catalago">
        <hr class="solid">
        <h1>Inicie sua jornada</h1>
    </div>
    <img class="banner-jornada" src="../assets/imagem_index/galeria/banner/promo-back2.png" alt="banner1">

    <!-- produtos "RECOMENDADOS"-->
    <section class="product">
        <div class="product-category">
            <h2>Recomendados</h2>
        </div>

        <button class="pre-btn"><img src="../assets/imagem_index/galeria/produtos-seta/arrow2.png" alt="setas"> </button>
        <button class="nxt-btn"><img src="../assets/imagem_index/galeria/produtos-seta/arrow2.png" alt="setas"> </button>
        <div class="product-container">
            <form action="pag_jogo.php" method="GET">
                <input type="hidden" name="idProduto">
                <?php

                for ($i; $i < min(count($tdsProdutos), $qtdJogos * 2); $i++) {
                    echo "<div class='product-card'>
                    <div class='product-image'>
                    <img src='" . e(capaLocal($tdsProdutos[$i]['capa'])) . " ' class='product-thumb' alt='" . e($tdsProdutos[$i]['id_produto']) . "' onclick='PegarId(this)'>
                    <button type='button' class='card-btn' onclick='PegarId(this.previousElementSibling)'>Ver jogo</button>
                    </div>
                    <div class='product-info'>
                    <h2 class='product-brand'>" . e($tdsProdutos[$i]['titulo']) . "</h2>
                    <p class='price'> R$ " . e($tdsProdutos[$i]['preco']) . "</p>
                    </div>
                    </div>";
                }
                ?>
            </form>

        </div>
    </section>

    <!-- produtos "COM FOCO NA NARRATIVA"-->
    <section class="product">
        <div class="product-category">
            <h2>Com foco na narrativa</h2>
        </div>

        <button class="pre-btn"><img src="../assets/imagem_index/galeria/produtos-seta/arrow2.png" alt="setas"> </button>
        <button class="nxt-btn"><img src="../assets/imagem_index/galeria/produtos-seta/arrow2.png" alt="setas"> </button>
        <div class="product-container">
            <form action="pag_jogo.php" method="GET">
                <input type="hidden" name="idProduto">
                <?php

                for ($i; $i < count($tdsProdutos); $i++) {
                    echo "<div class='product-card'>
                    <div class='product-image'>
                    <img src='" . e(capaLocal($tdsProdutos[$i]['capa'])) . " ' class='product-thumb' alt='" . e($tdsProdutos[$i]['id_produto']) . "' onclick='PegarId(this)'>
                    <button type='button' class='card-btn' onclick='PegarId(this.previousElementSibling)'>Ver jogo</button>
                    </div>
                    <div class='product-info'>
                    <h2 class='product-brand'>" . e($tdsProdutos[$i]['titulo']) . "</h2>
                    <p class='price'> R$ " . e($tdsProdutos[$i]['preco']) . "</p>
                    </div>
                    </div>";
                }
                ?>
            </form>
        </div>
    </section>

    <!--CATÁLOGO FINAL: multiplayer/luta/esportes-->
    <div class="fim">
        <div class="catalago">
            <hr class="solid">
            <h1>Explore por categoria</h1>
        </div>
        <div class="gen">
            <form action="pag_genero.php" method="GET">
                <input type="hidden" name="genero">
                <img class="openw" src="../assets/imagem_index/galeria/categorias/gen4.png" alt="Acao e Aventura" onclick="PegaGenero(this)">
                <img class=" indie" src="../assets/imagem_index/galeria/categorias/gen5.png" alt="Luta" onclick="PegaGenero(this)">
                <img class=" terror" src="../assets/imagem_index/galeria/categorias/gen6.png" alt="Esportes" onclick="PegaGenero(this)">
            </form>
        </div>
    </div>





    <script src="../JavaScript/js_index/script-carrossel.js"></script>
                <script src="../JavaScript/js_index/script-produtos.js"></script>
                <script>
                    function PegarId(el) {
                        const form = el.closest('form');
                        form.elements.idProduto.value = el.alt;
                        form.submit();
                    }

                    function PegaGenero(el) {
                        let genero = el.alt
                        el.parentNode.children[0].value = genero
                        el.parentNode.submit()
                    }
                </script>
                <footer>
                    <p>Copyright &copy; 2022</p>
                </footer>
</body>

</html>