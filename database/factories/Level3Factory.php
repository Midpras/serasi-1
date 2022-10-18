<?php

namespace Database\Factories;

use App\Models\Level3;
use Facade\Ignition\Support\FakeComposer;
use Illuminate\Database\Eloquent\Factories\Factory;

class Level3Factory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Level3::class;

    public function definition()
    {
        return [
            'nama_lvl3' => $this->faker->sentence,
        ];
    }
}
