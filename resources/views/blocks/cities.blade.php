<div class="cities">
    <div class="container">

        <div class="article-1">
            <div>
                <div class="title-1">
                    Юридические услуги <br><span>онлайн, по телефону или лично</span>
                </div>
            </div>
            <div>
                <p>Выберите свой город или населённый пункт, <br>чтобы получить консультацию юриста, который работает <br>в вашей местности</p>
            </div>
        </div>

        <div class="cities__list">
            @foreach($G_cities as $city)
                <div class="cities__item">
                    <a href="{{ $city->link }}">{{ $city->name }}</a>
                </div>
            @endforeach
        </div>
    </div>
</div>
