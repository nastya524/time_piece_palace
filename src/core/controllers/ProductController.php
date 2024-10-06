<?php

namespace core\controllers;

use core\models\Product;

class ProductController
{

    public function getAllProducts($namePage)
    {
        $product = new Product();
        $data = $product -> getAllProducts();
        require_once __DIR__ . '/../../../views/pages/' . $namePage . '.php';
    }

    public function getOneProduct($namePage, $id)
    {
        $product = new Product();
        $data = $product -> getOneProduct($id);

        require_once __DIR__ . '/../../../views/pages/' . $namePage . '.php';
    }

}