<?php

namespace App\Http\Middleware\App;

use App\Models\Category;
use App\Models\City;
use App\Models\Instation;
use App\Models\InstationType;
use App\Services\DynamicUrl\Enum\CacheTypeEnum;
use Closure;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;

class GlobalVarsMiddleware
{
    public static Collection $G_cities;
    public static Collection $G_categories;
    public static array $categoryRouteList;
    public static array $cityRouteList;
    public static array $instationTypeRouteList;
    public static array $instationsRouteList;

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next)
    {
        $this->categories();
        $this->cities();
        $this->instationsTypes();
        $this->instations();
        return $next($request);
    }

    private function categories(): void
    {
        // если кеш с категориями пуст
        // запрашиваем все категории с подкатегориями
        if (Cache::has(CacheTypeEnum::G_CATEGORIES->value)) {
            self::$G_categories = Cache::get(CacheTypeEnum::G_CATEGORIES->value);
        } else {
            self::$G_categories = Category::with('children')
                ->where('parent_id', 0)
                ->where('active', true)
                ->orderBy('sort')
                ->get();

            Cache::put(CacheTypeEnum::G_CATEGORIES->value, self::$G_categories, 60);
        }

        // запоминаем все слаги в кеш
        if (Cache::has(CacheTypeEnum::CATEGORY_ROUTE_LIST->value)) {
            self::$categoryRouteList = Cache::get(CacheTypeEnum::CATEGORY_ROUTE_LIST->value);
        } else {
            $this->getCategoryRoutList(self::$G_categories);
            Cache::put(CacheTypeEnum::CATEGORY_ROUTE_LIST->value, self::$categoryRouteList, config('app.routeListCacheTtl'));
        }

        // передаем категории в шаблоны
        View::share(CacheTypeEnum::G_CATEGORIES->value, self::$G_categories);
    }

    private function getCategoryRoutList(Collection $G_categories): void
    {
        foreach ($G_categories as $category) {
            self::$categoryRouteList[] = $category->link;
            if ($category->children->count()) {
                $this->getCategoryRoutList($category->children);
            }
        }
    }

    private function cities(): void
    {
        if (Cache::has(CacheTypeEnum::G_CITIES->value)) {
            self::$G_cities = Cache::get(CacheTypeEnum::G_CITIES->value);
        } else {
            self::$G_cities = City::get();
            Cache::put(CacheTypeEnum::G_CITIES->value, self::$G_cities, 60);
        }

        if (Cache::has(CacheTypeEnum::CITY_ROUTE_LIST->value)) {
            self::$cityRouteList = Cache::get(CacheTypeEnum::CITY_ROUTE_LIST->value);
        } else {
            foreach (self::$G_cities as $city) {
                self::$cityRouteList[] = $city->link;
            }
            Cache::put(CacheTypeEnum::CITY_ROUTE_LIST->value, self::$cityRouteList, config('app.routeListCacheTtl'));
        }

        View::share(CacheTypeEnum::G_CITIES->value, self::$G_cities);
    }

    private function instationsTypes(): void
    {
        if (Cache::has(CacheTypeEnum::INSTATION_TYPE_ROUTE_LIST->value)) {
            self::$instationTypeRouteList = Cache::get(CacheTypeEnum::INSTATION_TYPE_ROUTE_LIST->value);
        } else {
            foreach (InstationType::get() as $instation) {
                self::$instationTypeRouteList[] = $instation->link;
            }
            Cache::put(CacheTypeEnum::INSTATION_TYPE_ROUTE_LIST->value, self::$instationTypeRouteList, config('app.routeListCacheTtl'));
        }
    }

    private function instations(): void
    {
        if (Cache::has(CacheTypeEnum::INSTATIONS_ROUTE_LIST->value)) {
            self::$instationsRouteList = Cache::get(CacheTypeEnum::INSTATIONS_ROUTE_LIST->value);
        } else {
            foreach (Instation::get() as $instation) {
                self::$instationsRouteList[] = $instation->link;
            }
            Cache::put(CacheTypeEnum::INSTATIONS_ROUTE_LIST->value, self::$instationsRouteList, config('app.routeListCacheTtl'));
        }
    }
}
