<?php
if (!isset($_SESSION['user']['id'])) {
die("Ошибка: Пользователь не авторизован.");
}

$userId = $_SESSION['user']['id'];
?>
<script>
    const userId = <?= json_encode($userId); ?>
</script>
<script src="public/assets/js/cart-view.js"></script>
<main class="content">
    <section class="section container">
        <div class="section__body" style="padding: 0">
            <h1 class="cart__title">Корзина</h1>
            <div class="cart">
                <div class="cart-container">
                    <div class="products">

                    </div>
                    <div class="summary">
                        <div class="summary-general">
                            <p><span style="font-weight: bold;">3 товара</span><span>124 297 р</span></p>
                            <p><span style="font-weight: bold;">Доставка</span> <span>Бесплатно</span></p>
                            <p><span style="font-weight: bold;">Итого</span> <span>124 297 р</span></p>
                            <button class="checkout">Оформить заказ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>