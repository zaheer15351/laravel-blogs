<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * This is a base repository interface with common methods across all the models.
 */
interface BaseRepositoryInterface
{
    public function create($data): ?Model;

    public function createIfNotExist(array $dataToCheck, array $additionalData = []): Model;

    public function getFactory();

    public function all(array $columns = ['*'], array $relations = []): Builder;

    public function findById(
        int $modelId,
        array $columns = ['*'],
        array $relations = [],
        array $appends = []
    ): ?Model;

    public function deleteById(int $modelId): bool;

    public function updateWithCondition(array $condition, array $data): int;


}
