<?php

declare(strict_types=1);

namespace App\Repository;

use App\Exception\ProdutoException;

final class ProdutoRepository
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

    public function checkAndGet(int $produtoId): object
    {
        $query = 'SELECT * FROM `produto` WHERE `produto_id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $produtoId);
        $statement->execute();
        $produto = $statement->fetchObject();
        if (! $produto) {
            throw new ProdutoException('Produto not found.', 404);
        }

        return $produto;
    }

    public function checkAndGetByProdutor(int $produtoId): object
    {
        $query = 'SELECT * FROM `produto` WHERE `produto_produtor_id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $produtoId);
        $statement->execute();
        $produtoByProdutor = $statement->fetchObject();
        if (! $produtoByProdutor) {
            throw new ProdutoException('Produto by produtor not found.', 404);
        }

        return $produtoByProdutor;
    }

    public function getAll(): array
    {
        $query = 'SELECT * FROM `produto` ORDER BY `produto_id`';
        $statement = $this->getDb()->prepare($query);
        $statement->execute();

        return (array) $statement->fetchAll();
    }

    public function create(object $produto): object
    {
     //   $query = 'INSERT INTO `produto` (`produto_id`, `produto_nome`, `produto_produtor_id`, `produto_descricao`, `produto_detalhe_1`, `produto_detalhe_2`, `produto_categoria_id`, `produto_selos_id`, `produto_fotos`, `produto_created_at`) VALUES (:produto_id, :produto_nome, :produto_produtor_id, :produto_descricao, :produto_detalhe_1, :produto_detalhe_2, :produto_categoria_id, :produto_selos_id, :produto_fotos, :produto_created_at)';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('produto_id', $produto->produto_id);
        $statement->bindParam('produto_nome', $produto->produto_nome);
        $statement->bindParam('produto_produtor_id', $produto->produto_produtor_id);
        $statement->bindParam('produto_descricao', $produto->produto_descricao);
        $statement->bindParam('produto_detalhe_1', $produto->produto_detalhe_1);
        $statement->bindParam('produto_detalhe_2', $produto->produto_detalhe_2);
        $statement->bindParam('produto_categoria_id', $produto->produto_categoria_id);
        $statement->bindParam('produto_selos_id', $produto->produto_selos_id);
        $statement->bindParam('produto_fotos', $produto->produto_fotos);
        $statement->bindParam('produto_created_at', $produto->produto_created_at);

        $statement->execute();

        return $this->checkAndGet((int) $this->getDb()->lastInsertId());
    }

    public function update(object $produto, object $data): object
    {
        if (isset($data->produto_id)) {
            $produto->produto_id = $data->produto_id;
        }
        if (isset($data->produto_nome)) {
            $produto->produto_nome = $data->produto_nome;
        }
        if (isset($data->produto_produtor_id)) {
            $produto->produto_produtor_id = $data->produto_produtor_id;
        }
        if (isset($data->produto_descricao)) {
            $produto->produto_descricao = $data->produto_descricao;
        }
        if (isset($data->produto_detalhe_1)) {
            $produto->produto_detalhe_1 = $data->produto_detalhe_1;
        }
        if (isset($data->produto_detalhe_2)) {
            $produto->produto_detalhe_2 = $data->produto_detalhe_2;
        }
        if (isset($data->produto_categoria_id)) {
            $produto->produto_categoria_id = $data->produto_categoria_id;
        }
        if (isset($data->produto_selos_id)) {
            $produto->produto_selos_id = $data->produto_selos_id;
        }
        if (isset($data->produto_fotos)) {
            $produto->produto_fotos = $data->produto_fotos;
        }
        if (isset($data->produto_created_at)) {
            $produto->produto_created_at = $data->produto_created_at;
        }

        $query = 'UPDATE `produto` SET `produto_id` = :produto_id, `produto_nome` = :produto_nome, `produto_produtor_id` = :produto_produtor_id, `produto_descricao` = :produto_descricao, `produto_detalhe_1` = :produto_detalhe_1, `produto_detalhe_2` = :produto_detalhe_2, `produto_categoria_id` = :produto_categoria_id, `produto_selos_id` = :produto_selos_id, `produto_fotos` = :produto_fotos, `produto_created_at` = :produto_created_at WHERE `id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('produto_id', $produto->produto_id);
        $statement->bindParam('produto_nome', $produto->produto_nome);
        $statement->bindParam('produto_produtor_id', $produto->produto_produtor_id);
        $statement->bindParam('produto_descricao', $produto->produto_descricao);
        $statement->bindParam('produto_detalhe_1', $produto->produto_detalhe_1);
        $statement->bindParam('produto_detalhe_2', $produto->produto_detalhe_2);
        $statement->bindParam('produto_categoria_id', $produto->produto_categoria_id);
        $statement->bindParam('produto_selos_id', $produto->produto_selos_id);
        $statement->bindParam('produto_fotos', $produto->produto_fotos);
        $statement->bindParam('produto_created_at', $produto->produto_created_at);

        $statement->execute();

        return $this->checkAndGet((int) $produto->id);
    }

    public function delete(int $produtoId): void
    {
        $query = 'DELETE FROM `produto` WHERE `id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $produtoId);
        $statement->execute();
    }
}
