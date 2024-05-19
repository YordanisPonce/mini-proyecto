<?php

namespace App\Http\Middleware;

use App\Services\AppService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AppMiddleware
{
    use \App\Traits\Response;

    public function __construct(private readonly AppService $appService)
    {
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $uuid = $request->header('X-APP-ID');
        if (!$uuid) {
            return $this->fail('Aseugurese de proveer una clave de aplicación');
        }

        $app = $this->appService->findByUuid($uuid);

        if (!$app) {
            return $this->fail('La clave de aplicación proporcionada no es válida');
        }

        $request->merge(['app' => $app]);

        return $next($request);
    }
}
