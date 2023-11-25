<div class="container">
    <div class="header">
        <div class="header__left">
            <a href="{{ route('main') }}">
                <svg class="logo">
                    <use xlink:href="{{ asset('svg/sprite.svg#logo') }}"></use>
                </svg>
            </a>
            city
        </div>
        @include('menu.menu')
        <div class="header__right">
            <div class="header__phone-lang">
                <div class="">
                    number
                </div>
                <div class="">
                    lang
                </div>
            </div>
            <div class="btn">
                Заказать звонок
            </div>
        </div>
    </div>
</div>
