<?php require 'function.php';
$data = query("SELECT * FROM tb_product WHERE product_id = 3");
if (empty($data)){
    echo empty($data);
}