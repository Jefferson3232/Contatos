<?php

declare(strict_types=1);

namespace App\Http\Controllers\Contacts\Requests;

use App\Http\Controllers\Contacts\DTO\CreateInputDTO;
use DateTimeImmutable;
use Exception;
use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'birth_date' => ['required', 'date'],
            'cell_phone' => 'required',
            'nationality' => 'required',
        ];
    }

    /**
     * @throws Exception
     */
    public function toDTO(): CreateInputDTO
    {
        return CreateInputDTO::fromArray([
            'user_id' => auth()->id(),
            'name' => $this->name,
            'email' => $this->email,
            'gender' => $this->gender,
            'birth_date' => (new DateTimeImmutable($this->birth_date))->format('Y-m-d'),
            'cell_phone' => preg_replace("/[^0-9]/", "", $this->cell_phone),
            'nationality' => $this->nationality,
        ]);
    }
}
