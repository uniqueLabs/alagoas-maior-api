<?php

declare(strict_types=1);

namespace App\Repository;

use App\Exception\ProdutorException;

final class ProdutorRepository
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

    public function checkAndGet(int $produtorId): object
    {
        $query = 'SELECT * FROM `produtor` WHERE `produtor_id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $produtorId);
        $statement->execute();
        $produtor = $statement->fetchObject();
        if (! $produtor) {
            throw new ProdutorException('Produtor not found.', 404);
        }

        return $produtor;
    }

    public function getAll(): array
    {
        $query = 'SELECT * FROM `produtor` ORDER BY `produtor_id`';
        $statement = $this->getDb()->prepare($query);
        $statement->execute();

        return (array) $statement->fetchAll();
    }

    public function create(object $produtor): object
    {
        //$query = 'INSERT INTO `produtor` (`produtor_id`, `produtor_nome`, `produtor_email`, `produtor_whatsapp`, `produtor_descricao`, `produtor_cpf`, `produtor_regiao_id`, `produtor_foto_capa`, `produtor_fotos_carrossel`, `produtor_created_at`) VALUES (:produtor_id, :produtor_nome, :produtor_email, :produtor_whatsapp, :produtor_descricao, :produtor_cpf, :produtor_regiao_id, :produtor_foto_capa, :produtor_fotos_carrossel, :produtor_created_at)';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('produtor_id', $produtor->produtor_id);
        $statement->bindParam('produtor_nome', $produtor->produtor_nome);
        $statement->bindParam('produtor_email', $produtor->produtor_email);
        $statement->bindParam('produtor_whatsapp', $produtor->produtor_whatsapp);
        $statement->bindParam('produtor_descricao', $produtor->produtor_descricao);
        $statement->bindParam('produtor_cpf', $produtor->produtor_cpf);
        $statement->bindParam('produtor_regiao_id', $produtor->produtor_regiao_id);
        $statement->bindParam('produtor_foto_capa', $produtor->produtor_foto_capa);
        $statement->bindParam('produtor_fotos_carrossel', $produtor->produtor_fotos_carrossel);
        $statement->bindParam('produtor_created_at', $produtor->produtor_created_at);

        $statement->execute();

        return $this->checkAndGet((int) $this->getDb()->lastInsertId());
    }

    public function update(object $produtor, object $data): object
    {
        if (isset($data->produtor_id)) {
            $produtor->produtor_id = $data->produtor_id;
        }
        if (isset($data->produtor_nome)) {
            $produtor->produtor_nome = $data->produtor_nome;
        }
        if (isset($data->produtor_email)) {
            $produtor->produtor_email = $data->produtor_email;
        }
        if (isset($data->produtor_whatsapp)) {
            $produtor->produtor_whatsapp = $data->produtor_whatsapp;
        }
        if (isset($data->produtor_descricao)) {
            $produtor->produtor_descricao = $data->produtor_descricao;
        }
        if (isset($data->produtor_cpf)) {
            $produtor->produtor_cpf = $data->produtor_cpf;
        }
        if (isset($data->produtor_regiao_id)) {
            $produtor->produtor_regiao_id = $data->produtor_regiao_id;
        }
        if (isset($data->produtor_foto_capa)) {
            $produtor->produtor_foto_capa = $data->produtor_foto_capa;
        }
        if (isset($data->produtor_fotos_carrossel)) {
            $produtor->produtor_fotos_carrossel = $data->produtor_fotos_carrossel;
        }
        if (isset($data->produtor_created_at)) {
            $produtor->produtor_created_at = $data->produtor_created_at;
        }

        $query = 'UPDATE `produtor` SET `produtor_id` = :produtor_id, `produtor_nome` = :produtor_nome, `produtor_email` = :produtor_email, `produtor_whatsapp` = :produtor_whatsapp, `produtor_descricao` = :produtor_descricao, `produtor_cpf` = :produtor_cpf, `produtor_regiao_id` = :produtor_regiao_id, `produtor_foto_capa` = :produtor_foto_capa, `produtor_fotos_carrossel` = :produtor_fotos_carrossel, `produtor_created_at` = :produtor_created_at WHERE `id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('produtor_id', $produtor->produtor_id);
        $statement->bindParam('produtor_nome', $produtor->produtor_nome);
        $statement->bindParam('produtor_email', $produtor->produtor_email);
        $statement->bindParam('produtor_whatsapp', $produtor->produtor_whatsapp);
        $statement->bindParam('produtor_descricao', $produtor->produtor_descricao);
        $statement->bindParam('produtor_cpf', $produtor->produtor_cpf);
        $statement->bindParam('produtor_regiao_id', $produtor->produtor_regiao_id);
        $statement->bindParam('produtor_foto_capa', $produtor->produtor_foto_capa);
        $statement->bindParam('produtor_fotos_carrossel', $produtor->produtor_fotos_carrossel);
        $statement->bindParam('produtor_created_at', $produtor->produtor_created_at);

        $statement->execute();

        return $this->checkAndGet((int) $produtor->id);
    }

    public function delete(int $produtorId): void
    {
        $query = 'DELETE FROM `produtor` WHERE `id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $produtorId);
        $statement->execute();
    }
}
