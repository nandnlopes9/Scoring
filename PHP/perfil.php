<?php
require_once __DIR__ . '/conexao_login.php';
require_once __DIR__ . '/conexao_bd.php';
startDemoSession();
$nome = isset($_SESSION['usuario_id']) ? findProfile($_SESSION['usuario_id']) : null;
if ($nome === null) {
    redirectTo('login.php');
}
$jogos = (new Produto())->mostrarInfoProdutos();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilos/estilos_perfil/style.css">
    <link rel="stylesheet" href="../Estilos/estilos_perfil/swiper-bundle.min.css">
    <link rel="stylesheet" href="../Estilos/estilos_perfil/bootstrap.min.css">
    <link rel="stylesheet" href="../Estilos/estilos_perfil/bootstrap-theme.min.css">


    <link rel="stylesheet" href="../Estilos/estilos_index/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/c98cb8ad47.js" crossorigin="anonymous" defer></script>
    

    <script src="../JavaScript/js_perfil/swiper-bundle.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous" defer></script>
    <script src="../JavaScript/js_perfil/script.js" defer></script>
    <script src="../JavaScript/js_perfil/jquery-3.6.2.js"></script>
    <title>Meu Perfil</title>
    
    <link rel="stylesheet" href="../Estilos/responsivo.css">
</head>

<body class="perfil">
    <!--BARRA DE NAVEGAÇÃO + LOGO-->
    <div class="teste">
        <nav>
            <a href="index.php" aria-label="Página inicial"><img class="logo" src="../Estilos/estilos_index/galeria/logo/logo.png" alt="logo"></a>
            <div class="menu">
                <ul>
                    <a href="Carrinho.php" aria-label="Carrinho"><i class="fa fa-shopping-cart" style="color:white"></i></a>
                    <a href="perfil.php" aria-label="Perfil"><i class="fa fa-user" style="color:white"></i></a>
                    <a href="logaut.php" aria-label="Sair"><i class="fa-sharp fa-solid fa-right-from-bracket" style="color:white" ></i></a>
                </ul>
            </div>
        </nav>
    </div>

<!--         NOME E AVATAR          -->
        
    <div class="informacoes">
        <div id="pfp"> 
            <img src="../assets/imagem_perfil/avatar.png" alt="" width="150px">
        </div>
         <div id="infoper">
        <?php
            echo "<p> ".e($nome["nome"])." </p>";
        ?>
        </div>
     </div>

                                           <!--        MINHA LISTA E CARROSEL         -->

   <div id="mlista">
     <p>Jogos em destaque</p> 
  </div>
        <div class="slide-container swiper">
            <div class="slide-content">
                <div class="card-wrapper swiper-wrapper">
                    <?php foreach ($jogos as $jogo): ?>
                        <div class="card swiper-slide">
                            <a href="pag_jogo.php?idProduto=<?= e($jogo['id_produto']) ?>">
                                <img src="<?= e(capaLocal($jogo['capa'])) ?>" alt="<?= e($jogo['titulo']) ?>" class="card-image">
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <div class="swiper-button-next swiper-navBtn"></div>
            <div class="swiper-button-prev swiper-navBtn"></div>
        </div>
      
                                           <!--           VEJA MAIS              -->


<br>
<div class="central">
    <button  id="btn" data-bs-toggle="collapse" data-bs-target="#main" ><img id="seta" src="../assets/imagem_perfil/Botao.png" height ="60" width="60" /></button>  <br> <br>
    </div>
    
    <div id="main" class="collapse"> 

        <div class="gallery-container">
            <?php foreach ($jogos as $jogo): ?>
                <a href="pag_jogo.php?idProduto=<?= e($jogo['id_produto']) ?>" class="gallery-items">
                    <img src="<?= e(capaLocal($jogo['capa'])) ?>" alt="<?= e($jogo['titulo']) ?>">
                </a>
            <?php endforeach; ?>
     </div> 
        <div class="central">   <br>
            <button id="btn2"  data-bs-toggle="collapse" data-bs-target="#main"> <img id="seta2" src="../assets/imagem_perfil/Botao.png" height ="60" width="60" /></button>
        </div> 
  </div>  


</body> 
</html>