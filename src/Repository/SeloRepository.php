<?php

declare(strict_types=1);

namespace App\Repository;

use App\Exception\SeloException;

final class SeloRepository
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

    public function checkAndGet(int $seloId): object
    {
        $query = 'SELECT * FROM `selo` WHERE `selo_id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $seloId);
        $statement->execute();
        $selo = $statement->fetchObject();
        if (! $selo) {
            throw new SeloException('Selo not found.', 404);
        }

        return $selo;
    }

    public function getAll(): array
    {
        $query = 'SELECT * FROM `selo` ORDER BY `selo_id`';
        $statement = $this->getDb()->prepare($query);
        $statement->execute();

        return (array) $statement->fetchAll();
    }

    public function create(object $selo): object
    {
        //$query = 'INSERT INTO `selo` (`selo_id`, `selo_nome`, `selo_abreviacao`) VALUES (:selo_id, :selo_nome, :selo_abreviacao)';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('selo_id', $selo->selo_id);
        $statement->bindParam('selo_nome', $selo->selo_nome);
        $statement->bindParam('selo_abreviacao', $selo->selo_abreviacao);

        $statement->execute();

        return $this->checkAndGet((int) $this->getDb()->lastInsertId());
    }

    public function update(object $selo, object $data): object
    {
        if (isset($data->selo_id)) {
            $selo->selo_id = $data->selo_id;
        }
        if (isset($data->selo_nome)) {
            $selo->selo_nome = $data->selo_nome;
        }
        if (isset($data->selo_abreviacao)) {
            $selo->selo_abreviacao = $data->selo_abreviacao;
        }

        $query = 'UPDATE `selo` SET `selo_id` = :selo_id, `selo_nome` = :selo_nome, `selo_abreviacao` = :selo_abreviacao WHERE `id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('selo_id', $selo->selo_id);
        $statement->bindParam('selo_nome', $selo->selo_nome);
        $statement->bindParam('selo_abreviacao', $selo->selo_abreviacao);

        $statement->execute();

        return $this->checkAndGet((int) $selo->id);
    }

    public function delete(int $seloId): void
    {
        $query = 'DELETE FROM `selo` WHERE `id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $seloId);
        $statement->execute();
    }
}
