<?php

namespace App\View\Composers;

use App\Models\ContactForm;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class CurrentRouteComposer
{
    public function compose(View $view)
    {
        $name = Route::currentRouteName();
        return $view->with('currentRoute', $name);
    }
}
