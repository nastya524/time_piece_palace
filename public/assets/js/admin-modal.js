
const modalAddProduct = document.getElementById('modalAddProduct'); // Получить модальное окно
const closeModalBtnAddProduct = document.getElementById("closeModalAddProduct"); // Получить кнопку закрытия модального окна
let scrollPosition; // Переменная для сохранения позиции прокрутки при открытии модального окна

// При клике на кнопку закрытия, скрываем модальное окно
closeModalBtnAddProduct.onclick = function() {
    closeModal(modalAddProduct);
}

// Функция для закрытия модального окна
const closeModal = (modal) => {
    setTimeout(function() {
        modal.style.display = "none";
    }, 200);
    document.body.removeAttribute('class'); // Возобновляем прокрутку
    let scrollPos = parseFloat(getComputedStyle(document.documentElement).getPropertyValue('--scroll-position'));
    window.scrollTo(0, scrollPos); // Восстанавливаем позицию прокрутки
    document.documentElement.removeAttribute('style');
}

// // Закрытие модального окна при клике вне него
// window.onclick = function(event) {
//     if (event.target === modalAddProduct) {
//         closeModal(modalAddProduct);
//     }
// }

// При открытии модального окна сохраняем текущую позицию прокрутки
document.addEventListener('click', function(event) {
    if (event.target.classList.contains('openModalAddProduct')) {
        scrollPosition = document.documentElement.scrollTop || window.pageYOffset;
        document.body.classList.add('no-scroll'); // Останавливаем прокрутку
        setTimeout(function() {
            modalAddProduct.style.display = "block";
        }, 150);
        document.documentElement.style.setProperty('--scroll-position', scrollPosition + 'px'); // Сохраняем позицию прокрутки в переменной --scroll-position
        window.scrollTo(0, scrollPosition); // Восстанавливаем позицию прокрутки
    }
});

const modalUpdateProduct = document.getElementById('modalUpdateProduct'); // Получить модальное окно
const closeModalBtnUpdateProduct = document.getElementById("closeModalUpdateProduct"); // Получить кнопку закрытия модального окна

// При клике на кнопку закрытия, скрываем модальное окно
closeModalBtnUpdateProduct.onclick = function() {
    closeModal(modalUpdateProduct);
}


// Закрытие модального окна при клике вне него
window.onclick = function(event) {
    if (event.target === modalUpdateProduct) {
        closeModal(modalUpdateProduct);
    }
    if (event.target === modalAddProduct) {
        closeModal(modalAddProduct);
    }
}

// При открытии модального окна сохраняем текущую позицию прокрутки
document.addEventListener('click', function(event) {
    if (event.target.classList.contains('openModalUpdateProduct')) {
        const productId =  event.target.getAttribute('data-id-product');
        // console.log(document.getElementById('id_product').value);
        $.ajax({
            type: "POST", // Метод запроса
            url: "/getOneProduct", // url запроса
            data: {                 // Параметры для запроса
                'id' : productId,
            },
            success: function (res) {
                const data = JSON.parse(res);
                console.log(data);
                document.getElementById("productId").value = data['id'];
                document.getElementById("productName").value = data['name_product'];
                document.getElementById("productPrice").value = data['price'];
                document.getElementById("productAmount").value = data['amoynt_product'];
                document.getElementById("productDescription").value = data['description'];
                document.getElementById("brandDescription").value = data['brand_description'];
                document.getElementById("productStyle").value = data['style'];
                document.getElementById("productCountry").value = data['country'];
                document.getElementById("waterResistance").value = data['water_resistance'];
                document.getElementById("productCollectionName").value = data['collection_name'];
                document.getElementById("productMechanism").value = data['mechanism'];
                document.getElementById("productModelMechaism").value = data['model_mechaism'];
                document.getElementById("amountStones").value = data['amount_stones'];
                document.getElementById("productDiametr").value = data['diametr'];
                document.getElementById("productCaseColor").value = data['case_color'];
                document.getElementById("productDialColor").value = data['dial_color'];
            },
        })
        scrollPosition = document.documentElement.scrollTop || window.pageYOffset;
        document.body.classList.add('no-scroll'); // Останавливаем прокрутку
        setTimeout(function() {
            modalUpdateProduct.style.display = "block";
        }, 150);
        document.documentElement.style.setProperty('--scroll-position', scrollPosition + 'px'); // Сохраняем позицию прокрутки в переменной --scroll-position
        window.scrollTo(0, scrollPosition); // Восстанавливаем позицию прокрутки
    }
});
