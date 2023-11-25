<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'cell_phone' => preg_replace("/\D/", '', $this->faker->phoneNumber),
        ];
    }
}
