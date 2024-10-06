<?php

namespace core\controllers;

use core\models\Admin;
class AdminController
{
    public static function addDataProduct() {
        $name_product = $_POST['name_product'];
        $price = $_POST['price'];
        $name_category = $_POST['name_category'];
        $query = "INSERT INTO `product`(`name_product`, `price`, `id_category`) VALUES ('$name_product','$price','$name_category')";
        Admin::addDataAdmin($query);
        header("Location: /admin-panel");
    }
    public static function deleteDataProduct() {
        $id_product = $_POST['id_product'];
        $query = "DELETE FROM `product` WHERE `product`.`id`='$id_product'";
        Admin::deleteDataAdmin($query);
        header("Location: /admin-panel");
    }
    public static function updateDataProduct() {
        $id = $_POST['id'];
        $name_product = $_POST['name_product'];
        $price = $_POST['price'];
        $amount_product = $_POST['amoynt_product'];
        $description = $_POST['description'];
        $brand_description = $_POST['brand_description'];
        $style = $_POST['style'];
        $country = $_POST['country'];
        $water_resistance = $_POST['water_resistance'];
        $collection_name = $_POST['collection_name'];
        $mechanism  = $_POST['mechanism'];
        $model_mechanism = $_POST['model_mechaism'];
        $amount_stones = $_POST['amount_stones'];
        $diametr = $_POST['diametr'];
        $case_color = $_POST['case_color'];
        $dial_color = $_POST['dial_color'];
        $query = "UPDATE `product` SET `name_product`='$name_product',
                     `description`='$description',
                     `brand_description`='$brand_description',
                     `price`='$price',
                     `country`='$country',
                     `water_resistance`='$water_resistance',
                     `collection_name`='$collection_name',
                     `style`='$style',
                     `mechanism`='$mechanism',
                     `model_mechaism`='$model_mechanism',
                     `amount_stones`='$amount_stones',
                     `diametr`='$diametr',
                     `case_color`='$case_color',
                     `dial_color`='$dial_color',
                     `amoynt_product`='$amount_product' WHERE `product`.`id`='$id'";

        Admin::updateDataAdmin($query);
        header("Location: /admin-panel");
    }
}
