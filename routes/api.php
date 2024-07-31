<?php

use App\Infrastructure\Controllers\CreateQuotationAction;
use Illuminate\Support\Facades\Route;

Route::post('/quotation', CreateQuotationAction::class);