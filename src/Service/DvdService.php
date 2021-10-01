<?php

declare(strict_types=1);

namespace App\Service;

use App\Exception\DvdException;
use App\Repository\DvdRepository;

final class DvdService
{
    private DvdRepository $dvdRepository;

    public function __construct(DvdRepository $dvdRepository)
    {
        $this->dvdRepository = $dvdRepository;
    }

    public function checkAndGet(int $dvdId): object
    {
        return $this->dvdRepository->checkAndGet($dvdId);
    }

    public function getAll(): array
    {
        return $this->dvdRepository->getAll();
    }

    public function getOne(int $dvdId): object
    {
        return $this->checkAndGet($dvdId);
    }

    public function create(array $input): object
    {
        $dvd = json_decode((string) json_encode($input), false);

        return $this->dvdRepository->create($dvd);
    }

    public function update(array $input, int $dvdId): object
    {
        $dvd = $this->checkAndGet($dvdId);
        $data = json_decode((string) json_encode($input), false);

        return $this->dvdRepository->update($dvd, $data);
    }

    public function delete(int $dvdId): void
    {
        $this->checkAndGet($dvdId);
        $this->dvdRepository->delete($dvdId);
    }
}
