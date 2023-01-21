<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Excursion;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(): View
    {
        $excursions = Excursion::with('images')->orderBy('id', 'DESC')->paginate(3);
        return view('frontend.pages.index', compact('excursions'));
    }
}
