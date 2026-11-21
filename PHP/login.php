<?php
require_once __DIR__ . '/conexao_login.php';
startDemoSession();
$failed = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    requirePost();
    $email = $_POST['email'] ?? null;
    $password = $_POST['senha'] ?? null;
    if (is_string($email) && strlen($email) <= 254 && is_string($password) && strlen($password) <= 72) {
        $user = findDemoUser(trim($email));
        if ($user && password_verify($password, $user['senha'])) {
            session_regenerate_id(true);
            $_SESSION['usuario_id'] = (int) $user['id_usuario'];
            $_SESSION['csrf'] = bin2hex(random_bytes(32));
            redirectTo('perfil.php');
        }
    }
    $failed = true;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilos/estilos_login/style-login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Login</title>
    <link rel="stylesheet" href="../Estilos/responsivo.css">
</head>
<body class="login">
    <form action="" method="post">
        <?= csrfField() ?>
        <div class="container">
            <div class="conteudo">
                

                <div class="img-box-login">
                    <img src="../assets/imagem_loginCadastro/imagem/HorizonDown.png">
                </div>
            
                <div class="text-login">
                    <h1>Bem vindo a <br> <strong>SCORING</strong> </h1>
                    <br>
                    <h3>Faça login e descubra centenas de jogos</h3>
                </div>

                <div class="input-login">
                    <p>Conta fictícia: demo@scoring.example · Senha: PORwCOGxy_45mKR0eF-iFw</p>
                    <?php if ($failed): ?><p role="alert">E-mail ou senha inválidos.</p><?php endif; ?>
                    <input type="email" required maxlength="254" autocomplete="username" placeholder="E-mail" id="email" name="email">

                    <input type="password" required maxlength="72" autocomplete="current-password" placeholder="Senha" id="senha" name="senha">

                </div>


                    <div class="login-login">
                        <a href="index.php"><h3 id="conta">Voltar ao catálogo</h3></a>
                        <input type="submit" value="Login" id="login" name="login">
                    </div>
            </div>
        </div>
    </form>


</body>
</html>
