<?php

namespace App\Domain;

use Exception;

class InvalidDateException extends Exception
{
    public function __construct()
    {
        parent::__construct('Please provide a valid date');
    }
}