<?php

declare(strict_types=1);

namespace App\Http\Controllers\Contacts\Requests;

use App\Http\Controllers\Contacts\DTO\UpdateInputDTO;
use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends FormRequest
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
            'cell_phone' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo Nome é obrigatório',
            'email.required' => 'O campo Email é obrigatório',
            'cell_phone.required' => 'O campo Telefone é obrigatório',
        ];
    }

    public function toDTO(): UpdateInputDTO
    {
        return UpdateInputDTO::fromArray([
            'contact_id' => $this->contato,
            'name' => $this->name,
            'email' => $this->email,
            'cell_phone' => preg_replace("/\D/", '', $this->cell_phone),
        ]);
    }

}
