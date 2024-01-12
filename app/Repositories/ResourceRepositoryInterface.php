<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface ResourceRepositoryInterface
{
    public function all(): Collection;

    public function create(array $attributes): Model;

    public function find(int $id, array $with = [], array $params = []): ?Model;

    public function findWithTrash(int $id): ?Model;

    public function delete(int $id);

    public function update(int $id, array $attributes): bool;
}
