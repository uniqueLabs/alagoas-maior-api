<?php

declare(strict_types=1);

namespace App\Service;

use App\Exception\RegiaoException;
use App\Repository\RegiaoRepository;

final class RegiaoService
{
    private RegiaoRepository $regiaoRepository;

    public function __construct(RegiaoRepository $regiaoRepository)
    {
        $this->regiaoRepository = $regiaoRepository;
    }

    public function checkAndGet(int $regiaoId): object
    {
        return $this->regiaoRepository->checkAndGet($regiaoId);
    }

    public function getAll(): array
    {
        return $this->regiaoRepository->getAll();
    }

    public function getOne(int $regiaoId): object
    {
        return $this->checkAndGet($regiaoId);
    }

    public function create(array $input): object
    {
        $regiao = json_decode((string) json_encode($input), false);

        return $this->regiaoRepository->create($regiao);
    }

    public function update(array $input, int $regiaoId): object
    {
        $regiao = $this->checkAndGet($regiaoId);
        $data = json_decode((string) json_encode($input), false);

        return $this->regiaoRepository->update($regiao, $data);
    }

    public function delete(int $regiaoId): void
    {
        $this->checkAndGet($regiaoId);
        $this->regiaoRepository->delete($regiaoId);
    }
}
