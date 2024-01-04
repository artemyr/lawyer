<div class="footer">
    <div class="container">
        <div class="footer_top">
            <div>
                <a href="{{ isset($userCity) ? '/' . $userCity->link : route('main') }}">
                    <svg class="logo">
                        <use xlink:href="{{ asset('svg/sprite.svg#logo-footer') }}"></use>
                    </svg>
                </a>
            </div>
            <div>
                <div class="">телефон</div>
                <div class="">кнопки</div>
            </div>
        </div>
    </div>
</div>
