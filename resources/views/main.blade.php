@extends('layouts.main')

@section('content')
    @include('blocks.banner')
    @include('blocks.form.main-form')
    @include('blocks.resolve')
    @include('blocks.howItWork')
    @include('blocks.services')
    @include('blocks.examples')
    @include('blocks.advantages')
    @include('blocks.cities')
    @include('blocks.ourJurists')
    @include('blocks.guardInterests')
    @include('blocks.recommends')
    @include('blocks.articles')
    @include('blocks.faq')

    <div class="container">
        <div class="article-2" style="margin-bottom: 96px">
            <div>
                <div class="title-1">
                    Юридические услуги <span>в Краснодаре</span>
                </div>
            </div>
            <div class="text">
                Мы от души желаем, чтобы в вашей жизни происходило как можно меньше неприятностей. Однако порой они случаются, и тогда<br> нужен специалист по решению проблем.<br>
                Обратиться к услуге юриста нашей фирмы стоит в случае возникновения споров в гражданских вопросах. Стоимость юридических<br> услуг зависит от сложности дела, срочности и времени работы, квалификации и опыта юриста.<br>
                Квалифицированный адвокат окажет комплексную помощь, защитит ваши права, докажет невиновность. Адвокат имеет право<br> консультировать клиентов, готовить документы от их имени и представлять интересы подзащитных в судебных разбирательствах.<br>
            </div>
        </div>
        @include('blocks.form.bottom-form')
    </div>

@endsection
