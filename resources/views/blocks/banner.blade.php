<div class="container">
    <div class="banner">
        <div class="banner__slide">
            <div class="banner__inner">
                <div class="banner__title">
                    {!! $banner_title !!}
                </div>
                <div>
                    <a class="ui-btn ui-btn-arrow">
                        <span>Заказать звонок</span>
                        <svg>
                            <use xlink:href="{{ asset('svg/sprite.svg#arrow-1') }}"></use>
                        </svg>
                    </a>
                </div>
            </div>
            <img src="{{ $banner }}">
        </div>
    </div>
</div>
