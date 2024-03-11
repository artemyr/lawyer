<?php

namespace App\Http\Middleware\App;

use App\Models\Category;
use App\Models\City;
use App\Models\InstationType;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;

class GlobalVarsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    private $categoryRouteList;
    public function handle(Request $request, Closure $next)
    {
        $this->categories();
        $this->cities();
        $this->instanses();
        return $next($request);
    }

    private function categories (): void
    {
        // если кеш с категориями пуст
        // запрашиваем все категории с подкатегориями
        if (!Cache::has('G_categories'))
            Cache::put('G_categories',
                Category::with('children')
                    ->where('parent_id', 0)
                    ->where('active', true)
                    ->orderBy('sort')
                    ->get(),
            60);

        // запоминаем все слаги в кеш
        if (!Cache::has('categoryRouteList')) {
            $this->getCategoryRoutList(Cache::get('G_categories'));
            Cache::put('categoryRouteList', $this->categoryRouteList, config('app.routeListCacheTtl'));
        }

        // передаем категории в шаблоны
        View::share('G_categories', Cache::get('G_categories'));
    }

    private function getCategoryRoutList($G_categories): void
    {
        foreach ($G_categories as $category) {
            $this->categoryRouteList[] = $category->link;
            if ($category->children->count()) {
                $this->getCategoryRoutList($category->children);
            }
        }
    }

    private function cities(): void
    {
        if (!Cache::has('G_cities')) {
            Cache::put('G_cities', City::get(), 60);
        }

        if (!Cache::has('cityRouteList')) {
            $cityRouteList = [];
            foreach (Cache::get('G_cities') as $city) {
                $cityRouteList[] = $city->link;
            }
            Cache::put('cityRouteList', $cityRouteList, config('app.routeListCacheTtl'));
        }

        View::share('G_cities', Cache::get('G_cities'));
    }

    private function instanses(): void
    {
        if (!Cache::has('instansRouteList')) {
            $instanciesRouteList = [];
            foreach (InstationType::get() as $instation) {
                $instanciesRouteList[] = $instation->link;
            }
            Cache::put('instansRouteList', $instanciesRouteList, config('app.routeListCacheTtl'));
        }
    }
}
