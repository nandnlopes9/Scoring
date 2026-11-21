<?php
require_once "conexao_bd.php";

startDemoSession();
$produtos = new Produto;
$idProduto = filter_input(INPUT_GET, 'idProduto', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
if (!$idProduto || !($capa = $produtos->mostrarCapa($idProduto))) {
    http_response_code(404);
    exit('Jogo não encontrado.');
}
$textoRequisito = ["Sistema Operacional", "Memória", "Processador", "Placa de Vídeo", "Direct X", "Armazenamento"];
$camposBDReqMin = ["sistema_opmin", "memoria_min", "processador_min", "placadevideo_min", "directx_min", "armazenamento_min"];
$camposBDReqMax = ["sistema_opmax", "memoria_max", "processador_max", "placadevideo_max", "directx_max", "armazenamento_max"];


$titulo = $produtos->mostrarTitulo($idProduto);
$sinopse = $produtos->mostrarSinopse($idProduto);
$preco = $produtos->mostrarPreco($idProduto);
$imagensDemo = $produtos->mostrarImagensDemo($idProduto);
$requisitosMin = $produtos->mostrarRequisitosMin($idProduto);
$requisitosMax = $produtos->mostrarRequisitosMax($idProduto);
?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Estilos/estilos_pagJogo/slick.css">
        <link rel="stylesheet" href="../Estilos/estilos_pagJogo/slick-theme.css">
        <link rel="stylesheet" href="../Estilos/estilos_pagJogo/style.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/c98cb8ad47.js" crossorigin="anonymous" defer></script>


        <title>Scoring</title>
        <link rel="stylesheet" href="../Estilos/responsivo.css">
</head>

    <body class="jogo">

        <!--BARRA DE NAVEGAÇÃO + LOGO-->
        <form class="teste" action="filtro.php" method="get">
            <nav>
                <a href="index.php" aria-label="Página inicial"><img class="logo" src="../Estilos/estilos_index/galeria/logo/logo.png" alt="logo"></a>
                <div class="menu">
                    <ul>
                        <input type="search" name="busca" placeholder="Procurar...">
                        <button class="btn" type="submit" aria-label="Pesquisar"><i class="fa fa-search" style="color:white;"></i></button>
                        <a href="./Carrinho.php" aria-label="Carrinho"><i class="fa fa-shopping-cart" style="color:white"></i></a>
                        <a href="./perfil.php" aria-label="Perfil"><i class="fa fa-user" style="color:white"></i></a>
                        <a href="logaut.php" aria-label="Sair"><i class="fa-sharp fa-solid fa-right-from-bracket" style="color:white"></i></a>
                    </ul>
                </div>
            </nav>
        </form>

        <section class="global">
            <section class="conteudo-escrito">
                <section class="topo" class="elementos">
                    <?php
                    echo "<p class='nome-jogo' class='elementos'>" . e($titulo['titulo']) . "</p><br>";
                    echo "<div class='desc-jogo' class='elementos'>
                        <p>" . e($sinopse['sinopse']) . "</p>
                    </div>";
                    ?>
                </section>

                <div class="homesLider">

                    <?php

                    $qtdImagensDemo = count($imagensDemo);
                    for ($i = 0; $i < $qtdImagensDemo; $i++) {
                        echo "<div class='slide'>
                                <img class='small_img' src='" . e(capaLocal($imagensDemo[$i]['src'])) . "'> 
                              </div>";
                    }

                    ?>

                </div><br>

                <p class="requisitos-aviso">Requisitos ilustrativos da demonstração.</p>
                <section class="requisitos elementos">
                    <div class="desc-requisito min">
                        <h3 class="tit-requisito">Mínimos</h3>
                        <?php
                        $qtdReq = count($textoRequisito);
                        for ($i = 0; $i < $qtdReq; $i++) {
                            echo "<h1>" . $textoRequisito[$i] . "</h1>";
                            echo "<p>" . e($requisitosMin[$camposBDReqMin[$i]] ?? 'Não informado') . "</p>";
                        }
                        ?>
                    </div>

                    <div class="desc-requisito">
                        <h3 class="tit-requisito">Recomendado</h3>
                        <?php
                        for ($i = 0; $i < $qtdReq; $i++) {
                            echo "<h1>" . $textoRequisito[$i] . "</h1>";
                            echo "<p>" . e($requisitosMax[$camposBDReqMax[$i]] ?? 'Não informado') . "</p>";
                        }
                        ?>
                    </div>
                </section>


            </section>

            <section class="conteudo-visual">
                <div class="img-jogo">
                <?php
                echo "<img class='capa-jogo' src='" . e(capaLocal($capa['capa'])) . "' alt='" . e($titulo['titulo']) . "'>";
                ?>
                </div>
                <section>
                    <div class="preco">
                        <?php
                        echo "<p> R$ " . e($preco['preco']) . "</p>";
                        ?>
                    </div>

                    <div class="botoes">
                        <form action="Carrinho.php" method="POST">
                            <input class="adc-carrinho" type="submit" name="btnAddCarrinho" value="+ ADICIONAR AO CARRINHO">
                            <?= csrfField() ?>
                            <input type="hidden" name="idProduto" value="<?= e($idProduto) ?>">
                        </form>
                    </div>
                </section>
            </section>


            <div class="modal" id="bt_close">
                <div class="modal_content">
                    <img id="modal_img" alt="Imagem ampliada do jogo">
                </div>
            </div>
        </section>



        <script src="../JavaScript/js_pag_jogo/jquery-3.6.2.min.js"></script>
        <script src="../JavaScript/js_pag_jogo/slick.min.js"></script>
        <script src="../JavaScript/js_pag_jogo/script.js"></script>
    </body>

    </html>