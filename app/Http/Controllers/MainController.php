<?php

namespace App\Http\Controllers;

use App\Models\DTO\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MainController extends Controller
{
    public function show() {
        $params['banner'] = new Banner(asset('image/bg.jpg'), asset('image/bg.png'), asset('image/bg-small.png'));
        $params['banner_title'] = "Юридические<br>услуги <span>для частных<br>лиц и бизнеса</span>";
        return view('main', $params);
    }
}
