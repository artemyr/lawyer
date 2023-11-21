модалки
<ul>
    @foreach($G_cities as $city)
        <li>
            <a href="{{ $city->link }}">{{ $city->name }}</a>
        </li>
    @endforeach
</ul>
