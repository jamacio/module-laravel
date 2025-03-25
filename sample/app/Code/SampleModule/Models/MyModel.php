<?php

namespace App\Code\SampleModule\Models;

use Illuminate\Database\Eloquent\Model;

class MyModel extends Model
{
    protected $table = 'sample_module_tabela';
    protected $fillable = ['name', 'description'];
}
