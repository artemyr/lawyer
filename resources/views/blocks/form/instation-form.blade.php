<div class="form">
    <div class="form__wrapper">
        <div class="form__left">
            <div class="form__title">
                <div class="title-1">
                    Позвоните <span>юристам</span>
                </div>
                <div class="label-1">Если вопрос простой и вас устроит ответ юриста общей практики</div>
            </div>
            <div class="form__phones">
                <div class="phones">
                    <div class="phones__list">
                        <div class="">
                            <div class="phones__phone">
                                +7 (495) 127-07-23
                            </div>
                            <div class="phones__address-list">
                                <div class="phones__address">
                                    <svg>
                                        <use xlink:href="{{ asset('svg/sprite.svg#point') }}"></use>
                                    </svg>
                                    <span>Для жителей Москвы и Московской области</span>
                                </div>
                                <div class="phones__address">
                                    <svg>
                                        <use xlink:href="{{ asset('svg/sprite.svg#clock') }}"></use>
                                    </svg>
                                    <span>Ежедневно с 08:00 до 18:00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form__right">
            <div class="form__title">
                <div class="title-1">
                    Напишите <span>юристу</span>
                </div>
                <div class="label-1">Пожалуйста укажите свои контактные данные, чтобы юрист мог вам ответить</div>
            </div>
            <form class="">
                <input class="ui-input" placeholder="Имя">
                <input class="ui-input" placeholder="Телефон">
                <textarea class="ui-input" placeholder="Вопрос"></textarea>
                <div class="form__submit">
                    <label class="label-1">
                        <input type="checkbox">
                        Нажимая на кнопку, я соглашаюсь с политикой обработки персональных данных
                    </label>
                    <button class="ui-btn ui-btn-arrow" type="submit">
                        <span>Отправить</span>
                        <svg>
                            <use xlink:href="{{ asset('svg/sprite.svg#arrow-1') }}"></use>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
