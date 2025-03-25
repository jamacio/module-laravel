<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SampleModuleTabela;

class ExampleSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        SampleModuleTabela::factory()->count(10)->create();
    }
}
