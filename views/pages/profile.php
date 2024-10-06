<main class="content">
    <section class="section container">
        <div class="section__body ">
            <div class="profile">
                <div class="profile__content">
                    <h1 class="profile__title">Профиль пользователя <?php print_r($_SESSION['user']["email"])?></h1>
                    <div class="profile__forms-wrapper">
                        <?php
                        if ($_SESSION['user']['role'] == 1) {
                            ?>
                            <form class="profile__form" action="/admin-panel" method="get">
                                <button class="profile__button button" type="submit">Админ Панель</button>
                            </form>
                            <?php
                        }
                        ?>
                        <form class="profile__form" action="/auth/logout" method="post">
                            <button class="profile__button button" type="submit">Выйти</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>