<div class="services">
    <div class="container">
        <div class="article-1">
            <div>
                <div class="title-1">
                    Наша <span>специализация</span>
                </div>
            </div>
            <div>
                Большинство наших юристов специализируются<br>
                на отдельных областях права, что позволяет быстро решать<br>
                даже самые сложные вопросы и добиваться успеха в более,<br>
                чем в 97% дел наших клиентов!
            </div>
        </div>
        <div class="services__list">
            @foreach($G_categories as $category)
                <a class="services__item" href="{{ ($city->link ?? '') .'/'. $category->link }}">
                    <span>{{ $category->name }}</span>
                </a>
            @endforeach
        </div>
    </div>
</div>
