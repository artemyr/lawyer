@foreach($G_categories as $category)

    @if ($category->children->count())
        <div class="services-page__item">
            <a href="{{ (isset($userCity) ? "/$userCity->link/" : '/'). $category->link }}">
                <div class="services-page__category-title">
                    <svg class="dropdown-menu__icon"><use xlink:href="{{ asset('svg/sprite.svg#').$category->icon->code }}"></use></svg>
                    {{ $category->name }}
                </div>
            </a>
            <ul>
                @include('menu.services_page_list', ['G_categories' => $category->children, 'is_child' => true])
            </ul>
        </div>
    @else
        @isset($is_child)
            <li><a href="{{ (isset($userCity) ? "/$userCity->link/" : '/'). $category->link }}">{{ $category->name }}</a></li>
            @continue
        @endisset

        <div class="services-page__item">
            <a href="{{ (isset($userCity) ? "/$userCity->link/" : '/'). $category->link }}">
                <div class="services-page__category-title">
                    <svg class="dropdown-menu__icon"><use xlink:href="{{ asset('svg/sprite.svg#').$category->icon->code }}"></use></svg>
                    {{ $category->name }}
                </div>
            </a>
        </div>
    @endif

@endforeach
