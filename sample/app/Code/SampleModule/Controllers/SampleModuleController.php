<?php

namespace App\Code\SampleModule\Controllers;

use Illuminate\Routing\Controller;
use App\Code\SampleModule\Models\MyModel;

class SampleModuleController extends Controller
{
    public function index()
    {
        $items = MyModel::all();
        return view('sample_module::index', compact('items'));
    }
}
