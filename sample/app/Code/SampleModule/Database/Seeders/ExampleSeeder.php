<?php

namespace App\Code\SampleModule\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Code\SampleModule\Models\MyModel;

class ExampleSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        MyModel::factory()->count(10)->create();
    }
}
