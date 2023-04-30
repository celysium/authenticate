<?php

namespace Celysium\Authenticate\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Celysium\Responser\Responser;

class RouteController extends Controller
{
    private RouteServiceInterface $routeService;

    public function __construct(RouteServiceInterface $routeService)
    {
        $this->routeService = $routeService;
    }

    public function index(Request $request): JsonResponse
    {
        $routes = $this->routeService->list($request->query());

        return Responser::retrieved($this->routeService->collection($routes));
    }
}
