<?php

namespace core\models;

use services\Connect;

class Product
{

    public function getAllProducts()
    {
        $query = Connect::Connect()->query("SELECT product.*, category.name_category FROM product JOIN category ON product.id_category = category.id");
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;

        }
        return $data;
    }

    public function getOneProduct($id)
    {
        $query = Connect::Connect()->query("SELECT product.*, category.name_category FROM product JOIN category ON product.id_category = category.id WHERE product.id = '$id'");
        return mysqli_fetch_assoc($query);
    }

}