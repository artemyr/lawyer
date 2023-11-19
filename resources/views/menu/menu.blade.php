<nav id="top-menu">
    <ul>
        <li>
            <a href="{{ route('services') }}">Услуги</a>
{{--            <ul>--}}
{{--                @foreach($G_categories as $category)--}}
{{--                    @if ($category->children->count())--}}
{{--                        <li class="dropdown-menu__item">--}}
{{--                                        <svg class="dropdown-menu__icon"><use xlink:href="{{ asset('img/svg/sprite.svg#').$category->icon }}"></use></svg>--}}
{{--                            <a class="" href="{{ $category->link }}">{{ $category->name }}</a>--}}
{{--                            <div class="dropdown-menu__subtitle">--}}
{{--                                {{ $category->subtitle ?? '' }}--}}
{{--                            </div>--}}
{{--                            <ul class="dropdown-menu__posts">--}}
{{--                                @include('menu.menu', ['G_categories' => $category->children, 'is_child' => true])--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                    @else--}}
{{--                        @isset($is_child)--}}
{{--                            <li><a href="{{ $category->link }}">{{ $category->name }}</a></li>--}}
{{--                            @continue--}}
{{--                        @endisset--}}

{{--                        <li class="dropdown-menu__item">--}}
{{--                                        <svg class="dropdown-menu__icon"><use xlink:href="{{ asset('img/svg/sprite.svg#').$category->icon }}"></use></svg>--}}
{{--                            <a class="" href="{{ $category->link }}">{{ $category->name }}</a>--}}
{{--                            <div class="dropdown-menu__subtitle">--}}
{{--                                {{ $category->subtitle ?? '' }}--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            </ul>--}}
        </li>
        <li>
            <a href="">Блог</a>
        </li>
        <li>
            <a href="">Контакты</a>
        </li>
    </ul>
</nav>
