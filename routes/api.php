<?php

use App\Http\Controllers\Middleware\VerifyTokenMiddleware;
use App\Infrastructure\Controllers\CreateQuotationAction;
use App\Infrastructure\Controllers\GenerateTokenAction;
use Illuminate\Support\Facades\Route;

Route::get('token', GenerateTokenAction::class);

Route::middleware([VerifyTokenMiddleware::class])->group(function () {
    Route::post('/quotation', CreateQuotationAction::class);
});
