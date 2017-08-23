<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class FraudController extends Controller
{
    public function __invoke()
    {
        return view('fraud');
    }
}