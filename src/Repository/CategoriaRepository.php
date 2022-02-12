<?php

declare(strict_types=1);

namespace App\Repository;

use App\Exception\CategoriaException;

final class CategoriaRepository
{
    private \PDO $database;

    public function __construct(\PDO $database)
    {
        $this->database = $database;
    }

    public function getDb(): \PDO
    {
        return $this->database;
    }

    public function checkAndGet(int $categoriaId): object
    {
        $query = 'SELECT * FROM `categoria` WHERE `categoria_id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $categoriaId);
        $statement->execute();
        $categoria = $statement->fetchObject();
        if (! $categoria) {
            throw new CategoriaException('Categoria not found.', 404);
        }

        return $categoria;
    }

    public function getAll(): array
    {
        $query = 'SELECT * FROM `categoria` ORDER BY `categoria_id`';
        $statement = $this->getDb()->prepare($query);
        $statement->execute();

        return (array) $statement->fetchAll();
    }

    public function create(object $categoria): object
    {
      //  $query = 'INSERT INTO `categoria` (`categoria_id`, `categoria_nome`) VALUES (:categoria_id, :categoria_nome)';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('categoria_id', $categoria->categoria_id);
        $statement->bindParam('categoria_nome', $categoria->categoria_nome);

        $statement->execute();

        return $this->checkAndGet((int) $this->getDb()->lastInsertId());
    }

    public function update(object $categoria, object $data): object
    {
        if (isset($data->categoria_id)) {
            $categoria->categoria_id = $data->categoria_id;
        }
        if (isset($data->categoria_nome)) {
            $categoria->categoria_nome = $data->categoria_nome;
        }

        $query = 'UPDATE `categoria` SET `categoria_id` = :categoria_id, `categoria_nome` = :categoria_nome WHERE `id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('categoria_id', $categoria->categoria_id);
        $statement->bindParam('categoria_nome', $categoria->categoria_nome);

        $statement->execute();

        return $this->checkAndGet((int) $categoria->id);
    }

    public function delete(int $categoriaId): void
    {
        $query = 'DELETE FROM `categoria` WHERE `id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $categoriaId);
        $statement->execute();
    }
}
