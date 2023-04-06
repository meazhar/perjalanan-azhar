<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CucianController extends Controller
{
    public function index()
    {
        return view('cucian.index',
        [
            "title" => "Data Cucian"
        ]);
    }
}
