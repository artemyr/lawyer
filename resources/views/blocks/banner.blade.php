<div class="banner">
    <div class="container">
        <div class="banner__slide">
            <div class="banner__inner">
                <div class="banner__title">
                    {!! $banner->title !!}
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
            <picture>
                <source srcset="{{ $banner->bigImage }}" media="(min-width: 1025px)" />
                <source srcset="{{ $banner->averageImage }}" media="(min-width: 767px)" />
                <img src="{{ $banner->smallImage }}" />
            </picture>
        </div>
    </div>
</div>
