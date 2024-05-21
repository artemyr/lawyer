@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="article-1">
            <div>
                <div class="title-1">
                    {{ $page->pageTitle }}
                </div>
            </div>
        </div>

        <div class="gos-instance-detail">
            <div class="gos-instance-detail__left">
                <div class="gos-instance-detail__icon">
                    @if($instation->icon->type === 'png')
                        <img src="{{ asset('image/small/' . $instation->icon->code) }}" alt="">
                    @elseif($instation->icon->type === 'svg')
                        <svg>
                            <use xlink:href="{{ asset('svg/sprite.svg#' . $instation->icon->code) }}"></use>
                        </svg>
                    @endif
                </div>
            </div>
            <div class="gos-instance-detail__right">
                <div class="gos-instance-detail__desc">
                    <div class="gos-instance-detail__title">
                        Описание
                    </div>
                    <div class="gos-instance-detail__desc-body">
                        Судебный участок № 48 расположен по адресу Москва, Маршала Савицкого, д. 2. (смотреть на карте). Находится в Новомосковский АО Москвы. Относится к судебному району — Щербинский, и муниципальному району — Поселения Воскресенское. Представляет судья — Кроморенко Ольга Владимировна, к которому можно обратиться в рабочее время суда с понедельника по четверг с 9–00 до 18–00 в пятницу с 9–00 до 16–45. Ниже можете узнать подробную информацию о телефонах и электроной почте участка и поделится ими со своими друзьями и знакомыми.Специализация суда: Мировой суд
                    </div>
                </div>
                <div class="gos-instance-detail__props">
                    <div class="gos-instance-detail__title">
                        Телефоны, график работы, судьи
                    </div>
                    <div class="gos-instance-detail__props-body">
                        @foreach($instation->props as $prop)
                        <div class="gos-instance-detail__props-body-item">
                            <span>{{ $prop->getLabel() }}:</span> {{ $prop->getValue() }}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        @include('blocks.form.instation-form')
    </div>

    @include('blocks.map', ['lon' => $map->lon, 'lat' => $map->lat, 'zoom' => $map->zoom])

    <div class="container">
        @include('blocks.form.bottom-form')
    </div>

    Другие учреждения

    @include('blocks.cities')

@endsection
