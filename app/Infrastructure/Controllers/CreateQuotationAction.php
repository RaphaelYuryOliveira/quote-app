<?php

declare(strict_types=1);

namespace App\Infrastructure\Controllers;

use App\Application\CreateQuotationHandler;
use App\Domain\CreateQuotationCommand;
use App\Domain\InvalidAgeException;
use App\Domain\InvalidDateException;
use App\Http\Controllers\Controller;
use App\Infrastructure\Validation\CreateQuotationValidation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CreateQuotationAction extends Controller
{
    public function __construct(private CreateQuotationHandler $handler)
    {
    }

    public function __invoke(CreateQuotationValidation $request): JsonResponse
    {
        $command = new CreateQuotationCommand(
            $request->getAge(),
            $request->get('currency'),
            $request->get('start_date'),
            $request->get('end_date'),
        );

        try {
            $response = $this->handler->handle($command);

            return response()->json(
                $response->toArray(),
                Response::HTTP_CREATED
            );
        } catch(InvalidAgeException|InvalidDateException $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
