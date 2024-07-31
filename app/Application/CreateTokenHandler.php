<?php

declare(strict_types=1);

namespace App\Application;

use ReallySimpleJWT\Token;

class CreateTokenHandler
{
    private const EXPIRATION_IN_SECONDS = 3600;

    public function handle(): array
    {
        $expiration = time() + self::EXPIRATION_IN_SECONDS;
        $secret = config('token.secret');

        $token = Token::create('example', $secret, $expiration, 'example');

        return [
            'token' => $token,
            'expire_in' => $expiration,
        ];
    }
}
