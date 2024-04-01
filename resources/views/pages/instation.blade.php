@extends('layouts.main')

@section('content')

<div class="container">
    <div class="article-1">
        <div>
            <div class="title-1">
                Мировые суды Москвы
            </div>
        </div>
        <div>
            Мировые суды Москвы и ближайшего подмосковья<br> с адресами, режимом работы, судьями сгруппированые<br> по административным округам
        </div>
    </div>
    <div class="form">
        <div class="form__wrapper">
            <div class="form__left">
                <div class="form__title">
                    <div class="title-1">
                        Позвоните <span>юристам</span>
                    </div>
                    <div class="label-1">Если вопрос простой и вас устроит ответ юриста общей практики</div>
                </div>
                <div class="form__phones">
                    <div class="phones">
                        <div class="phones__list">
                            <div class="">
                                <div class="phones__phone">
                                    +7 (495) 127-07-23
                                </div>
                                <div class="phones__address-list">
                                    <div class="phones__address">
                                        <svg>
                                            <use xlink:href="{{ asset('svg/sprite.svg#point') }}"></use>
                                        </svg>
                                        <span>Для жителей Москвы и Московской области</span>
                                    </div>
                                    <div class="phones__address">
                                        <svg>
                                            <use xlink:href="{{ asset('svg/sprite.svg#clock') }}"></use>
                                        </svg>
                                        <span>Ежедневно с 08:00 до 18:00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form__right">
                <div class="form__title">
                    <div class="title-1">
                        Напишите <span>юристу</span>
                    </div>
                    <div class="label-1">Пожалуйста укажите свои контактные данные, чтобы юрист мог вам ответить</div>
                </div>
                <form class="">
                    <textarea class="ui-input" placeholder="Вопрос"></textarea>
                    <div class="form__submit">
                        <label class="label-1">
                            <input type="checkbox">
                            Нажимая на кнопку, я соглашаюсь с политикой обработки персональных данных
                        </label>
                        <button class="ui-btn ui-btn-arrow" type="submit">
                            <span>Отправить</span>
                            <svg>
                                <use xlink:href="{{ asset('svg/sprite.svg#arrow-1') }}"></use>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="article-1">
        <div>
            <div class="title-1">
                Гос. учреждения
            </div>
        </div>
        <div></div>
    </div>

    <div class="gos-instance">
        <div class="gos-instance__list">

            @foreach($instations as $instation)
                <div class="gos-instance-item">
                    <div class="gos-instance-item__image advantages-image">
                        @if(!empty($instation->icon->code))
                            @if($instation->icon->type === 'png')
                            <img src="{{ asset('image/small/' . $instation->icon->code) }}" alt="">
                            @elseif($instation->icon->type === 'svg')
                            <svg>
                                <use xlink:href="{{ asset('svg/sprite.svg#' . $instation->icon->code) }}"></use>
                            </svg>
                            @endif
                        @endif
                    </div>
                    <div class="gos-instance-item__props">
                        <a href="{{ $instation->link }}" class="gos-instance-item__link">
                            {{ $instation->name }}
                            <svg class="gos-instance-item__arrow">
                                <use xlink:href="{{ asset('svg/sprite.svg#arrow-8') }}"></use>
                            </svg>
                        </a>
                        <div class="gos-instance-item__prop"><span>Район ·</span> Поселение Московский</div>
                        <div class="gos-instance-item__prop"><span>Адрес ·</span> ул. Гольяновская, д. 7А, корп. 4</div>
                        <div class="gos-instance-item__prop"><span>Телефон ·</span> 8 (900) 227-12-65</div>
                        <div class="gos-instance-item__prop"><span>Режим работы ·</span> пн-чт с 9-00 до 18-00, пт с 9-00 до 16-45</div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>

@endsection
