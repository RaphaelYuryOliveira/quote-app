<?php

declare(strict_types=1);

namespace App\Infrastructure\Validation;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuotationValidation extends FormRequest
{
    protected function prepareForValidation(): void
    {
        if (is_string($this->age)) {
            $this->merge([
                'age' => explode(',', $this->age),
            ]);
        }
    }

    public function rules(): array
    {
        return [
            'age' => 'required|array',
            'age.*' => 'integer|min:18|max:80',
            'currency' => 'required|in:EUR,GBP,USD',
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'required|date_format:Y-m-d|after_or_equal:start_date',
        ];
    }

    public function messages(): array
    {
        return [
            'min' => 'Minimum age allowed is 18',
            'max' => 'Maximum age allowed is 80',
            'in' => 'Please inform a valid currency like EUR, GBP or USD',
        ];
    }

    public function getAge(): array
    {
        return $this->age;
    }
}
