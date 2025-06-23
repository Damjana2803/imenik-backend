<?php

namespace Database\Factories;

use App\Contact;
use App\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /** @var string */
    protected $model = Contact::class;

    public function definition(): array
    {
        return [
            'user_id'   => User::inRandomOrder()->value('id'),
            'ime'       => $this->faker->firstName(),
            'broj'      => $this->faker->unique()->e164PhoneNumber(),
            'email'     => $this->faker->unique()->safeEmail(),
            'tip_broja' => $this->faker->randomElement(['privatni', 'poslovni']),
            'beleske'   => $this->faker->optional()->sentence(10),
        ];
    }
}
