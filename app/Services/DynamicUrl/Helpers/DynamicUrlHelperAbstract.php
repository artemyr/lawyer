<?php

namespace App\Services\DynamicUrl\Helpers;

use App\Http\Middleware\App\GlobalVarsMiddleware;
use App\Models\Category;
use App\Models\City;
use App\Models\DTO\Breadcrumbs;
use App\Models\Instation;
use App\Models\InstationType;

abstract class DynamicUrlHelperAbstract
{
    protected string $url;
    protected array $slags;

    protected string $citySlug;
    protected City $city;

    protected string $categorySlug;
    protected Category $category;

    protected string $gosInstansTypeSlug;
    protected InstationType $instationType;

    protected string $gosInstationSlug;
    protected Instation $gosInstation;

    public const INSTATIONS_SLUG = 'instation';

    /**
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
        $this->slags = explode('/', $url);
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
    public function getCategory(): ?Category
    {
        if (empty($this->categorySlug)) {
            return null;
        }

        if (empty($this->category)) {
            $this->category = Category::where('link', $this->categorySlug)->first();
        }

        return $this->category;
    }
    public function getGosInstanseType(): ?InstationType
    {
        if (empty($this->gosInstansTypeSlug)) {
            return null;
        }

        if (empty($this->instationType)) {
            $this->instationType = InstationType::where('link', $this->gosInstansTypeSlug)->first();
        }

        return $this->instationType;
    }

    public function getGosInstation(): ?Instation
    {
        if (empty($this->gosInstationSlug)) {
            return null;
        }

        if (empty($this->gosInstation)) {
            $this->gosInstation = Instation::where('link', $this->gosInstationSlug)->first();
        }

        return $this->gosInstation;
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
        return in_array($slug, GlobalVarsMiddleware::$cityRouteList);
    }
    protected function isCategory(string $slug): bool
    {
        return in_array($slug, GlobalVarsMiddleware::$categoryRouteList);
    }
    protected function isGosInstanseType(string $slug): bool
    {
        return in_array($slug, GlobalVarsMiddleware::$instationTypeRouteList);
    }
    protected function isGosInstance(string $slug): bool
    {
        return in_array($slug, GlobalVarsMiddleware::$instationsRouteList);
    }
}
