@foreach($G_categories as $category)
    @if ($category->children->count())
        <li class="dropdown-menu__item" js-service-menu="item" data-id="{{ $category->id }}">
            <svg class="dropdown-menu__icon"><use xlink:href="{{ asset('svg/sprite.svg#').$category->icon }}"></use></svg>
            <a class="" href="{{ '/' .( $city->link ?? '') .'/'. $category->link }}">{{ $category->name }}</a>
            <svg class="dropdown-menu__icon"><use xlink:href="{{ asset('svg/sprite.svg#arrow-2') }}"></use></svg>

            <template id="menu-services-template-{{ $category->id }}">
                <ul>
                    @include('menu.services_menu', ['G_categories' => $category->children, 'is_child' => true])
                </ul>
            </template>
        </li>
    @else
        @isset($is_child)
            <li><a href="{{ '/' . ($city->link ?? '') .'/'. $category->link }}">{{ $category->name }}</a></li>
            @continue
        @endisset

        <li class="dropdown-menu__item" js-service-menu="item" data-id="{{ $category->id }}">
            <svg class="dropdown-menu__icon"><use xlink:href="{{ asset('svg/sprite.svg#').$category->icon }}"></use></svg>
            <a class="" href="{{ '/' . ($city->link ?? '') .'/'. $category->link }}">{{ $category->name }}</a>
        </li>
    @endif
@endforeach
