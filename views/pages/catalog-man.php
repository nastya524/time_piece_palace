<main class="content">
    <section class="section container">
        <div class="section__body">
            <div class="catalog">
                <h1 class="catalog__title">Мужские часы</h1>
                <div class="catalog__content">
                   <div class="filters section">
                        <div class="filters__content"><p>Диаметр/ширина</p></div>
                    </div>
                    <ul class="catalog__list">
                        <?php foreach ($data as $item) {
                            if ($item['name_category'] == 'Мужские') { ?>
                                <li class="catalog__item">
                                    <article class="product-card">
                                        <a class="product-card__link" href="product-single.php?id=<?=$item['id']?>" title="Перейти на страницу товара <?=$item['name_product']?> и посмотреть характеристики..">
                                            <img
                                                    class="product-card__image"
                                                    src="<?=$item['img_path']?>"
                                                    alt="<?=$item['name_product']?>"
                                                    width="201" height="328" loading="lazy"
                                            >
                                        </a>
                                        <div class="product-card__body">
                                            <h2 class="product-card__title"><?=$item['name_product']?></h2>
                                            <span class="product-card__condition">
                                            <?php if ($item['amoynt_product'] == 0) {
                                                ?>Нет в наличии<?php
                                            }
                                            else {
                                                ?>В наличии<?php
                                            }
                                            ?>
                                        </span>
                                            <div class="product-card__cart-inner">
                                                <span class="product-card__price"><?=\services\Helper::addSpaceBasedOnLength($item['price'])?> р</span>
                                                <?php
                                                if(!isset($_SESSION["user"])) {
                                                    ?>
                                                    <form class="product-card__in-cart" action="/registration" method="get">
                                                        <button class="product-card__button button button--in-cart-catalog" type="submit" title="Добавить товар в корзину">В корзину</button>
                                                    </form>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <form class="product-card__in-cart" action="" method="post">
                                                        <button class="product-card__button button button--in-cart-catalog" type="submit" title="Добавить товар в корзину">В корзину</button>
                                                    </form>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </article>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</main>