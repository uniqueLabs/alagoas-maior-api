<?php

declare(strict_types=1);

namespace App\Repository;

use App\Exception\RegiaoException;

final class RegiaoRepository
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

    public function checkAndGet(int $regiaoId): object
    {
        $query = 'SELECT * FROM `regiao` WHERE `regiao_id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $regiaoId);
        $statement->execute();
        $regiao = $statement->fetchObject();
        if (! $regiao) {
            throw new RegiaoException('Regiao not found.', 404);
        }

        return $regiao;
    }

    public function getAll(): array
    {
        $query = 'SELECT * FROM `regiao` ORDER BY `regiao_id`';
        $statement = $this->getDb()->prepare($query);
        $statement->execute();

        return (array) $statement->fetchAll();
    }

    public function create(object $regiao): object
    {
       // $query = 'INSERT INTO `regiao` (`regiao_id`, `regiao_nome`) VALUES (:regiao_id, :regiao_nome)';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('regiao_id', $regiao->regiao_id);
        $statement->bindParam('regiao_nome', $regiao->regiao_nome);

        $statement->execute();

        return $this->checkAndGet((int) $this->getDb()->lastInsertId());
    }

    public function update(object $regiao, object $data): object
    {
        if (isset($data->regiao_id)) {
            $regiao->regiao_id = $data->regiao_id;
        }
        if (isset($data->regiao_nome)) {
            $regiao->regiao_nome = $data->regiao_nome;
        }

        $query = 'UPDATE `regiao` SET `regiao_id` = :regiao_id, `regiao_nome` = :regiao_nome WHERE `id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('regiao_id', $regiao->regiao_id);
        $statement->bindParam('regiao_nome', $regiao->regiao_nome);

        $statement->execute();

        return $this->checkAndGet((int) $regiao->id);
    }

    public function delete(int $regiaoId): void
    {
        $query = 'DELETE FROM `regiao` WHERE `id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $regiaoId);
        $statement->execute();
    }
}
