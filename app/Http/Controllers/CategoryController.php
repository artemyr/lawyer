<?php

namespace App\Http\Controllers;

use App\Models\DTO\Breadcrumbs;
use App\Models\DTO\Page;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('pages.services', [
            'page' => new Page('Услуги'),
            'breadcrumbs' => (new Breadcrumbs())->add('uslugi', 'Услуги')
        ]);
    }
}
