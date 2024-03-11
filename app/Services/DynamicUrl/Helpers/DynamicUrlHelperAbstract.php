<?php

namespace App\Services\DynamicUrl\Helpers;

use App\Models\Category;
use App\Models\City;
use App\Models\DTO\Breadcrumbs;
use App\Models\InstationType;
use Illuminate\Support\Facades\Cache;

abstract class DynamicUrlHelperAbstract
{
    protected string $url;
    protected array $slags;
    protected string $citySlug;
    protected City $city;
    protected string $categorySlug;
    protected Category $category;
    protected string $gosInstansSlug;
    protected InstationType $instation;

    public const INSTATIONS_SLUG = 'instation';

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

    public function getCity(): ?City
    {
        if (empty($this->citySlug)) {
            return null;
        }

        if (empty($this->city)) {
            $this->city = City::where('link', $this->citySlug)->first();
        }

        return $this->city;
    }
    public function getCategory(): Category
    {
        if (empty($this->category)) {
            $this->category = Category::where('link', $this->categorySlug)->first();
        }

        return $this->category;
    }
    public function getGosInstanse(): InstationType
    {
        if (empty($this->instation)) {
            $this->instation = InstationType::where('link', $this->gosInstansSlug)->first();
        }

        return $this->instation;
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

    protected function isCity(string $slug): bool
    {
        return in_array($slug, $this->getCities());
    }
    protected function isCategory(string $slug): bool
    {
        return in_array($slug, $this->getCategories());
    }
    protected function isGosInstanse(string $slug): bool
    {
        return in_array($slug, $this->getGosInstanses());
    }
}
