@extends('layouts.main')

@section('content')
    <div class="container">
        @include('includes.breadcrumbs')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p>Категория {{$category}}</p>
            </div>
        </div>
    </div>
@endsection
