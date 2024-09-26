<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function lang($lang)
    {

        session()->put('lang', $lang);
        return redirect()->back();
    }
}
