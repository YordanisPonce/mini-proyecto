<?php

namespace App\Http\Controllers;

use App\Services\AppService;
use App\Services\PointService;
use App\Traits\Response;
use Illuminate\Http\Request;

class AppController extends Controller
{
    use Response;

    public function __construct(
        private readonly AppService $service
    ) {
    }
    public function store()
    {
        return $this->ok('Clave de aplicación genereda satisfactoriamente', $this->service->generate());
    }

    public function createVisit(Request $request)
    {
        $request->validate(
            [
                'pointId' => 'required|exists:points,id|numeric'
            ]
        );

        $pointId = $request->input('pointId', null);

        $this->service->createVisit($pointId);

        return $this->ok('Entrada generada satisfactoriamente');
    }

    public function updateTime(Request $request)
    {
        $request->validate(
            [
                'time' => 'required|numeric'
            ]
        );

        $time = $request->input('time', 0);

        $time = $this->service->updateTime($time);

        return $this->ok('Tiempo actualizado satisfactoriamente', $time);
    }
}
