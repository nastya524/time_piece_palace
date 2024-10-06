<?php
    use services\Helper;
    Helper::checkUser();
?>
    <main class="content">
        <section class="section container">
            <div class="section__body section__body--non-border">
                <div class="registration">
                    <div class="registration__content">
                        <h1 class="registration__title">Регистрация</h1>

                        <form class="form-registration" action="/auth/registration" method="post">
                            <div class="form-registration__wrapper">
                                <label class="visually-hidden" for="login">Электронная почта</label>
                                <input
                                        class="form-registration__input input"
                                        type="email"
                                        name="email"
                                        placeholder="E-mail"
                                        minlength="3"
                                        value="<?php echo Helper::old('email') ?>"
                                    <?= Helper::validationErrorAttr('email'); ?>
                                        required
                                >

                            </div>
                            <div class="form-registration__wrapper">
                                <label class="visually-hidden" for="password">Пароль</label>
                                <input
                                        class="form-registration__input input"
                                        type="password"
                                        name="password"
                                        placeholder="Пароль"
                                        minlength="8"
                                        maxlength="32"
                                        <?= Helper::validationErrorAttr('password'); ?>
                                        required
                                >
    <!--                            <a href="#" class="user-pass-control"></a>-->
                            </div>

                            <div class="form-registration__wrapper">
                                <label class="visually-hidden" for="user-password-confirm">Подтверждение пароля</label>
                                <input
                                        class="form-registration__input input"
                                        type="password"
                                        name="password_confirm"
                                        placeholder="Подтверждение пароля"
                                        minlength="8"
                                        maxlength="32"
                                        required
                                >
    <!--                            <a href="#" class="user-pass-control"></a>-->
                            </div>

                            <div class="form-registration__button-wrapper">
                                <button id="reg-button" class="form-registration__button button" type="submit">Зарегистрироваться</button>
                            </div>
                        </form>
                        <span class="registration__question">Уже есть аккаунт?</span>
                        <a class="registration__link button button--small" href="/log-in">Войти</a>
                    </div>
                </div>
            </div>
        </section>
    </main>