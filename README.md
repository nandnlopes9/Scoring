# 🎮 Scoring — Projeto Acadêmico | SENAI

O **Scoring** é um protótipo de plataforma de jogos desenvolvido durante minha formação de **Assistente em Programação Web pelo SENAI (805 horas)**.

O projeto foi criado para aplicar conhecimentos de desenvolvimento web, integração com banco de dados e construção de interfaces interativas.

Esta versão foi adaptada posteriormente para demonstração em portfólio, preservando a identidade visual e as principais funcionalidades do projeto original.

## 🌐 Demonstração online

### [▶️ ACESSAR O SCORING](https://socring-demo.infy.click/)

Explore o catálogo de jogos, utilize a busca, faça login com a conta demonstrativa e simule uma compra.

**Não é necessário instalar nada para testar a versão online.**

![Vitrine do Scoring](docs/scoring-catalogo.png)

## 🛠️ Tecnologias utilizadas

- PHP e MySQL/MariaDB
- HTML5 e CSS3
- JavaScript
- jQuery
- Bootstrap
- Swiper e Slick
- PDO para conexão com o banco de dados

## ✨ Funcionalidades

- Catálogo de jogos dividido em categorias.
- Pesquisa de jogos.
- Páginas de detalhes com informações e requisitos.
- Sistema de login com autenticação.
- Perfil demonstrativo de usuário.
- Carrinho de compras utilizando sessões PHP.
- Simulação de finalização de compra.

O projeto é acadêmico e não realiza pagamentos, vendas ou envio de licenças reais.

## 🕹️ Conta demonstrativa

Para experimentar as funcionalidades que exigem autenticação:

**E-mail:** `demo@scoring.example`

**Senha:** `PORwCOGxy_45mKR0eF-iFw`

A conta é exclusivamente demonstrativa e não contém dados pessoais reais.

## 📚 Projeto original e adaptações

**Projeto acadêmico original:** desenvolvido durante a formação no SENAI, incluindo identidade visual, catálogo, categorias, pesquisa, páginas de jogos, cadastro, login, perfil, carrinho e painel administrativo.

**Versão demonstrativa atual:** preparada posteriormente para permitir testes públicos. Inclui um banco com nove jogos, melhorias de responsividade, ajustes de autenticação e uma finalização fictícia.

O cadastro público, os uploads, o painel administrativo e o envio de e-mails reais foram desativados nesta versão.

Algumas funcionalidades do protótipo original, como login social e lista de desejos, não foram concluídas.

## 💻 Executar localmente

Caso queira executar o projeto em seu próprio computador:

1. Configure um ambiente com PHP 8.1+ e MySQL/MariaDB.
2. Crie um banco de dados vazio chamado `scoring_demo`, utilizando `utf8mb4`.
3. Importe o arquivo `Banco de Dados/scoring.sql` pelo phpMyAdmin.
4. Copie `PHP/config.example.php` para `PHP/config.local.php` e informe suas credenciais locais.
5. Na raiz do projeto, execute:

```bash
php -S 127.0.0.1:8000
```

6. Abra `http://127.0.0.1:8000` no navegador.

Também é possível executar o projeto utilizando XAMPP.

## ☁️ Hospedagem

A versão demonstrativa está publicada gratuitamente no **InfinityFree**, utilizando PHP e MySQL.

**Endereço:** https://socring-demo.infy.click/

O subdomínio contém uma pequena diferença de grafia em relação ao nome do projeto, sem impacto nas funcionalidades.

## ℹ️ Observações

O Scoring é um projeto acadêmico experimental, sem fins comerciais. Os preços, as compras e os dados de usuários são demonstrativos.

Os nomes, marcas e materiais visuais dos jogos pertencem aos seus respectivos titulares. O Scoring não possui vínculo oficial com as empresas responsáveis pelos títulos apresentados.

O repositório preserva o trabalho desenvolvido durante minha formação e documenta as adaptações realizadas posteriormente para disponibilizá-lo como demonstração pública.
