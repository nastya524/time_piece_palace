<?php

namespace router;

use core\controllers\ProductController;
use services\Helper;

class Router
{
    public static $list = [];
    public static function myGet(string $url, string $namePage)
    {
        self::$list[] = [
            'url' => $url,
            'namePage' => $namePage
        ];
    }
    public static function myPost(string $url, string $controller, string $method)
    {
        self::$list[] = [
            'url' => $url,
            'controller' => $controller,
            'method' => $method
        ];
    }
    public static function getContent()
    {
        $rout = $_GET['rout'] ?? '';
        foreach (self::$list as $item)
        {
            if($item['url'] === '/' . $rout)
            {
                if ($_SERVER['REQUEST_METHOD'] === "GET")
                {
                    $productController = new ProductController();
                    switch ($item['namePage'])
                    {
                        case 'home':
                            require_once __DIR__ . '/../../views/partials/header.php';
                            require_once __DIR__ . '/../../views/pages/' . $item['namePage'] . '.php';
                            require_once __DIR__ . '/../../views/partials/footer.php';
                            die();
                        case 'log-in':
                            require_once __DIR__ . '/../../views/partials/header.php';
                            require_once __DIR__ . '/../../views/pages/' . $item['namePage'] . '.php';
                            require_once __DIR__ . '/../../views/partials/footer.php';
                            die();
                        case 'registration':
                            require_once __DIR__ . '/../../views/partials/header.php';
                            require_once __DIR__ . '/../../views/pages/' . $item['namePage'] . '.php';
                            require_once __DIR__ . '/../../views/partials/footer.php';
                            die();
                        case 'product-single':
                            require_once __DIR__ . '/../../views/partials/header.php';
                            $productController -> getOneProduct($item['namePage'], $_GET['id']);
                            require_once __DIR__ . '/../../views/partials/footer.php';
                            die();
                        case 'catalog-man':
                            require_once __DIR__ . '/../../views/partials/header.php';
                            $productController -> getAllProducts($item['namePage']);
                            require_once __DIR__ . '/../../views/partials/footer.php';
                            die();
                        case 'catalog-woman':
                            require_once __DIR__ . '/../../views/partials/header.php';
                            $productController -> getAllProducts($item['namePage']);
                            require_once __DIR__ . '/../../views/partials/footer.php';
                            die();
                        case 'cart':
                            require_once __DIR__ . '/../../views/partials/header.php';
                            require_once __DIR__ . '/../../views/pages/' . $item['namePage'] . '.php';
                            require_once __DIR__ . '/../../views/partials/footer.php';
                            die();
                        case 'error-404':
                            require_once __DIR__ . '/../../views/partials/header.php';
                            require_once __DIR__ . '/../../views/pages/' . $item['namePage'] . '.php';
                            require_once __DIR__ . '/../../views/partials/footer.php';
                            die();
                        case 'profile':
                            if (!empty($_SESSION['user'])) {
                                require_once __DIR__ . '/../../views/partials/header.php';
                                require_once __DIR__ . '/../../views/pages/' . $item['namePage'] . '.php';
                                require_once __DIR__ . '/../../views/partials/footer.php';
                                die();
                            } else {
                                header("location: /");
                            }
                        case 'admin':
                            if (!empty($_SESSION['user'])) {
                                if ($_SESSION['user']['role'] == 1) {
                                    require_once __DIR__ . '/../../views/partials/header.php';
                                    require_once __DIR__ . '/../../views/admin/' . $item['namePage'] . '.php';
                                    require_once __DIR__ . '/../../views/partials/footer.php';
                                    die();
                                } else {
                                    header("location: /");
                                }
                            } else {
                                header("location: /");
                            }
                    }
                }
                elseif ($_SERVER['REQUEST_METHOD'] === "POST")
                {
                    $method = $item['method'];
                    $action = new $item['controller'];
                    $action->$method($_POST);
                    die();
                }
            }
        }
    }
}