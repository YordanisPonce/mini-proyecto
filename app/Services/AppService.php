<?php

namespace App\Services;

use App\Interfaces\RepositoryInterface;
use Illuminate\Http\JsonResponse;
use App\Helpers\ResponseHelper;
use App\Models\App;
use Illuminate\Support\Str;


class AppService
{
    public function __construct(private readonly App $model)
    {
    }


    public function findByUuid(string $uuid)
    {
        return $this->model->newQuery()->where('uuid', $uuid)->first();
    }

    public function generate()
    {
        $app = $this->model->newQuery()->create(['uuid' => $this->getUniqueId()]);
        return $app?->uuid ?? null;
    }


    private function getUniqueId()
    {
        $id = Str::uuid();
        return $this->model->newQuery()->where('uuid', $id)->exists() ? $this->getUniqueId() : $id;

    }
}