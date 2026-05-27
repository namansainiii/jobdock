<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\UserFactory;



/**
 * @extends Factory<Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'user_id' => User::factory(),
            'title' => $this->faker->title(),
            'description' => $this->faker->paragraph(),
            'salary' => $this->faker->numberBetween(0,2400000),
            'job_type' => $this->faker->randomElement(['Full-Time' , 'Part-Time']),
            'remote' => $this->faker->boolean(),
            'requirements' => $this->faker->sentence(),
            'benefits' => $this->faker->sentence(),
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'zipcode' => $this->faker->postcode(),
            'contact_email' => $this->faker->safeEmail(),
            'contact_phone' => $this->faker->phoneNumber(),
            'company_name' => $this->faker->company(),
            'company_description' => $this->faker->paragraph(),
            'company_logo' => $this->faker->imageUrl(),
            'company_website' => $this->faker->url(),
        ];
    }
}
