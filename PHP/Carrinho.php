<?php
require_once __DIR__ . '/conexao_bd.php';
startDemoSession();
$produtos = new Produto();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    requirePost();
    $id = filter_input(INPUT_POST, 'idProduto', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
    if (isset($_POST['btnAddCarrinho']) && $id && $produtos->mostrarCapa($id)) {
        $_SESSION['carrinho'][$id] = $id;
    }
    $remove = filter_input(INPUT_POST, 'item', FILTER_VALIDATE_INT);
    if ($remove) {
        unset($_SESSION['carrinho'][$remove]);
    }
    redirectTo('Carrinho.php');
}
$total = 0;
?>
<!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <title> Carrinho </title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Chivo+Mono:wght@100&family=Open+Sans&family=Source+Sans+Pro:wght@200&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../Estilos/estilos_carrinho/style_carrinho.css">

        
        

        <script src="https://kit.fontawesome.com/c98cb8ad47.js" crossorigin="anonymous" defer></script>


        <link rel="stylesheet" href="../Estilos/responsivo.css">
</head>

    <body class="carrinho">
        <main>

    <form action="./filtro.php" method="get" >
    <div class="teste">
        <nav>
            <img class="logo" src="../assets/imagem_index/galeria/logo/logo.png" alt="logo" onclick="location.href='index.php'">
            <div class="menu">
                <ul>
                        <input type="text" placeholder="Procurar..." name="busca" id="busca" value="<?php echo e(is_string($_GET['busca'] ?? null) ? $_GET['busca'] : ''); ?>" >
                        <button type="submit" name="buscar" class="btn"><i class="fa fa-search" style="color:white;"></i></button>
                        <a href="Carrinho.php" aria-label="Carrinho"><i class="fa fa-shopping-cart" style="color:white"></i></a>
                        <a href="./perfil.php" aria-label="Perfil"><i class="fa fa-user" style="color:white"></i></a>
                        <a href="logaut.php" aria-label="Sair"><i class="fa-sharp fa-solid fa-right-from-bracket" style="color:white" ></i></a>
                    </ul>
                </div>
            </nav>
        </div>
    </form>

            <section>
                <div class="container-carrinho">
                    <div class="descricao-pedido">
                    <?php
                    if (!$_SESSION['carrinho']) {
                        echo '<p>Seu carrinho está vazio.</p>';
                    }
                    foreach ($_SESSION['carrinho'] as $id) {
                            $capa = $produtos->mostrarCapa($id);
                            $preco = $produtos->mostrarPreco($id);
                            $titulo = $produtos->mostrarTitulo($id);

                            if (!$capa || !$preco || !$titulo) {
                                continue;
                            }
                            echo "<div class='container-itens | ff-itens fs-500 fw-regular bg-primary clr-white'>
                                <img src='" . e(capaLocal($capa['capa'])) . "' alt=''>
                                <div>
                                    <div>
                                        <p style='text-align:center'>" . e($titulo['titulo']) . "</p>
                                    </div>
                                    <div class='valor-item'>
                                        <p class='clr-accent'>" . e($preco['preco']) . "</p>
                                        <button type='button' class='remover-item' data-item='" . $id . "' onclick='apagarItem(this)' aria-label='Remover " . e($titulo['titulo']) . "'><img src='../assets/imagem_carrinho/lixeira.png' alt=''></button>
                                    </div>
                                </div>
                            </div>";
                            $total += (int) round((float) str_replace(',', '.', $preco['preco']) * 100);
                    }
                    ?>
                    </div>
                    <div class="valor-pedido | ff-body fw-semibold clr-white bg-primary">
                        <div>
                            <h3 class="fs-600 fw-bold bg-secundary">Resumo do Pedido</h3>
                            <div class="valor-itens | fs-600">
                                <p>Valor total</p>
                                <?php
                                echo "<p>R$" . number_format($total / 100, 2, ',', '.') . "</p>"
                                ?>
                            </div>
                            <span class="lista-branca"></span>
                        </div>
                        <div class="center">
                            <div class="valor-total | fw-bold fs-700">
                                <p>Total</p>
                                <?php
                                echo "<p class='clr-accent'>R$" . number_format($total / 100, 2, ',', '.') . "</p>";
                                ?>
                            </div>
                            <?php if ($total > 0): ?>
                            <form action="email.php" method="post">
                                <?= csrfField() ?>
                                <button class="btn-comprar | fs-500 fw-bold clr-white bg-btn-comprar">Simular compra</button>
                            </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            <form method="POST">
                <?= csrfField() ?>
                <input type="hidden" name="item" id="item">
            </form>
        </main>
        <script>
            function apagarItem(el) {
                document.querySelector("#item").value = el.dataset.item
                document.querySelector("#item").parentNode.submit()
            }
        </script>
    </body>

    </html>