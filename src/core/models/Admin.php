<?php

namespace core\models;

use services\Connect;

class Admin
{
    public static function getAllProductsMale()
    {
        $query = Connect::Connect()->query("SELECT * FROM `product` WHERE `product`.`id_category` = '1'");
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;

        }
        return $data;
    }
    public static function getAllProductsFemale()
    {
        $query = Connect::Connect()->query("SELECT * FROM `product` WHERE `product`.`id_category` = '2'");
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;

        }
        return $data;
    }

    public static function getOneProductMale()
    {
        $query = Connect::Connect()->query("SELECT * FROM `product` WHERE `product`.`id_category` = '1'");
        return mysqli_fetch_assoc($query);
    }
    public static function getOneProductFemale()
    {
        $query = Connect::Connect()->query("SELECT * FROM `product` WHERE `product`.`id_category` = '2'");
        return mysqli_fetch_assoc($query);
    }
    public static function getOneProduct()
    {
        $id = $_POST['id'];
        $query = Connect::Connect()->query("SELECT * FROM `product` WHERE `product`.`id` = '$id'");

        $product = mysqli_fetch_assoc($query);
        $json_data = json_encode($product, JSON_UNESCAPED_UNICODE);
        echo $json_data;
    }
    public static function updateDataAdmin($updateQuery)
    {
        $query = mysqli_query(Connect::connect(), $updateQuery);
        if(!$query){die('update error');}
    }
    public static function deleteDataAdmin($deleteQuery)
    {
        $query = mysqli_query(Connect::connect(), $deleteQuery);
        if (!$query) {die('delete error');}
    }
    public static function addDataAdmin($insertQuery)
    {
        $query = mysqli_query(Connect::connect(), $insertQuery);
        if (!$query) {die('add error');}
    }
}