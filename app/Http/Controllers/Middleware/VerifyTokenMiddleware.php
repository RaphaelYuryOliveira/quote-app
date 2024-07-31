<?php

declare(strict_types=1);

namespace App\Http\Controllers\Middleware;

use Closure;
use Illuminate\Http\Request;
use ReallySimpleJWT\Token;
use Symfony\Component\HttpFoundation\Response;

class VerifyTokenMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if(null === $request->header('Authorization')) {
            return $this->response();
        }

        $secret = config('token.secret');

        $authorization = explode(' ', $request->header('Authorization'));

        if(
            false === Token::validate($authorization[1], $secret)
            || false === Token::validateExpiration($authorization[1])
        ) {
            return $this->response();
        }

        return $next($request);
    }

    protected function response(): Response
    {
        return response()->json([
            'message' => 'Unauthorized',
        ], Response::HTTP_UNAUTHORIZED);
    }
}
