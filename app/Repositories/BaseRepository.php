<?php

namespace App\Repositories;

use App\Models\Category;

use App\Repositories\ipl\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        $models = $this->model->query()->get();
        return $models;
    }

    public function getById($id)
    {
        $models = $this->model->query()->findOrFail($id);
        return $models;
    }

    public function delete($id)
    {
        $models = $this->model->query()->findOrFail($id);
        $models->delete();
    }



}
