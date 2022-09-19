<?php

namespace App\Repositories;



use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    protected Model $model;

    public function __construct(
        Model $model
    )
    {
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

}
