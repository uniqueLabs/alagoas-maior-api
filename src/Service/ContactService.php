<?php

declare(strict_types=1);

namespace App\Service;

use App\Exception\ContactException;
use App\Repository\ContactRepository;

final class ContactService
{
    private ContactRepository $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function checkAndGet(int $contactId): object
    {
        return $this->contactRepository->checkAndGet($contactId);
    }

    public function getAll(): array
    {
        return $this->contactRepository->getAll();
    }

    public function getOne(int $contactId): object
    {
        return $this->checkAndGet($contactId);
    }

    public function create(array $input): object
    {
        $contact = json_decode((string) json_encode($input), false);

        return $this->contactRepository->create($contact);
    }

    public function update(array $input, int $contactId): object
    {
        $contact = $this->checkAndGet($contactId);
        $data = json_decode((string) json_encode($input), false);

        return $this->contactRepository->update($contact, $data);
    }

    public function delete(int $contactId): void
    {
        $this->checkAndGet($contactId);
        $this->contactRepository->delete($contactId);
    }
}
