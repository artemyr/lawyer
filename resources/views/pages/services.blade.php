@extends('layouts.main')

@section('content')

<div class="services-page">
    <div class="container">
        <div class="services-page__wrapper">
            @include('menu.services_page_list')
        </div>
    </div>
</div>

@include('blocks.form-2')

@endsection
