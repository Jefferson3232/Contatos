<?php

namespace App\Http\Controllers\Contacts\DTO;

class CreateInputDTO
{
    public function __construct(
        private readonly int $userId,
        private readonly string $name,
        private readonly string $email,
        private readonly string $cellPhone,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            userId: $data['user_id'],
            name: $data['name'],
            email: $data['email'],
            cellPhone: $data['cell_phone'],
        );
    }

    public function toArray(): array
    {
        return [
            'user_id' => $this->userId,
            'name' => $this->name,
            'email' => $this->email,
            'cell_phone' => $this->cellPhone,
        ];
    }
}
