<?php

declare(strict_types=1);

namespace App\Service;

use App\Exception\CategoriaException;
use App\Repository\CategoriaRepository;

final class CategoriaService
{
    private CategoriaRepository $categoriaRepository;

    public function __construct(CategoriaRepository $categoriaRepository)
    {
        $this->categoriaRepository = $categoriaRepository;
    }

    public function checkAndGet(int $categoriaId): object
    {
        return $this->categoriaRepository->checkAndGet($categoriaId);
    }

    public function getAll(): array
    {
        return $this->categoriaRepository->getAll();
    }

    public function getOne(int $categoriaId): object
    {
        return $this->checkAndGet($categoriaId);
    }

    public function create(array $input): object
    {
        $categoria = json_decode((string) json_encode($input), false);

        return $this->categoriaRepository->create($categoria);
    }

    public function update(array $input, int $categoriaId): object
    {
        $categoria = $this->checkAndGet($categoriaId);
        $data = json_decode((string) json_encode($input), false);

        return $this->categoriaRepository->update($categoria, $data);
    }

    public function delete(int $categoriaId): void
    {
        $this->checkAndGet($categoriaId);
        $this->categoriaRepository->delete($categoriaId);
    }
}
