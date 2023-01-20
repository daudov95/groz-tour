<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Excursion;
use App\Models\ExcursionImage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ExcursionController extends Controller
{

    public function index(): View
    {
        $excursions = Excursion::with('images')->orderBy('id', 'DESC')->paginate(6);

//        dump($excursions[4]->images);
//
//        dd();
        return view('frontend.pages.excursions', compact('excursions'));
    }

    public function single($id): View
    {
        $excursion = Excursion::findOrFail($id);
        $schedules = $excursion->schedules()->where('time','>', time())->orderBy('time', 'ASC')->get();

        return view('frontend.pages.excursion-single', compact('excursion', 'schedules'));
    }
}
