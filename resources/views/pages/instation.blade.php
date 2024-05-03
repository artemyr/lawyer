@extends('layouts.main')

@section('content')

<div class="container">
    <div class="article-1">
        <div>
            <div class="title-1">
                {{ $page->pageTitle }}
            </div>
        </div>
        <div>
            Мировые суды Москвы и ближайшего подмосковья<br> с адресами, режимом работы, судьями сгруппированые<br> по административным округам
        </div>
    </div>
    @include('blocks.form.instation-form')
</div>

@if (count($instations) > 0)
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
                    @if(!empty($instation->icon->code))
                        <div class="gos-instance-item__image advantages-image">
                            @if($instation->icon->type === 'png')
                            <img src="{{ asset('image/small/' . $instation->icon->code) }}" alt="">
                            @elseif($instation->icon->type === 'svg')
                            <svg>
                                <use xlink:href="{{ asset('svg/sprite.svg#' . $instation->icon->code) }}"></use>
                            </svg>
                            @endif
                        </div>
                    @endif
                    <div class="gos-instance-item__props">
                        <a href="{{ "/$citySlug/$instationSlug/{$instationTypeSlug}/{$instation->link}/" }}" class="gos-instance-item__link">
                            {{ $instation->name }}
                            <svg class="gos-instance-item__arrow">
                                <use xlink:href="{{ asset('svg/sprite.svg#arrow-8') }}"></use>
                            </svg>
                        </a>
                        <div class="gos-instance-item__prop"><span>Район ·</span>{{ $instation->district }}</div>
                        <div class="gos-instance-item__prop"><span>Адрес ·</span> {{ $instation->address }}</div>
                        <div class="gos-instance-item__prop"><span>Телефон ·</span>{{ $instation->telephone }}</div>
                        <div class="gos-instance-item__prop"><span>Режим работы ·</span>{{ $instation->opening_hours }}</div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
@endif

@include('blocks.cities')

<div class="container">
    @include('blocks.form.bottom-form')
</div>

@endsection
