<?php
require_once __DIR__ . '/bootstrap.php';

function capaLocal(?string $path): string
{
    if ($path && preg_match('~^\.\./assets/[\w/-]+\.(?:jpe?g|png|webp)$~i', $path)
        && is_file(__DIR__ . '/' . $path)) {
        return $path;
    }
    return '../assets/imagem_index/galeria/titulos/capa-indisponivel.png';
}

class Produto {
    public function mostrarCapa($id_produto){
        $sql = db()->prepare("SELECT capa FROM produto WHERE id_produto = :id_produto");
        $sql->bindValue(":id_produto", $id_produto);
        $sql->execute();
        return $sql->fetch();
    }
    
    public function mostrarTitulo($id_produto){
        $sql = db() -> prepare("SELECT titulo FROM produto WHERE id_produto = :id_produto");
        $sql->bindValue(":id_produto", $id_produto);
        $sql->execute();
        return $sql->fetch();
    }
    
    public function mostrarSinopse($id_produto){
        $sql = db()->prepare("SELECT sinopse FROM produto WHERE id_produto = :id_produto");
        $sql->bindValue(":id_produto",$id_produto);
        $sql->execute();
        return $sql->fetch();
    }

    public function mostrarPreco($id_produto){
        $sql = db()->prepare("SELECT preco FROM produto WHERE id_produto = :id_produto");
        $sql->bindValue(":id_produto",$id_produto);
        $sql->execute();
        return $sql->fetch();
    }

    public function mostrarImagensDemo($id_produto){
        $sql = db()->prepare("SELECT src FROM imagem_demo WHERE id_produto = :id_produto");
        $sql->bindValue(":id_produto", $id_produto);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function mostrarRequisitosMin($id_produto){
        $sql = db()->prepare("SELECT sistema_opmin, memoria_min, processador_min, placadevideo_min, directx_min, armazenamento_min FROM requisito_min WHERE id_produto = :id_produto");
        $sql->bindValue("id_produto", $id_produto);
        $sql -> execute();
        return $sql->fetch();
    }
    public function mostrarRequisitosMax($id_produto){
        $sql = db()->prepare("SELECT sistema_opmax, memoria_max, processador_max, placadevideo_max, directx_max, armazenamento_max FROM requisito_max WHERE id_produto = :id_produto");
        $sql->bindValue("id_produto", $id_produto);
        $sql -> execute();
        return $sql->fetch();
    }
    public function mostrarInfoProdutos(){
        $sql = db()->prepare("SELECT titulo, capa, preco,id_produto FROM produto ORDER BY id_produto");
        $sql -> execute();
        return $sql->fetchAll();
    }
    public function mostrarGenero($genero){
        $sql = db()->prepare("SELECT titulo, capa, preco,id_produto FROM produto WHERE genero = :genero ORDER BY id_produto");
        $sql->bindValue(":genero",$genero);
        $sql->execute();
        return $sql->fetchAll();
    }
    
    public function pesquisar(string $busca): array
    {
        $sql = db()->prepare("SELECT id_produto, titulo, capa, preco FROM produto WHERE titulo COLLATE utf8mb4_unicode_ci LIKE :busca ESCAPE '!' ORDER BY id_produto");
        $term = strtr($busca, ['!' => '!!', '%' => '!%', '_' => '!_']);
        $sql->execute(['busca' => '%' . $term . '%']);
        return $sql->fetchAll();
    }
}
