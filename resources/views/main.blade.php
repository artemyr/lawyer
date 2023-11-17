@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p>Города</p>
                @foreach($cities as $city)
                    <li>
                        <a href="{{ $city }}/">{{ $city }}</a>
                    </li>
                @endforeach
            </div>
        </div>
    </div>
@endsection
