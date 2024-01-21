<?php

namespace App\Services\DynamicUrl\Helpers;

use App\Models\DTO\Breadcrumbs;
use Illuminate\Support\Facades\Cache;

abstract class DynamicUrlHelperAbstract
{
    protected string $url;
    protected array $slags;
    protected string $city;
    protected string $category;
    protected string $gosInstans;

    /**
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
        $this->slags = explode('/', $url);
    }

    protected function getCities(): array
    {
        return Cache::get('cityRouteList');
    }
    protected function getCategories(): array
    {
        return Cache::get('categoryRouteList');
    }
    protected function getGosInstanses(): array
    {
        return Cache::get('instansRouteList');
    }
    public function getCity(): string
    {
        return $this->city;
    }
    public function getCategory(): string
    {
        return $this->category;
    }
    public function getGosInstanse(): string
    {
        return $this->gosInstans;
    }

    /**
     * @return Breadcrumbs
     */
    public function getBreadcrumbs(): Breadcrumbs
    {
        $crumbs = new Breadcrumbs();
        $parts = [];

        // строим ссылки
        foreach ($this->slags as $key => $slag) {
            if ($key > 0) {
                $parts[$key] = $parts[$key - 1] . "/" . $this->slags[$key];
            } else {
                $parts[$key] = $slag;
            }
        }

        // оборачиваем в объект
        foreach ($this->slags as $key => $slag) {
            $crumbs->add(
                link: "/" . $parts[$key] . "/",
                title: $slag
            );
        }

        return $crumbs;
    }
}
