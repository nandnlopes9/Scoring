# Scoring — demonstração acadêmica beta

Vitrine experimental de jogos desenvolvida durante a formação de **Assistente em Programação Web pelo SENAI (805 horas)**. Esta edição foi preparada para portfólio. As compras são demonstrativas e não envolvem clientes, pagamentos, licenças de jogos ou e-mails reais.

![Vitrine do Scoring com o banner e o início das categorias](docs/scoring-catalogo.png)

## Projeto original e adaptações

- **Projeto acadêmico.** Identidade visual, vitrine, categorias, busca, páginas de jogos, login, cadastro, perfil, carrinho e painel de cadastro. A finalização original tentava enviar uma confirmação por SMTP.
- **Scoring-Demo.** Preserva as telas principais e os recursos visuais, usa um catálogo demonstrativo com títulos reais e preços simulados, disponibiliza uma conta de teste e confirma a compra na tela. O cadastro público e o painel administrativo estão desativados. O perfil é somente para leitura. O carrinho e a conclusão da compra ficam na sessão de cada visitante.
- Os atalhos de login social e a lista de desejos estavam incompletos no projeto original e ficaram fora do fluxo da demo.

Tecnologias: PHP 8.1+ com PDO MySQL e sessões, MySQL ou MariaDB, HTML, CSS, JavaScript, jQuery, Slick, Swiper e Bootstrap.

## Executar localmente

1. Crie um banco vazio **scoring_demo** com codificação utf8mb4. No phpMyAdmin, selecione esse banco e importe **Banco de Dados/scoring.sql** uma vez.
2. Copie **PHP/config.example.php** para **PHP/config.local.php** e preencha host, porta, banco, usuário e senha. Use um usuário próprio do banco. A aplicação só precisa de SELECT após a importação.
3. Na raiz da cópia, execute **php -S 127.0.0.1:8000** e abra http://127.0.0.1:8000. No XAMPP, também é possível usar a raiz pública do Apache.

## Experimentar a demo

Explore os gêneros, procure por **Stardew Valley**, abra um jogo, adicione ao carrinho e clique em **Simular compra**. O ícone de perfil permite entrar com a conta de teste.

- E-mail: **demo@scoring.example**
- Senha pública da demo: **PORwCOGxy_45mKR0eF-iFw**

O hash bcrypt no SQL foi gerado com password_hash(). Para substituí-lo em uma instalação própria, gere um novo com **password_hash()** no PHP e ajuste a inserção antes de importar. Atualize também a dica na tela de login.

O catálogo corresponde às nove capas locais do projeto acadêmico. Os valores e requisitos exibidos são dados de demonstração. Com os gêneros corrigidos, Luta e Esportes mostram um estado vazio. Se você já importou uma versão anterior, use um banco vazio separado para importar este SQL atualizado.

## Hospedar no InfinityFree

1. Crie um subdomínio e um banco MySQL exclusivo no painel. Importe o SQL pelo phpMyAdmin. Use o nome, o host, a porta e o usuário informados pelo serviço.
2. Envie o index da raiz e as pastas PHP, assets, Estilos e JavaScript para htdocs, preservando maiúsculas e minúsculas. Mantenha a pasta Banco de Dados fora de htdocs. Envie os arquivos .htaccess das pastas hospedadas. A biblioteca legada PHP/src do PHPMailer pode ficar fora do servidor, pois a demo não usa SMTP.
3. Crie PHP/config.local.php no servidor com a configuração privada. Ative HTTPS e confirme que os arquivos de configuração, o SQL e o painel estão bloqueados no navegador.
4. Teste em janela anônima a navegação, busca, login, perfil, carrinho e confirmação. Depois, inclua no portfólio o endereço HTTPS.

A URL pública ainda não foi definida. Revise as permissões de uso de capas, banners e marcas originais antes de publicar as imagens. Se a credencial SMTP original era real, revogue-a na conta remetente e revise qualquer histórico existente antes de publicar código.
