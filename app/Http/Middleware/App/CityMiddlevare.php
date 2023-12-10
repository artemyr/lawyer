<?php

namespace App\Http\Middleware\App;

use Closure;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\View;

class CityMiddlevare
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
        $city = $request->get('setCity');
        if (!empty($city)) {
            if (in_array($city, Cache::get('cityRouteList'))) {
                Cookie::queue('city', $request->get('setCity'), 60);
            }
        }

        if ($request->route()->getName() === 'main') {
            $city = $request->cookie('city');
            if (!empty($city)) {
                if (in_array($city, Cache::get('cityRouteList'))) {
                    return redirect('/' . $city, 301);
                }
            }
        }

        $city = $request->cookie('city');
        if (!empty($city)) {
            /** @var Collection $cities */
            $cities = Cache::get('G_cities');
            $city = $cities->where('link', $city)->first();
            View::share('userCity', $city);
        }

        return $next($request);
    }
}
