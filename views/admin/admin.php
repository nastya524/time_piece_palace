
<?php
use core\models\Admin;
?>
    <main class="content">
        <section class="section container">
            <div class="section__body">
                <div class="admin-panel">
                    <h1 class="admin-panel__title">Панель администрирования</h1>
                    <div class="admin-panel__male-category">
                        <header class="admin-panel__header">
                            <h2 class="admin-panel__subtitle">Мужские часы</h2>
                            <div class="admin-panel__button-wrapper">
                                <button class="admin-panel__button button button--modal-admin openModalAddProduct">+ Добавить</button>
                            </div>
                        </header>
                        <div class="admin-panel__content">
                            <?php foreach (Admin::getAllProductsMale() as $item) { ?>
                                <div class="admin-panel__content-inner">
                                    <div class="admin-panel__image-wrapper">
                                        <h3 class="admin-panel__block-title">Фотография</h3>
                                        <img
                                                class="admin-panel__image"
                                                src="<?=$item['img_path']?>"
                                                alt="<?=$item['name_product']?>"
                                                title="<?=$item['name_product']?>"
                                                width="127" height="207" loading="lazy"
                                        >
                                    </div>
                                    <div class="admin-panel__block">
                                        <h3 class="admin-panel__block-title">Цена</h3>
                                        <h4><?=\services\Helper::addSpaceBasedOnLength($item['price'])?> р</h4>
                                        <h3 class="admin-panel__block-title">Описание</h3>
                                        <p><?=$item['description']?></p>
                                    </div>
                                    <div class="admin-panel__block">
                                        <h3 class="admin-panel__block-title">Наличие</h3>
                                        <h4>
                                            <?php if ($item['amoynt_product'] == 0) {
                                                ?>Нет в наличии<?php
                                            }
                                            else {
                                                ?>В наличии<?php
                                            }
                                            ?>
                                        </h4>
                                        <h3 class="admin-panel__block-title">О бренде</h3>
                                        <p><?=$item['brand_description']?></p>
                                    </div>
                                    <div class="admin-panel__block">
                                        <h3 class="admin-panel__block-title">Название</h3>
                                        <h4><?=$item['name_product']?></h4>
                                        <h3 class="admin-panel__block-title">Характеристики</h3>
                                        <p>
                                            Пол: Мужские<br>
                                            Пол: <?=$item['style']?><br>
                                            Страна: <?=$item['country']?><br>
                                            Водостойкость: <?=$item['water_resistance']?><br>
                                            Коллекция: <?=$item['style']?><br>
                                        </p>
                                    </div>
                                    <div class="admin-panel__block admin-panel__block--buttons">
                                        <button class="admin-panel__button button button--modal-admin openModalUpdateProduct" data-id-product="<?=$item['id']?>">Изменить</button>
                                        <form class="admin-panel__form-delete" action="/admin-panel/delete-product" method="post">
                                            <input type="hidden" name="id_product" value="<?=$item['id']?>">
                                            <button class="admin-panel__button button button--modal-admin">Удалить</button>
                                        </form>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="admin-panel__female-category">
                        <header class="admin-panel__header">
                            <h2 class="admin-panel__subtitle">Женские часы</h2>
                            <div class="admin-panel__button-wrapper">
                                <button class="admin-panel__button button button--modal-admin openModalAddProduct">+ Добавить</button>
                            </div>
                        </header>
                        <div class="admin-panel__content">
                            <?php foreach (Admin::getAllProductsFemale() as $item) { ?>
                                <div class="admin-panel__content-inner">
                                    <div class="admin-panel__image-wrapper">
                                        <h3 class="admin-panel__block-title">Фотография</h3>
                                        <img
                                                class="admin-panel__image"
                                                src="<?=$item['img_path']?>"
                                                alt="<?=$item['name_product']?>"
                                                title="<?=$item['name_product']?>"
                                                width="127" height="207" loading="lazy"
                                        >
                                    </div>
                                    <div class="admin-panel__block">
                                        <h3 class="admin-panel__block-title">Цена</h3>
                                        <h4><?=\services\Helper::addSpaceBasedOnLength($item['price'])?> р</h4>
                                        <h3 class="admin-panel__block-title">Описание</h3>
                                        <p><?=$item['description']?></p>
                                    </div>
                                    <div class="admin-panel__block">
                                        <h3 class="admin-panel__block-title">Наличие</h3>
                                        <h4>
                                            <?php if ($item['amoynt_product'] == 0) {
                                                ?>Нет в наличии<?php
                                            }
                                            else {
                                                ?>В наличии<?php
                                            }
                                            ?>
                                        </h4>
                                        <h3 class="admin-panel__block-title">О бренде</h3>
                                        <p><?=$item['brand_description']?></p>
                                    </div>
                                    <div class="admin-panel__block">
                                        <h3 class="admin-panel__block-title">Название</h3>
                                        <h4><?=$item['name_product']?></h4>
                                        <h3 class="admin-panel__block-title">Характеристики</h3>
                                        <p>
                                            Пол: Женские<br>
                                            Пол: <?=$item['style']?><br>
                                            Страна: <?=$item['country']?><br>
                                            Водостойкость: <?=$item['water_resistance']?><br>
                                            Коллекция: <?=$item['style']?><br>
                                        </p>
                                    </div>
                                    <div class="admin-panel__block admin-panel__block--buttons">
                                        <button class="admin-panel__button button button--modal-admin openModalUpdateProduct" data-id-product="<?=$item['id']?>">Изменить</button>
                                        <form class="admin-panel__form-delete" action="/admin-panel/delete-product" method="post">
                                            <input type="hidden" name="id_product" value="<?=$item['id']?>">
                                            <button class="admin-panel__button button button--modal-admin">Удалить</button>
                                        </form>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <div id="modalAddProduct" class="modal-admin">
        <div class="modal-admin__content">
            <div class="modal-admin__close-container">
                <span id="closeModalAddProduct" class="modal-admin__close">&times;</span>
            </div>
            <div class="modal-admin__body">
                <h3 class="modal-admin__title">Добавление товара в базу данных</h3>
                <form class="modal-admin__form" action="/admin-panel/add-product" method="post">
                    <div class="modal-admin__input-wrapper">
                        <label for="">Название товара
                            <input
                                    class="modal-admin__input input input--modal-admin"
                                    type="text"
                                    name="name_product"
                                    placeholder="Название товара"
                                    required
                            >
                        </label>
                    </div>
                    <div class="modal-admin__input-wrapper">
                        <label for="">Цена товара
                            <input
                                    class="modal-admin__input input input--modal-admin"
                                    type="number"
                                    name="price"
                                    placeholder="Цена товара"
                                    minlength="1"
                                    required
                            >
                        </label>
                    </div>
                    <div class="modal-admin__input-wrapper">
                        <label for="">Категория товара
                            <input
                                    class="modal-admin__input input input--modal-admin"
                                    type="number"
                                    name="name_category"
                                    placeholder="Категория товара"
                                    minlength="1"
                                    maxlength="1"
                                    required
                            >
                        </label>
                    </div>
                    <div class="modal-admin__button-wrapper">
                        <button class="modal-admin__button button button--modal-admin" type="submit">Добавить товар</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="modalUpdateProduct" class="modal-admin">
        <div class="modal-admin__content">
            <div class="modal-admin__close-container">
                <span id="closeModalUpdateProduct" class="modal-admin__close">&times;</span>
            </div>
            <div class="modal-admin__body">
                <h3 class="modal-admin__title">Изменение товара в базе данных</h3>

                    <form class="modal-admin__form" action="/admin-panel/update-product" method="post">
                        <input type="hidden"
                               id="productId"
                               name="id"
                               value=""
                        >
                        <div class="modal-admin__input-wrapper">
                            <label for="productName">Название товара
                                <input
                                        class="modal-admin__input input input--modal-admin"
                                        type="text"
                                        id="productName"
                                        name="name_product"
                                        placeholder="Название товара"
                                        value=""
                                        required
                                >
                            </label>
                        </div>
                        <div class="modal-admin__input-wrapper">
                            <label for="productPrice">Цена товара
                                <input
                                        class="modal-admin__input input input--modal-admin"
                                        type="number"
                                        id="productPrice"
                                        name="price"
                                        placeholder="Цена товара"
                                        value=""
                                >
                            </label>
                        </div>
                        <div class="modal-admin__input-wrapper">
                            <label for="productAmount">Наличие товара
                                <input
                                        class="modal-admin__input input input--modal-admin"
                                        type="number"
                                        id="productAmount"
                                        name="amoynt_product"
                                        placeholder="Наличие товара"
                                        value=""
                                        required
                                >
                            </label>
                        </div>
                        <div class="modal-admin__input-wrapper">
                            <label for="productDescription">Описание
                                <textarea
                                        class="form-update-product__textarea input input--textarea-modal-admin"
                                        id="productDescription"
                                        name="description"
                                        placeholder="Описание"
                                        required
                                        cols="30"
                                        rows="10"
                                ></textarea>
                            </label>
                        </div>
                        <div class="modal-admin__input-wrapper">
                            <label for="brandDescription">О бренде
                                <textarea
                                        class="form-update-product__textarea input input--textarea-modal-admin"
                                        id="brandDescription"
                                        name="brand_description"
                                        placeholder="О бренде"
                                        required
                                        cols="30"
                                        rows="10"
                                ></textarea>
                            </label>
                        </div>
                        <div class="modal-admin__input-wrapper">
                            <label for="productStyle">Стиль
                                <input
                                        class="modal-admin__input input input--modal-admin"
                                        type="text"
                                        id="productStyle"
                                        name="style"
                                        placeholder="Стиль"
                                        value=""
                                        required
                                >
                            </label>
                        </div>
                        <div class="modal-admin__input-wrapper">
                            <label for="productCountry">Страна
                                <input
                                        class="modal-admin__input input input--modal-admin"
                                        type="text"
                                        id="productCountry"
                                        name="country"
                                        placeholder="Страна"
                                        value=""
                                        required
                                >
                            </label>
                        </div>
                        <div class="modal-admin__input-wrapper">
                            <label for="waterResistance">Водостойкость
                                <input
                                        class="modal-admin__input input input--modal-admin"
                                        type="text"
                                        id="waterResistance"
                                        name="water_resistance"
                                        placeholder="Водостойкость"
                                        value=""
                                        required
                                >
                            </label>
                        </div>
                        <div class="modal-admin__input-wrapper">
                            <label for="productCollectionName">Коллекция
                                <input
                                        class="modal-admin__input input input--modal-admin"
                                        type="text"
                                        id="productCollectionName"
                                        name="collection_name"
                                        placeholder="Коллекция"
                                        value=""
                                        required
                                >
                            </label>
                        </div>
                        <div class="modal-admin__input-wrapper">
                            <label for="productMechanism">Механизм
                                <input
                                        class="modal-admin__input input input--modal-admin"
                                        type="text"
                                        id="productMechanism"
                                        name="mechanism"
                                        placeholder="Механизм"
                                        value=""
                                        required
                                >
                            </label>
                        </div>
                        <div class="modal-admin__input-wrapper">
                            <label for="productModelMechaism">Модель механизма
                                <input
                                        class="modal-admin__input input input--modal-admin"
                                        type="text"
                                        id="productModelMechaism"
                                        name="model_mechaism"
                                        placeholder="Модель механизма"
                                        value=""
                                        required
                                >
                            </label>
                        </div>
                        <div class="modal-admin__input-wrapper">
                            <label for="amountStones">Камней в механизме
                                <input
                                        class="modal-admin__input input input--modal-admin"
                                        type="number"
                                        id="amountStones"
                                        name="amount_stones"
                                        placeholder="Камней в механизме"
                                        value=""
                                        required
                                >
                            </label>
                        </div>
                        <div class="modal-admin__input-wrapper">
                            <label for="productDiametr">Диаметр корпуса
                                <input
                                        class="modal-admin__input input input--modal-admin"
                                        type="number"
                                        id="productDiametr"
                                        name="diametr"
                                        placeholder="Диаметр корпуса"
                                        value=""
                                        required
                                >
                            </label>
                        </div>
                        <div class="modal-admin__input-wrapper">
                            <label for="productCaseColor">Цвет корпуса
                                <input
                                        class="modal-admin__input input input--modal-admin"
                                        type="text"
                                        id="productCaseColor"
                                        name="case_color"
                                        placeholder="Цвет корпуса"
                                        value=""
                                        required
                                >
                            </label>
                        </div>
                        <div class="modal-admin__input-wrapper">
                            <label for="productDialColor">Цвет цифербалата
                                <input
                                        class="modal-admin__input input input--modal-admin"
                                        type="text"
                                        id="productDialColor"
                                        name="dial_color"
                                        placeholder="Цвет цифербалата"
                                        value=""
                                        required
                                >
                            </label>
                        </div>
                        <!--                <form class="form-update-product__form-img" method="post" enctype="multipart/form-data">-->
                        <!--                    <div>-->
                        <!--                        <label for="file">Изображение</label>-->
                        <!--                        <input type="file" id="productImgPath" name="img_path" multiple />-->
                        <!--                    </div>-->
                        <!--                </form>-->
                        <!--            <input-->
                        <!--                    class="form-update-product__input input"-->
                        <!--                    type="number"-->
                        <!--                    name="name_category"-->
                        <!--                    placeholder="Категория товара"-->
                        <!--                    minlength="1"-->
                        <!--                    maxlength="1"-->
                        <!--            >-->
                        <div class="modal-admin__button-wrapper">
                            <button class="modal-admin__button button button--modal-admin" type="submit">Изменить товар</button>
                        </div>
                    </form>

            </div>
        </div>
    </div>
    <script defer src="public/assets/js/admin-modal.js"></script>
    <script defer src="public/assets/js/jquery-3.7.1.min.js"></script>