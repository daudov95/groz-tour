<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index() : View
    {
        return view('frontend.pages.contacts');
    }
}