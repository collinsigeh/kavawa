<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('welcome', [
            'page_title' => 'Customer service and support solution',
            'is_setup_complete' => Country::count() > 0 ? true : false
        ]);
    }
}