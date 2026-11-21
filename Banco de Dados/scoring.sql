-- Importe apenas em um banco vazio reservado para a demo.
SET NAMES utf8mb4;

create table if not exists produto(
    id_produto INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(50) NOT NULL,
    sinopse VARCHAR(1000) NOT NULL,
    preco VARCHAR(6) NOT NULL,
    capa VARCHAR(1000) NOT NULL,
    genero VARCHAR(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

create table if not exists requisito_min(
    id_requisito_min INT AUTO_INCREMENT PRIMARY KEY,
    sistema_opmin VARCHAR(300) NOT NULL,
    memoria_min VARCHAR(100) NOT NULL,
    processador_min VARCHAR(150) NOT NULL,
    placadevideo_min VARCHAR(200) NOT NULL,
    directx_min VARCHAR(100) NOT NULL,
    armazenamento_min VARCHAR(200) NOT NULL,
    id_produto INT ,
    FOREIGN KEY(id_produto) REFERENCES produto(id_produto)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

create table if not exists requisito_max(
    id_requisito_max INT AUTO_INCREMENT PRIMARY KEY,
    sistema_opmax VARCHAR(300) NOT NULL,
    memoria_max VARCHAR(100) NOT NULL,
    processador_max VARCHAR(150) NOT NULL,
    placadevideo_max VARCHAR(200) NOT NULL,
    directx_max VARCHAR(100) NOT NULL,
    armazenamento_max VARCHAR(200) NOT NULL,
    id_produto INT ,
    FOREIGN KEY(id_produto) REFERENCES produto(id_produto)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

create table if not exists imagem_demo(
    id_imagens_demo INT AUTO_INCREMENT PRIMARY KEY,
    src VARCHAR(1000) NOT NULL,
    id_produto INT ,
    FOREIGN KEY(id_produto) REFERENCES produto(id_produto)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

create table if not exists usuario(
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(254) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    sexo CHAR (1) NOT NULL,
    data_nasc VARCHAR(10) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

create table if not exists compra(
    id_compra INT AUTO_INCREMENT PRIMARY KEY,
    id_produto INT ,
    FOREIGN KEY(id_produto) REFERENCES produto(id_produto),
    id_usuario INT ,
    FOREIGN KEY(id_usuario) REFERENCES usuario(id_usuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
START TRANSACTION;

INSERT INTO produto (id_produto, titulo, sinopse, preco, capa, genero) VALUES
    (1, 'FINAL FANTASY VII REMAKE', 'Acompanhe Cloud e o grupo Avalanche em Midgar.', '39,90', '../assets/imagem_index/galeria/titulos/card-finalf.jpg', 'RPG'),
    (2, 'Stardew Valley', 'Cuide de uma fazenda herdada e conheça a comunidade do vale.', '19,90', '../assets/imagem_index/galeria/titulos/card-stardew.jpg', 'Indie'),
    (3, 'The Outlast Trials', 'Sobreviva aos experimentos da Murkoff durante a Guerra Fria.', '24,90', '../assets/imagem_index/galeria/titulos/card-out.jpg', 'Terror'),
    (4, 'STAR WARS Jedi: Fallen Order', 'Acompanhe Cal Kestis em sua jornada após a queda da Ordem Jedi.', '49,90', '../assets/imagem_index/galeria/titulos/card-jedi.jpg', 'Acao e Aventura'),
    (5, 'DARK SOULS REMASTERED', 'Explore Lordran em um RPG de ação com combates desafiadores.', '29,90', '../assets/imagem_index/galeria/titulos/card-darks.jpg', 'RPG'),
    (6, 'Cyberpunk 2077', 'Explore Night City na pele de V, uma pessoa mercenária em busca de seu lugar na cidade.', '34,90', '../assets/imagem_index/galeria/titulos/card-cyberpunk.jpg', 'RPG'),
    (7, 'The Forest', 'Construa um abrigo e tente sobreviver em uma floresta após um acidente aéreo.', '22,90', '../assets/imagem_index/galeria/titulos/card-forest.jpg', 'Terror'),
    (8, 'UNDERTALE', 'Explore o mundo subterrâneo e escolha como lidar com os monstros que encontrar.', '17,90', '../assets/imagem_index/galeria/titulos/card-under.jpg', 'Indie'),
    (9, 'Immortals Fenyx Rising', 'Jogue como Fenyx em uma aventura para salvar os deuses gregos.', '44,90', '../assets/imagem_index/galeria/titulos/card-fenyx.jpg', 'RPG');

INSERT INTO imagem_demo (src, id_produto) VALUES
    ('../assets/imagem_index/galeria/titulos/card-finalf.jpg', 1),
    ('../assets/imagem_index/galeria/titulos/card-stardew.jpg', 2),
    ('../assets/imagem_index/galeria/titulos/card-out.jpg', 3),
    ('../assets/imagem_index/galeria/titulos/card-jedi.jpg', 4),
    ('../assets/imagem_index/galeria/titulos/card-darks.jpg', 5),
    ('../assets/imagem_index/galeria/titulos/card-cyberpunk.jpg', 6),
    ('../assets/imagem_index/galeria/titulos/card-forest.jpg', 7),
    ('../assets/imagem_index/galeria/titulos/card-under.jpg', 8),
    ('../assets/imagem_index/galeria/titulos/card-fenyx.jpg', 9);

INSERT INTO requisito_min (sistema_opmin, memoria_min, processador_min, placadevideo_min, directx_min, armazenamento_min, id_produto) VALUES
    ('Windows 10', '8 GB', 'Quad-core', '2 GB VRAM', '11', '20 GB', 1),
    ('Windows 10', '8 GB', 'Quad-core', '2 GB VRAM', '11', '20 GB', 2),
    ('Windows 10', '8 GB', 'Quad-core', '2 GB VRAM', '11', '20 GB', 3),
    ('Windows 10', '8 GB', 'Quad-core', '2 GB VRAM', '11', '20 GB', 4),
    ('Windows 10', '8 GB', 'Quad-core', '2 GB VRAM', '11', '20 GB', 5),
    ('Windows 10', '8 GB', 'Quad-core', '2 GB VRAM', '11', '20 GB', 6),
    ('Windows 10', '8 GB', 'Quad-core', '2 GB VRAM', '11', '20 GB', 7),
    ('Windows 10', '8 GB', 'Quad-core', '2 GB VRAM', '11', '20 GB', 8),
    ('Windows 10', '8 GB', 'Quad-core', '2 GB VRAM', '11', '20 GB', 9);

INSERT INTO requisito_max (sistema_opmax, memoria_max, processador_max, placadevideo_max, directx_max, armazenamento_max, id_produto) VALUES
    ('Windows 11', '16 GB', 'Six-core', '4 GB VRAM', '12', '30 GB', 1),
    ('Windows 11', '16 GB', 'Six-core', '4 GB VRAM', '12', '30 GB', 2),
    ('Windows 11', '16 GB', 'Six-core', '4 GB VRAM', '12', '30 GB', 3),
    ('Windows 11', '16 GB', 'Six-core', '4 GB VRAM', '12', '30 GB', 4),
    ('Windows 11', '16 GB', 'Six-core', '4 GB VRAM', '12', '30 GB', 5),
    ('Windows 11', '16 GB', 'Six-core', '4 GB VRAM', '12', '30 GB', 6),
    ('Windows 11', '16 GB', 'Six-core', '4 GB VRAM', '12', '30 GB', 7),
    ('Windows 11', '16 GB', 'Six-core', '4 GB VRAM', '12', '30 GB', 8),
    ('Windows 11', '16 GB', 'Six-core', '4 GB VRAM', '12', '30 GB', 9);

-- Hash bcrypt da senha pública indicada no README.
INSERT INTO usuario (nome, email, senha, sexo) VALUES
    ('Visitante Scoring', 'demo@scoring.example', '$2y$12$fpC78QPCp2AGKQ7GPqrvGeIg8AxBIBvzXi90D2.okahUxK5M1.CW2', 'X');

COMMIT;
