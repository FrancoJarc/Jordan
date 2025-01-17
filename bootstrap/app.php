<?php

use App\Http\Middleware\IsVendedor;
use App\Http\Middleware\IsCliente;
use App\Http\Middleware\isVisitante;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'is_vendedor'=>IsVendedor::class,
            'is_cliente' =>IsCliente::class,
            'is_visitante' => isVisitante::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
