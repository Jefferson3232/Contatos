<?php

namespace App\Http\Controllers\Contacts\DTO;

class UpdateInputDTO
{
    public function __construct(
        public readonly int $contactId,
        public readonly string $name,
        public readonly string $email,
        public readonly string $cellPhone,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            contactId: $data['contact_id'],
            name: $data['name'],
            email: $data['email'],
            cellPhone: $data['cell_phone'],
        );
    }

    public function toArray(): array
    {
        return [
            'contact_id' => $this->contactId,
            'name' => $this->name,
            'email' => $this->email,
            'cell_phone' => $this->cellPhone,
        ];
    }
}
