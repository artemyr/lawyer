<?php

namespace App\Services\DynamicUrl;

use App\Http\Controllers\CityController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Cache;

class UrlValidator
{
    private $page;
    private $cities;
    private $parts;
    private $slagsCount;
    public function __construct($page)
    {
        if (!Cache::has('cityRouteList'))
            Cache::put('cityRouteList', ["moskow", "piter", "a"], 60);

        $this->page = $page;
        $this->parts = explode('/', $page);
        $this->slagsCount = count($this->parts);
        $this->cities = Cache::get('cityRouteList');
    }
    public function validate()
    {
        switch ($this->slagsCount) {
            case 1:
                if (in_array($this->page, $this->cities)) {
                    return new CityController;
                }
                break;
            case 3:
                return new PostController;
                break;
            default:
                throw new \Exception("обработчик не найден");
        }
    }
}
