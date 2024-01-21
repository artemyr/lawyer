@if(isset($breadcrumbs) && $breadcrumbs instanceof App\Models\DTO\Breadcrumbs)
<div class="breadcrumbs">
    <div class="breadcrumbs__wrapper">
        @foreach($breadcrumbs->get() as $key => $breadcrumb)
            @if ($key > 0)
                <svg class="dropdown-menu__icon"><use xlink:href="{{ asset('svg/sprite.svg#arrow-6') }}"></use></svg>
            @endif
            @if(($key + 1) === $breadcrumbs->count())
                <span>{{ $breadcrumb->title }}</span>
            @else
                <a href="{{ $breadcrumb->link }}">{{ $breadcrumb->title }}</a>
            @endif

        @endforeach
    </div>
</div>
@endif
