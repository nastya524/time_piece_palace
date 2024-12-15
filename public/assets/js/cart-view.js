document.addEventListener("DOMContentLoaded", () => {
    const currentUserId = Number(userId); // Получаем ID пользователя из PHP
    const cartContainer = document.querySelector(".products");
    const summaryContainer = document.querySelector(".summary-general");

    // Проверка, что userId корректно передан
    if (!currentUserId) {
        console.error("ID пользователя не найден!");
        return;
    }

    // Извлекаем корзину из Local Storage
    const cart = JSON.parse(localStorage.getItem("cart")) || [];

    // Фильтруем товары по ID пользователя
    const userCart = cart.filter(item => item.userId === currentUserId);

    // Если корзина пуста, отображаем сообщение
    if (userCart.length === 0) {
        cartContainer.innerHTML = "<h2>Ваша корзина пуста!</h2>";
        return;
    }

    // Генерация HTML для каждого товара
    cartContainer.innerHTML = ""; // Очищаем контейнер перед заполнением
    let totalQuantity = 0;
    let totalPrice = 0;

    userCart.forEach(item => {
        totalQuantity += item.quantity;
        totalPrice += item.quantity * item.productPrice;

        const productElement = `
            <div class="product" data-id="${item.productId}">
                <img src="${item.imgPath}" alt="${item.productName}">
                <div class="info">
                    <h2 style="font-size: 20px; width: 250px">${item.productName}</h2>
                    <div class="quantity">
                        <label style="font-size: 15px; padding-bottom: 20px">Количество</label>
                        <div class="quantity-number">
                            <input type="number" value="${item.quantity}" min="1" max="${item.amountProduct}" data-id="${item.productId}">
                            <span> шт.</span>
                        </div>
                    </div>
                    <div class="price">
                        <label style="font-size: 15px; padding-bottom: 20px">Итого</label>
                        <span style="font-size: 20px; font-weight: bold" class="total-price">${item.productPrice * item.quantity} р</span>
                    </div>
                </div>
                <button class="remove" data-id="${item.productId}">✖</button>
            </div>
        `;

        cartContainer.insertAdjacentHTML("beforeend", productElement);
    });

    // Обновление итогов
    summaryContainer.innerHTML = `
        <p><span style="font-weight: bold;">${totalQuantity} товара(ов)</span><span>${totalPrice} р</span></p>
        <p><span style="font-weight: bold;">Доставка</span> <span>Бесплатно</span></p>
        <p><span style="font-weight: bold;">Итого</span> <span>${totalPrice} р</span></p>
        <form id="checkoutForm" method="POST" action="/checkout">
                <input type="hidden" id="user_id" name="user_id" value="">
                <input type="hidden" id="cartData" name="cart_data" value="">
                <button type="submit" class="checkout">Оформить заказ</button>
            </form>
    `;

    // Обработчик изменения количества товара
    document.querySelectorAll(".quantity input").forEach(input => {
        input.addEventListener("input", (event) => {
            const productId = parseInt(input.getAttribute("data-id"));
            const newQuantity = parseInt(input.value);

            updateCartQuantity(productId, newQuantity);
        });
    });

    // Обработчик удаления товара из корзины
    document.querySelectorAll(".remove").forEach(button => {
        button.addEventListener("click", () => {
            const productId = parseInt(button.getAttribute("data-id"));
            removeFromCart(productId);
        });
    });

    // Функция обновления количества товара
    function updateCartQuantity(productId, newQuantity) {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        const item = cart.find(item => item.productId === productId && item.userId === currentUserId);

        if (item) {
            if (newQuantity <= item.amountProduct && newQuantity >= 1) {
                item.quantity = newQuantity;
                localStorage.setItem("cart", JSON.stringify(cart));
                updateProductPrice(productId, newQuantity);
            } else {
                alert("Вы не можете добавить больше, чем есть в наличии!");
                return;
            }
        }
    }

    // Обновление отображения цены для конкретного товара
    function updateProductPrice(productId, newQuantity) {
        const productElement = document.querySelector(`.product[data-id="${productId}"]`);
        const priceElement = productElement.querySelector(".total-price");

        // Обновляем цену товара
        const product = cart.find(item => item.productId === productId && item.userId === currentUserId);
        priceElement.textContent = `${product.productPrice * newQuantity} р`;

        // Обновляем общую сумму
        updateTotalSummary();
    }

    // Функция удаления товара
    function removeFromCart(productId) {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        cart = cart.filter(item => !(item.productId === productId && item.userId === currentUserId));
        localStorage.setItem("cart", JSON.stringify(cart));
        renderCart();
    }

    // Функция рендеринга корзины
    function renderCart() {
        const cart = JSON.parse(localStorage.getItem("cart")) || [];
        const userCart = cart.filter(item => item.userId === currentUserId);

        cartContainer.innerHTML = ""; // Очищаем корзину перед рендером
        let totalQuantity = 0;
        let totalPrice = 0;

        userCart.forEach(item => {
            totalQuantity += item.quantity;
            totalPrice += item.quantity * item.productPrice;

            const productElement = `
                <div class="product" data-id="${item.productId}">
                    <img src="${item.imgPath}" alt="${item.productName}">
                    <div class="info">
                        <h2 style="font-size: 20px">${item.productName}</h2>
                        <div class="quantity">
                            <label style="font-size: 15px">Количество</label>
                            <div class="quantity-number">
                                <input type="number" value="${item.quantity}" min="1" max="${item.amountProduct}" data-id="${item.productId}">
                                <span> шт.</span>
                            </div>
                        </div>
                        <div class="price">
                            <label style="font-size: 15px">Итого</label>
                            <span style="font-size: 20px; font-weight: bold" class="total-price">${item.productPrice * item.quantity} р</span>
                        </div>
                    </div>
                    <button class="remove" data-id="${item.productId}">✖</button>
                </div>
            `;

            cartContainer.insertAdjacentHTML("beforeend", productElement);
        });

        updateTotalSummary();
    }

    // Функция обновления итоговой суммы
    function updateTotalSummary() {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        const userCart = cart.filter(item => item.userId === currentUserId);

        let totalQuantity = 0;
        let totalPrice = 0;

        userCart.forEach(item => {
            totalQuantity += item.quantity;
            totalPrice += item.quantity * item.productPrice;
        });

        summaryContainer.innerHTML = `
            <p><span style="font-weight: bold;">${totalQuantity} товара(ов)</span><span>${totalPrice} р</span></p>
            <p><span style="font-weight: bold;">Доставка</span> <span>Бесплатно</span></p>
            <p><span style="font-weight: bold;">Итого</span> <span>${totalPrice} р</span></p>
            <form id="checkoutForm" method="POST" action="/checkout">
                <input type="hidden" id="user_id" name="user_id" value="">
                <input type="hidden" id="cartData" name="cart_data" value="">
                <button type="submit" class="checkout">Оформить заказ</button>
            </form>

        `;
    }

    document.querySelector(".checkout").addEventListener("click", (event) => {
        event.preventDefault(); // Останавливаем стандартную отправку формы, чтобы сначала выполнить нашу логику

        const currentUserId = Number(userId); // ID текущего пользователя
        const cart = JSON.parse(localStorage.getItem("cart")) || [];

        const userCart = cart.filter(item => item.userId === currentUserId);

        if (userCart.length === 0) {
            alert("Ваша корзина пуста!");
            return;
        }

        // Подготовка данных в формате строки для отправки через GET/POST
        const cartData = userCart.map(item => {
            return `${item.productId}:${item.quantity}:${item.productPrice}`;
        }).join(",");

        // Устанавливаем значение в скрытое поле
        document.getElementById("cartData").value = cartData;
        document.getElementById("user_id").value = currentUserId;

        // Очистка корзины из localStorage после отправки данных
        localStorage.setItem("cart", JSON.stringify(cart.filter(item => item.userId !== currentUserId)));

        // Отправка формы
        document.getElementById("checkoutForm").submit();
        renderCart();
    });


});






function addToCart(productId, productName, productPrice, userId, imgPath, amountProduct) {
    // Получаем текущую корзину из Local Storage
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Проверяем, есть ли уже этот товар в корзине
    let existingItem = cart.find(item => (item.productId === productId && item.userId === userId));

    if (existingItem) {
        // Если товар уже есть в корзине, проверяем лимит
        if (existingItem.quantity < amountProduct) {
            existingItem.quantity += 1; // Увеличиваем количество на 1
            alert('Товар добавлен в корзину!');
        } else {
            alert('Нельзя добавить больше товара, чем есть в наличии!');
        }
    } else {
        // Если товара еще нет в корзине, добавляем его с quantity = 1
        cart.push({
            productId: productId,
            productName: productName,
            productPrice: productPrice,
            userId: userId,
            imgPath: imgPath,
            quantity: 1, // Начальное количество
            amountProduct: amountProduct
        });
        alert('Товар добавлен в корзину!');
    }
    // Сохраняем обновленную корзину в Local Storage
    localStorage.setItem('cart', JSON.stringify(cart));
    // Выводим текущую корзину в консоль (для отладки)
    console.log(cart);
}