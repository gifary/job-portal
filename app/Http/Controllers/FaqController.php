<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function __invoke()
    {
        return view('faq');
    }
}