<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Subscriber; // Stelle sicher, dass du den korrekten Namespace deines Models angibst
use App\Models\Company; // Angenommen, du hast ein Company Model

class SubscriberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'company_id' => Company::inRandomOrder()->first()->id, // Zufällige company_id
            'activation_code' => Str::random(10), // Generiert einen zufälligen String
            'activated_ip' => $this->faker->ipv4, // Generiert eine zufällige IPv4-Adresse
            'activated_at' => $this->faker->date(), // Generiert ein zufälliges Datum
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
