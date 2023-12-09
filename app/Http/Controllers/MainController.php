<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MainController extends Controller
{
    public function show() {
        $params['banner'] = asset('image/bg.jpg');
        $params['banner_title'] = "Юридические<br>услуги <span>для частных<br>лиц и бизнеса</span>";
        return view('main', $params);
    }
}
