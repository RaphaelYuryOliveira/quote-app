<?php

declare(strict_types=1);

namespace App\Application;

use App\Domain\AgeLoad;
use App\Domain\CreateQuotationCommand;
use App\Domain\Quotation;
use Carbon\Carbon;

class CreateQuotationHandler
{
    private const FIRST_TRIP_DAY = 1;
    private const FIXED_RATE = 3;
    private const DECIMAL_PRECISION = 2;

    public function __construct(private AgeLoad $ageLoad)
    {
    }

    public function handle(CreateQuotationCommand $command): Quotation
    {
        $startDate = Carbon::createFromFormat('Y-m-d', $command->startDate);
        $endDate = Carbon::createFromFormat('Y-m-d', $command->endDate);

        $tripLength = $startDate->diffInDays($endDate) + self::FIRST_TRIP_DAY;

        $total =  $this->calculateQuotation($command->age, $tripLength);

        return new Quotation($total, $command->currency, rand());
    }

    private function calculateQuotation(array $ages, float $tripLength): float
    {
        $total = 0;

        foreach ($ages as $age) {
            $ageLoad = $this->ageLoad->getAgeLoad((int)$age);

            $total = $total + (self::FIXED_RATE * $ageLoad * $tripLength);
        }

        return round($total, self::DECIMAL_PRECISION);
    }
}
