<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function measurement()
    {
        return view('pages.services.measurement');
    }

    public function customDesign()
    {
        return view('pages.services.custom-design');
    }

    public function largeScale()
    {
        return view('pages.services.large-scale');
    }
}