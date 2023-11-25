<div class="cities">
    <div class="container">
        <div class="cities__list">
            @foreach($G_cities as $city)
                <div class="cities__item">
                    <a href="{{ $city->link }}">{{ $city->name }}</a>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="footer">
    <div class="container">
        подвал
    </div>
</div>
