<?php

namespace App\Services;

use App\Interfaces\RepositoryInterface;
use Illuminate\Http\JsonResponse;
use App\Helpers\ResponseHelper;
use App\Models\Point;

class PointService
{
    public function __construct(private readonly Point $model)
    {
    }

    public function getAll()
    {
        return $this->model->newQuery()->get();
    }

    public function findById($id): Point
    {
        return $this->model->newQuery()->findOrFail($id);
    }



}