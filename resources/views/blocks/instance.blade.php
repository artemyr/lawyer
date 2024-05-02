<div class="container">
    <div class="article-1">
        <div>
            <div class="title-1">
                Государственные <br><span>инстанции города</span>
            </div>
        </div>
        <div>
            <p>Все суды, полиция, налоговая и трудовая инспекции,<br> судебные приставы и таможенные органы, это лишь
                малая<br> часть государственных ведомств, где мы готовы<br> представлять интересы своих клиентов</p>
        </div>
    </div>

    <div class="instance">
        <div class="instance__list">

            @foreach($instationTypes as $instationType)
                <a class="instance__item" href="{{ "/$citySlug/$instationSlug/{$instationType->link}/" }}">
                    @if($instationType->icon)
                    <div class="advantages-image">
                        <img src="{{ asset('image/small/'. $instationType->icon->code) }}" alt="">
                    </div>
                    @endif
                    {{ $instationType->name }}
                </a>
            @endforeach

        </div>
    </div>

</div>
