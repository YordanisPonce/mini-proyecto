<?php

namespace App\Http\Controllers;

use App\Services\AppService;
use App\Traits\Response;
use Illuminate\Http\Request;

class AppController extends Controller
{
    use Response;

    public function __construct(private readonly AppService $service)
    {
    }


    public function store()
    {
        return $this->ok('Clave de aplicacion genereda satisfactoriamente', $this->service->generate());
    }



}
