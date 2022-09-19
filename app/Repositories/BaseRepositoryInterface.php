<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * This is a base repository interface with common methods across all the models.
 */
interface BaseRepositoryInterface
{
    public function create($data): ?Model;

    public function createIfNotExist(array $dataToCheck, array $additionalData = []): Model;

    public function getFactory();
}
