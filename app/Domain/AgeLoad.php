<?php

declare(strict_types=1);

namespace App\Domain;

class AgeLoad
{
    public function getAgeLoad(int $age): float
    {
        switch ($age) {
            case ($age >= 18 && $age <= 30):
                return 0.6;
            case ($age >= 31 && $age <= 40):
                return 0.7;
            case ($age >= 41 && $age <= 50):
                return 0.8;
            case ($age >= 51 && $age <= 60):
                return 0.9;
            case ($age >= 61 && $age <= 70):
                return 1;
            default:
                throw new InvalidAgeException();
        }
    }
}
