<?php
require_once __DIR__ . '/bootstrap.php';

function findDemoUser(string $email): ?array
{
    $query = db()->prepare('SELECT id_usuario, senha FROM usuario WHERE email = :email');
    $query->execute(['email' => $email]);
    return $query->fetch() ?: null;
}

function findProfile(int $id): ?array
{
    $query = db()->prepare('SELECT nome FROM usuario WHERE id_usuario = :id');
    $query->execute(['id' => $id]);
    return $query->fetch() ?: null;
}
