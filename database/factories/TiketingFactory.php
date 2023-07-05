<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tiketing;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tiketing>
 */
class TiketingFactory extends Factory
{
    protected $model = Tiketing::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->title(),
            'gate'=> $this->faker->paragraph()
        ];
    }
}
