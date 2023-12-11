@extends('layouts.main')

@section('content')
    инстанция разводная {{ $category->id }}

    @foreach($category->instations as $instation)
        {{ $instation->name }}<br>
    @endforeach

@endsection
