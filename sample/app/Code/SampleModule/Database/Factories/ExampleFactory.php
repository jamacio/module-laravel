<?php

namespace App\Code\SampleModule\Database\Factories;

use App\Code\SampleModule\Models\MyModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExampleFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = MyModel::class;

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
