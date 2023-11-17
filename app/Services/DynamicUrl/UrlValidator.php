<?php

namespace App\Services\DynamicUrl;

use App\Http\Controllers\DynamicUrl\CategoryController;
use App\Http\Controllers\DynamicUrl\CityController;
use App\Http\Controllers\DynamicUrl\DefaultController;
use App\Http\Controllers\DynamicUrl\DynamicUrlInterface;
use App\Http\Controllers\DynamicUrl\GosInstansController;
use App\Http\Controllers\DynamicUrl\PostController;
use Illuminate\Support\Facades\Cache;

class UrlValidator
{
    private $page;
    private $parts;
    private $slagsCount;
    private $city;
    private $category;
    private $gosInstans;
    private $post;
    public function __construct($page) {
        $this->page = $page;
        $this->parts = explode('/', $page);
        $this->slagsCount = count($this->parts);
    }
    public function validate() : DynamicUrlInterface
    {
        switch ($this->slagsCount) {
            case 1:
                /**
                 * 1 слаг - либо город | категория
                 */
                if (in_array($this->page, self::getCities())) {
                    $this->city = $this->page;
                    return new CityController;
                } else {
                    if (in_array($this->page, self::getCategories())) {
                        $this->category = $this->page;
                        return new CategoryController;
                    }
                }
                break;
            case 2:
                /**
                 * 2 слага - категория города | гос инстанция
                 */
                if (in_array($this->parts[0], self::getCities())) {
                    $this->city = $this->parts[0];
                    if (in_array($this->parts[1], self::getCategories())) {
                        $this->category = $this->parts[1];
                        return new CategoryController;
                    } else {
                        if (in_array($this->parts[1], self::getGosInstans())) {
                            $this->gosInstans = $this->parts[1];
                            return new GosInstansController;
                        }
                    }
                }
                break;
            case 3:
                /**
                 * 3 слага - гос инстанция детальная
                 */
                if (in_array($this->parts[0], self::getCities())) {
                    $this->city = $this->parts[0];
                    if (in_array($this->parts[1], self::getCategories())) {
                        $this->category = $this->parts[1];
                        return new CategoryController;
                    } else {
                        if (in_array($this->parts[1], self::getGosInstans())) {
                            $this->gosInstans = $this->parts[1];
                            if (in_array($this->parts[2], self::getPosts())) {
                                $this->post = $this->parts[2];
                                return new PostController;
                            }
                        }
                    }
                }
                break;
            default:
                throw new \Exception("обработчик не найден");
        }
        return new DefaultController;
    }
    private static function getCities() : array {
        if (!Cache::has('cityRouteList'))
            Cache::put('cityRouteList', ["moskow", "piter", "krasnodar"], 60);
        return Cache::get('cityRouteList');
    }
    private static function getCategories() : array
    {
        if (!Cache::has('categoryRouteList'))
            Cache::put('categoryRouteList', ["autojurist", "bankrotstvo", "kredity"], 60);
        return Cache::get('categoryRouteList');
    }
    private static function getGosInstans() : array
    {
        if (!Cache::has('instansRouteList'))
            Cache::put('instansRouteList', ["gibdd", "prokuratura", "sudy"], 60);
        return Cache::get('instansRouteList');
    }
    private static function getPosts() : array
    {
        if (!Cache::has('postsRouteList'))
            Cache::put('postsRouteList', ["detal1", "detal2", "detal3"], 60);
        return Cache::get('postsRouteList');
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
    public function getPost() {
        return $this->post;
    }
    public function getParts() {
        return $this->parts;
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
