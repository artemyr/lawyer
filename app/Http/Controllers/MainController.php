<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MainController extends Controller
{
    public function show() {
        if (!Cache::has('cityRouteList'))
            Cache::put('cityRouteList', ["moskow", "piter", "krasnodar"], 60);
        return view('main', [
            'cities' => Cache::get('cityRouteList')
        ]);
    }
}
