<div class="services">
    <div class="container">
        <div class="article-1">
            <div>
                <div class="title-1">
                    Наша <span>специализация</span>
                </div>
            </div>
            <div>
                Большинство наших юристов специализируются<br>
                на отдельных областях права, что позволяет быстро решать<br>
                даже самые сложные вопросы и добиваться успеха в более,<br>
                чем в 97% дел наших клиентов!
            </div>
        </div>
        <div class="services__list">
            @foreach($L_categories as $key => $category)
                <a class="services__item" href="{{ (isset($userCity) ? "/$userCity->link/" : '/'). $category->link }}" @if ($key > 23) style="display: none" @endif>
                    @if (!empty($category->icon->code))
                    <svg>
                        <use xlink:href="{{ asset('svg/sprite.svg#' . $category->icon->code) }}"></use>
                    </svg>
                    @endif
                    <span>{{ $category->name }}</span>
                </a>
            @endforeach
        </div>
        <div class="services__footer">
            <a class="ui-btn ui-btn-arrow">
                <span>Показать еще</span>
                <svg>
                    <use xlink:href="{{ asset('svg/sprite.svg#button-plus') }}"></use>
                </svg>
            </a>
        </div>
    </div>
</div>
