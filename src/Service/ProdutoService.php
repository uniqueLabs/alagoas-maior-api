<?php

declare(strict_types=1);

namespace App\Service;

use App\Exception\ProdutoException;
use App\Repository\ProdutoRepository;

final class ProdutoService
{
    private ProdutoRepository $produtoRepository;

    public function __construct(ProdutoRepository $produtoRepository)
    {
        $this->produtoRepository = $produtoRepository;
    }

    public function checkAndGet(int $produtoId): object
    {
        return $this->produtoRepository->checkAndGet($produtoId);
    }

    public function getAll(): array
    {
        return $this->produtoRepository->getAll();
    }

    public function getOne(int $produtoId): object
    {
        return $this->checkAndGet($produtoId);
    }

    public function getByProdutor(int $produtorId): array
    {
        return $this->produtoRepository->checkAndGetByProdutor($produtorId);
    }

    public function create(array $input): object
    {
        $produto = json_decode((string) json_encode($input), false);

        return $this->produtoRepository->create($produto);
    }

    public function update(array $input, int $produtoId): object
    {
        $produto = $this->checkAndGet($produtoId);
        $data = json_decode((string) json_encode($input), false);

        return $this->produtoRepository->update($produto, $data);
    }

    public function delete(int $produtoId): void
    {
        $this->checkAndGet($produtoId);
        $this->produtoRepository->delete($produtoId);
    }
}
