<?php
require_once "conexao_bd.php";
$produtos = new Produto;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilos/estilos_index/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://kit.fontawesome.com/c98cb8ad47.js" crossorigin="anonymous" defer></script>




    <title>Document</title>
    <link rel="stylesheet" href="../Estilos/responsivo.css">
</head>
<body class="busca">

<style>
    body{
        background-image: linear-gradient(95deg, rgb(11, 11, 11), rgb(11, 10, 10) ,rgb(24, 13, 31),rgb(49, 25, 63));
    }
</style>

    <form action="./filtro.php" method="get" >
        <div class="teste">
            <nav>
                <a href="index.php" aria-label="Página inicial"><img class="logo" src="../assets/imagem_index/galeria/logo/logo.png" alt="logo"></a>
                <div class="menu">
                    <ul>
                        <input type="text" placeholder="Procurar..." name="busca" id="busca" value="<?php echo e(is_string($_GET['busca'] ?? null) ? $_GET['busca'] : ''); ?>" >
                        <button type="submit" name="buscar" class="btn"><i class="fa fa-search" style="color:white;"></i></button>
                        <a href="./Carrinho.php" aria-label="Carrinho"><i class="fa fa-shopping-cart" style="color:white"></i></a>
                        <a href="./perfil.php" aria-label="Perfil"><i class="fa fa-user" style="color:white"></i></a>
                        <a href="logaut.php" aria-label="Sair"><i class="fa-sharp fa-solid fa-right-from-bracket" style="color:white" ></i></a>
                    </ul>
                </div>
            </nav>
        </div>
    </form>



<?php
        $busca = $_GET['busca'] ?? '';
        $jogos = is_string($busca) && strlen($busca) <= 200 ? $produtos->pesquisar(trim($busca)) : [];
        ?>
        <div class="busca-titulo">
            <h1><?= $jogos ? 'Resultados encontrados' : 'Nenhum jogo encontrado' ?></h1>
        </div>
        <div class="busca-resultados">
            <?php foreach ($jogos as $jogo): ?>
                <div class="product-card">
                    <a class="product-image" href="pag_jogo.php?idProduto=<?= e($jogo['id_produto']) ?>">
                        <img class="product-thumb" src="<?= e(capaLocal($jogo['capa'])) ?>" alt="<?= e($jogo['titulo']) ?>">
                    </a>
                    <div class="product-info">
                        <h2 class="product-brand"><?= e($jogo['titulo']) ?></h2>
                        <p class="price">R$ <?= e($jogo['preco']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
</body>
</html>
