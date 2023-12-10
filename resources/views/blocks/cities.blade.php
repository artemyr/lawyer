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
            @foreach($G_cities as $key => $city)
                <div class="cities__item" @if ($key > 23) style="display: none" @endif>
                    <a href="{{ $city->link . "?setCity={$city->link}" }}">{{ $city->name }}</a>
                </div>
            @endforeach
        </div>
    </div>
</div>
