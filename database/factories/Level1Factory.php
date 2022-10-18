<?php

namespace Database\Factories;

use App\Models\Level1;
use Illuminate\Database\Eloquent\Factories\Factory;

class Level1Factory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Level1::class;

    public function definition()
    {
        return [
            'nama_lvl1' => $this->faker->sentence,
        ];
    }
}
