@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <p>
                @foreach($breadcrumbs as $breadcrumb)
                    -><a href="{{ $breadcrumb['link'] }}">{{ $breadcrumb['name'] }}</a>
                @endforeach
            </p>
            <div class="col-md-8">
                <p>{{$city}}</p>
                <p>Категории</p>
                @foreach($categories as $category)
                    <li>
                        <a href="{{ $category }}/">{{ $category }}</a>
                    </li>
                @endforeach
                <p>Инстанции</p>
                @foreach($instans as $instan)
                    <li>
                        <a href="{{ $instan }}/">{{ $instan }}</a>
                    </li>
                @endforeach
            </div>
        </div>
    </div>
@endsection
