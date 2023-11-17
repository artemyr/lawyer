@extends('layouts.main')

@section('content')
    <div class="container">
        <p>
            @foreach($breadcrumbs as $breadcrumb)
                -><a href="{{ $breadcrumb['link'] }}">{{ $breadcrumb['name'] }}</a>
            @endforeach
        </p>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p>Гос инстанция разводящая {{$instance}}</p>
                @foreach($posts as $post)
                    <li>
                        <a href="{{ $post }}/">{{ $post }}</a>
                    </li>
                @endforeach
            </div>
        </div>
    </div>
@endsection
