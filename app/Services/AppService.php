<?php

namespace App\Services;

use App\Interfaces\RepositoryInterface;
use Illuminate\Http\JsonResponse;
use App\Helpers\ResponseHelper;
use App\Models\App;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class AppService
{
    public function __construct(
        private readonly App $model,
        private readonly PointService $pointService
    ) {
    }


    public function findByUuid(string $uuid): App|null
    {
        return $this->model->newQuery()->where('uuid', $uuid)->first();
    }

    public function generate()
    {
        $app = $this->model->newQuery()->create(['uuid' => $this->getUniqueId()]);
        return $app?->uuid ?? null;
    }

    public function findById($id): App
    {
        return $this->model->newQuery()->findOrFail($id);
    }

    public function createVisit($pointId): void
    {
        $model = $this->pointService->findById($pointId);
        request()->app->visits()->attach($model);
    }

    public function updateTime($time)
    {
        $app = request()->app;
        $now = Carbon::now();
        $startTime = $now->subMinutes($time)->toDateTimeString();
        $endTime = $now->endOfDay()->toDateTimeString();

        $objTime = $app->times()->whereDate('created_at', $now->toDateString())
            ->whereBetween('updated_at', [$startTime, $endTime])
            ->first();

        if ($objTime) {
            $objTime->update(['time' => $objTime->time + $time]);
        } else {
            $objTime = $app->times()->create(['time' => $time]);
        }
        return $objTime->refresh();
    }

    private function getUniqueId()
    {
        $id = Str::uuid();
        return $this->model->newQuery()->where('uuid', $id)->exists() ? $this->getUniqueId() : $id;
    }

}