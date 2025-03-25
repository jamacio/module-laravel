<?php

namespace Database\Factories;

use App\Models\SampleModuleTabela;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExampleFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = SampleModuleTabela::class;

    /**
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
        ];
    }
}
