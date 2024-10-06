<?php

use router\Router;

Router::myGet('/','home');
Router::myGet('/about.php', 'about');
Router::myGet('/profile', 'profile');
Router::myGet('/log-in', 'log-in');
Router::myGet('/registration', 'registration');
Router::myGet('/product-single.php', 'product-single');
Router::myGet('/catalog-man', 'catalog-man');
Router::myGet('/catalog-woman', 'catalog-woman');
Router::myGet('/cart', 'cart');
Router::myGet('/error-404', 'error-404');
Router::myGet('/admin-panel', 'admin');
Router::myPost('/auth/registration', \core\controllers\UserController::class, 'registration');
Router::myPost('/auth/login', \core\controllers\UserController::class, 'login');
Router::myPost('/auth/logout', \core\controllers\UserController::class, 'logout');
Router::myPost('/admin-panel/add-product', \core\controllers\AdminController::class, 'addDataProduct');
Router::myPost('/admin-panel/delete-product', \core\controllers\AdminController::class, 'deleteDataProduct');
Router::myPost('/admin-panel/update-product', \core\controllers\AdminController::class, 'updateDataProduct');
Router::myPost('/getOneProduct', \core\models\Admin::class, 'getOneProduct');
Router::getContent();