<p>
    @foreach($breadcrumbs as $breadcrumb)
        -><a href="{{ $breadcrumb['link'] }}">{{ $breadcrumb['name'] }}</a>
    @endforeach
</p>
