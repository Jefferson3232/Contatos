<?php

namespace App\Http\Controllers\Contacts\DTO;

use DateTimeImmutable;

class CreateInputDTO
{
    public function __construct(
        private readonly int $userId,
        private readonly string $name,
        private readonly string $email,
        private readonly string $gender,
        private readonly string $birthDate,
        private readonly string $cellPhone,
        private readonly string $nationality,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            userId: $data['user_id'],
            name: $data['name'],
            email: $data['email'],
            gender: $data['gender'],
            birthDate: $data['birth_date'],
            cellPhone: $data['cell_phone'],
            nationality: $data['nationality'],
        );
    }

    public function toArray(): array
    {
        return [
            'user_id' => $this->userId,
            'name' => $this->name,
            'email' => $this->email,
            'gender' => $this->gender,
            'birth_date' => $this->birthDate,
            'cell_phone' => $this->cellPhone,
            'nationality' => $this->nationality,
        ];
    }

}