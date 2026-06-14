<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LegalController extends Controller
{
    public function privacyPolicy()
    {
        return view('pages.privacy-policy');
    }

    public function termsConditions()
    {
        return view('pages.terms-conditions');
    }
}