<?php

namespace App\Http\Controllers;

use App\Models\DTO\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MainController extends Controller
{
    public function show()
    {
        return view('main', [
            'banner' => new Banner(
                bigImage: asset('image/bg.jpg'),
                averageImage: asset('image/bg.png'),
                smallImage: asset('image/bg-small.png'),
                title: "Юридические<br>услуги <span>для частных<br>лиц и бизнеса</span>"
            )
        ]);
    }
}
