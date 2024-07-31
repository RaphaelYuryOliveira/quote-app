<?php

declare(strict_types=1);

namespace App\Domain;

readonly class CreateQuotationCommand
{
    public function __construct(
        public array $age,
        public string $currency,
        public string $startDate,
        public string $endDate
    ) {
    }
}
