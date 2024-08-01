<?php

namespace App\Domain;

use Exception;

class InvalidAgeException extends Exception
{
    public function __construct()
    {
        parent::__construct('Please provide a valid age');
    }
}
