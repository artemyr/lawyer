<?php

namespace App\Services\DynamicUrl;

use App\Http\Controllers\DynamicUrl\CategoryController;
use App\Http\Controllers\DynamicUrl\CityController;
use App\Http\Controllers\DynamicUrl\DefaultController;
use App\Http\Controllers\DynamicUrl\DynamicUrlInterface;
use App\Http\Controllers\DynamicUrl\GosInstansController;
use App\Http\Controllers\DynamicUrl\PostController;
use Illuminate\Support\Facades\Cache;

class UrlValidatorAbstract
{
    protected $page;
    protected $parts;
    protected $city;
    protected $category;
    protected $gosInstans;
    protected $post;
    public function __construct($page) {
        $this->page = $page;
        $this->parts = explode('/', $page);
    }

    protected function getCities() : array {
        return Cache::get('cityRouteList');
    }
    protected function getCategories() : array
    {
        return Cache::get('categoryRouteList');
    }
    protected function getGosInstanses() : array
    {
        return Cache::get('instansRouteList');
    }
    public function getCity() {
        return $this->city;
    }
    public function getCategory() {
        return $this->category;
    }
    public function getGosInstanse() {
        return $this->gosInstans;
    }
    public function getBreadcrumbs() {
        $parts = [];
        foreach ($this->parts as $key => $part) {
            if ($key > 0) {
                $parts[$key] = $parts[$key - 1] . "/" . $this->parts[$key];
            } else {
                $parts[$key] = $part;
            }
        }
        $crumbs = [];
        foreach ($this->parts as $key => $part) {
            $crumbs[] = [
                'name' => $part,
                'link' => "/" . $parts[$key] . "/",
            ];
        }
        return array_merge([
            [
                'link' => '/',
                'name' => 'home'
            ]
        ], $crumbs);
    }
}
