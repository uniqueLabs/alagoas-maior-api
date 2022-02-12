<?php

declare(strict_types=1);

namespace App\Service;

use App\Exception\SeloException;
use App\Repository\SeloRepository;

final class SeloService
{
    private SeloRepository $seloRepository;

    public function __construct(SeloRepository $seloRepository)
    {
        $this->seloRepository = $seloRepository;
    }

    public function checkAndGet(int $seloId): object
    {
        return $this->seloRepository->checkAndGet($seloId);
    }

    public function getAll(): array
    {
        return $this->seloRepository->getAll();
    }

    public function getOne(int $seloId): object
    {
        return $this->checkAndGet($seloId);
    }

    public function create(array $input): object
    {
        $selo = json_decode((string) json_encode($input), false);

        return $this->seloRepository->create($selo);
    }

    public function update(array $input, int $seloId): object
    {
        $selo = $this->checkAndGet($seloId);
        $data = json_decode((string) json_encode($input), false);

        return $this->seloRepository->update($selo, $data);
    }

    public function delete(int $seloId): void
    {
        $this->checkAndGet($seloId);
        $this->seloRepository->delete($seloId);
    }
}
