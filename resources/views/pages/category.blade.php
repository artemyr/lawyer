@extends('layouts.main')

@section('content')
    @include('blocks.banner')
    @include('blocks.form')
    @include('blocks.resolve')
    @include('blocks.howItWork')
    @include('blocks.services')
    @include('blocks.examples')
    @include('blocks.advantages')

    @include('blocks.' . $dynamicBlock)

    @include('blocks.ourJurists')
    @include('blocks.guardInterests')
    @include('blocks.recommends')
    @include('blocks.articles')
    @include('blocks.faq')
    @include('blocks.form-2')
@endsection
