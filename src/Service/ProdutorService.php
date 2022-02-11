<?php

declare(strict_types=1);

namespace App\Service;

use App\Exception\ProdutorException;
use App\Repository\ProdutorRepository;

final class ProdutorService
{
    private ProdutorRepository $produtorRepository;

    public function __construct(ProdutorRepository $produtorRepository)
    {
        $this->produtorRepository = $produtorRepository;
    }

    public function checkAndGet(int $produtorId): object
    {
        return $this->produtorRepository->checkAndGet($produtorId);
    }

    public function getAll(): array
    {
        return $this->produtorRepository->getAll();
    }

    public function getOne(int $produtorId): object
    {
        return $this->checkAndGet($produtorId);
    }

    public function create(array $input): object
    {
        $produtor = json_decode((string) json_encode($input), false);

        return $this->produtorRepository->create($produtor);
    }

    public function update(array $input, int $produtorId): object
    {
        $produtor = $this->checkAndGet($produtorId);
        $data = json_decode((string) json_encode($input), false);

        return $this->produtorRepository->update($produtor, $data);
    }

    public function delete(int $produtorId): void
    {
        $this->checkAndGet($produtorId);
        $this->produtorRepository->delete($produtorId);
    }
}
