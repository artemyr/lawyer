<div class="form-2">
    <div class="form-2__left">
        <div class="form-2__title">
            У вас остались <span>вопросы?</span>
        </div>
        <div class="form-2__text">
            Заполните форму и получите профессиональную консультацию юриста!
        </div>
    </div>
    <div class="form-2__right">
        <form action="">
            <input type="text" placeholder="Имя">
            <input type="text" placeholder="Телефон">

            <a class="ui-btn ui-btn-arrow ui-btn-arrow_white">
                <span>Получить колнслуьтацию</span>
                <svg>
                    <use xlink:href="{{ asset('svg/sprite.svg#arrow-5') }}"></use>
                </svg>
            </a>

            <div class="form-2__sign">
                <svg>
                    <use xlink:href="{{ asset('svg/sprite.svg#blue-checkbox') }}"></use>
                </svg>
                <p>
                    Нажимая на кнопку, я соглашаюсь с политикой обработки<br> <a href="{{ route('policy') }}"> персональных данных</a>
                </p>
            </div>
        </form>
    </div>
</div>
