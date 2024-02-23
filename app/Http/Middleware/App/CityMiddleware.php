<?php

namespace App\Http\Middleware\App;

use Closure;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\View;

class CityMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next)
    {
        $cityId = $this->cityHandle($request);

        // если главная страница
        if ($request->route()->getName() === 'main') {

            // и в куках есть город
            $city = $request->cookie('city');
            if (!empty($city)) {

                // и он есть в списке роутов
                if (in_array($city, Cache::get('cityRouteList'))) {

                    // перенаправить туда
                    return redirect('/' . $city, 301);
                }
            }
        }

        $this->cityCategories($cityId);

        return $next($request);
    }

    private function cityHandle(Request $request): int
    {
        $resUserCityId = 1;

        $setCity = $request->get('setCity');

        // если пользователь устанавливает город
        if (!empty($setCity)) {

            // если он есть в списке роутов
            if (in_array($setCity, Cache::get('cityRouteList'))) {
                Cookie::queue('city', $request->get('setCity'), 60);

                // передаем в шаблон модель города пользователя
                /** @var Collection $cities */
                $cities = Cache::get('G_cities');
                $userCity = $cities->where('link', $setCity)->first();
                $resUserCityId = $userCity->id;
                View::share('userCity', $userCity);
            }

        // если просто просматривает любую страницу
        } else {
            // забираем город из его кук
            $userCitySlug = $request->cookie('city');
            if (!empty($userCitySlug)) {

                // передаем в шаблон модель города пользователя
                /** @var Collection $cities */
                $cities = Cache::get('G_cities');
                $userCity = $cities->where('link', $userCitySlug)->first();
                $resUserCityId = $userCity->id;
                View::share('userCity', $userCity);
            }
        }

        return $resUserCityId;
    }

    private function cityCategories(int $cityId): void
    {
        // достаем из кеша все категории
        $G_categories = Cache::get('G_categories');
        /** @var Collection $G_categories */
        /** @var Collection $categories */

        // достаем из коллекции категории либо этого города либо без города и без города сортируем в низ
        $categories = $G_categories->whereIn('city_id',[$cityId, 0])->sortByDesc('city_id');

        // берем корневые категории и сортируем их по полю sort
        View::share('L_categories', $categories->where('parent_id', 0)->sortBy('sort'));
    }
}
