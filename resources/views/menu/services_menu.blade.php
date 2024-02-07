@foreach($L_categories as $category)

    @if ($category->children->count())
        <li class="dropdown-menu__item" js-service-menu="item" data-id="{{ $category->id }}">

            <div class="dropdown-menu__item-general-link">
                <svg class="dropdown-menu__icon"><use xlink:href="{{ asset('svg/sprite.svg#').$category->icon->code }}-small"></use></svg>
                <a class="" href="{{ (isset($userCity) ? "/$userCity->link/" : '/'). $category->link }}">{{ $category->name }}</a>
                <svg class="dropdown-menu__icon"><use xlink:href="{{ asset('svg/sprite.svg#arrow-2') }}"></use></svg>
            </div>

            <ul js-service-menu="child" class="dropdown-menu__child">
                @include('menu.services_menu', ['L_categories' => $category->children, 'is_child' => true])
            </ul>

            <template id="menu-services-template-{{ $category->id }}">
                <ul>
                    @include('menu.services_menu', ['L_categories' => $category->children, 'is_child' => true])
                </ul>
            </template>
        </li>
    @else
        @isset($is_child)
            <li><a href="{{ (isset($userCity) ? "/$userCity->link/" : '/'). $category->link }}">{{ $category->name }}</a></li>
            @continue
        @endisset

        <li class="dropdown-menu__item">
            <svg class="dropdown-menu__icon"><use xlink:href="{{ asset('svg/sprite.svg#').$category->icon->code }}-small"></use></svg>
            <a class="" href="{{ (isset($userCity) ? "/$userCity->link/" : '/'). $category->link }}">{{ $category->name }}</a>
        </li>
    @endif

@endforeach
