<?php

namespace App\Repositories;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    protected Model $model;

    public function __construct(
        Model $model
    ) {
        $this->model = $model;
    }

    public function create($data): ?Model
    {
        return $this->model->create($data);
    }

    public function createIfNotExist(array $dataToCheck, array $additionalData = []): Model
    {
        return $this->model->firstOrCreate($dataToCheck, $additionalData);
    }

    public function getFactory()
    {
        return $this->model->factory();
    }

    public function all(array $columns = ['*'], array $relations = []): Builder
    {
        return $this->model->select($columns)->with($relations);
    }

    public function findById(
        int $modelId,
        array $columns = ['*'],
        array $relations = [],
        array $appends = []
    ): ?Model {
        return $this->model->select($columns)->with($relations)->findOrFail($modelId)->append($appends);
    }

    public function deleteById(int $modelId): bool
    {
        return $this->findById($modelId)->delete();
    }

    public function updateWithCondition(array $condition, array $data): int
    {
        return $this->model->where($condition)->update($data);
    }
}
