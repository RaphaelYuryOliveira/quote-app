<?php

declare(strict_types=1);

namespace App\Infrastructure\Controllers;

use App\Application\CreateTokenHandler;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class GenerateTokenAction extends Controller
{
    public function __construct(private CreateTokenHandler $handler)
    {   
    }

    public function __invoke(): JsonResponse
    {
        try {
            $response = $this->handler->handle();
            
            return response()->json(
                $response,
                Response::HTTP_OK
            );
        } catch (Exception $exception) {
            return response()->json([
                'message' => 'Please try again later',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
