<?php

declare(strict_types=1);

namespace App\Service;

use App\Exception\CdException;
use App\Repository\CdRepository;

final class CdService
{
    private CdRepository $cdRepository;

    public function __construct(CdRepository $cdRepository)
    {
        $this->cdRepository = $cdRepository;
    }

    public function checkAndGet(int $cdId): object
    {
        return $this->cdRepository->checkAndGet($cdId);
    }

    public function getAll(): array
    {
        return $this->cdRepository->getAll();
    }

    public function getOne(int $cdId): object
    {
        return $this->checkAndGet($cdId);
    }

    public function create(array $input): object
    {
        $cd = json_decode((string) json_encode($input), false);

        return $this->cdRepository->create($cd);
    }

    public function update(array $input, int $cdId): object
    {
        $cd = $this->checkAndGet($cdId);
        $data = json_decode((string) json_encode($input), false);

        return $this->cdRepository->update($cd, $data);
    }

    public function delete(int $cdId): void
    {
        $this->checkAndGet($cdId);
        $this->cdRepository->delete($cdId);
    }
}
