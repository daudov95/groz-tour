<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public function index(): View
    {
        return view('frontend.pages.details');
    }

    public function payment(): View
    {
        return view('frontend.pages.payment');
    }
}
