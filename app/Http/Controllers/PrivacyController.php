<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class PrivacyController extends Controller
{
    public function __invoke()
    {
        return view('privacy');
    }
}