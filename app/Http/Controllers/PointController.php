<?php

namespace App\Http\Controllers;

use App\Services\PointService;
use App\Traits\Response;
use Illuminate\Http\Request;

class PointController extends Controller
{
    use Response;
    public function __construct(private readonly PointService $service)
    {

    }
    public function index()
    {
        return $this->ok('Todos los puntos', $this->service->getAll());
    }
}
