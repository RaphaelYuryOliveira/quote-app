<?php

declare(strict_types=1);

namespace App\Domain;

readonly class Quotation
{
    public function __construct(
        public float $total,
        public string $currency,
        public int $quotationId
    ) {
    }

    public function toArray(): array 
    {
        return [
            'total' => $this->total,
            'currency_id' => $this->currency,
            'quotation_id' => $this->quotationId,
        ];
    }
}
