<?php

namespace App\Services\DynamicUrl\Enum;

enum CacheTypeEnum: string
{
    case G_CATEGORIES = 'G_categories';
    case G_CITIES = 'G_cities';
    case CATEGORY_ROUTE_LIST = 'categoryRouteList';
    case CITY_ROUTE_LIST = 'cityRouteList';
    case INSTATION_TYPE_ROUTE_LIST = 'instationTypeRouteList';
    case INSTATIONS_ROUTE_LIST = 'instationsRouteList';
}
