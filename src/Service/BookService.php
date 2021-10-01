<?php

declare(strict_types=1);

namespace App\Service;

use App\Exception\BookException;
use App\Repository\BookRepository;

final class BookService
{
    private BookRepository $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function checkAndGet(int $bookId): object
    {
        return $this->bookRepository->checkAndGet($bookId);
    }

    public function getAll(): array
    {
        return $this->bookRepository->getAll();
    }

    public function getOne(int $bookId): object
    {
        return $this->checkAndGet($bookId);
    }

    public function create(array $input): object
    {
        $book = json_decode((string) json_encode($input), false);

        return $this->bookRepository->create($book);
    }

    public function update(array $input, int $bookId): object
    {
        $book = $this->checkAndGet($bookId);
        $data = json_decode((string) json_encode($input), false);

        return $this->bookRepository->update($book, $data);
    }

    public function delete(int $bookId): void
    {
        $this->checkAndGet($bookId);
        $this->bookRepository->delete($bookId);
    }
}
