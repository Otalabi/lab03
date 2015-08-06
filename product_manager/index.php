<?php
require('../model/database.php');
require('../model/product_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
}   else if (isset($_GET['action'])) {
    $action = $_GET['action'];
}   else {
    $action = 'display_all';}

if ($action == 'display_all') {
    $all_products = get_products();
    include('product_list.php');

} else if ($action == 'delete_record') {
    $product_item = $_POST['product_item'];
    delete_product($product_item);
    header('Location: .');

} else if ($action == 'add_record') {
    $product_item = $_POST['product_item'];
    $name = $_POST['name'];
    $version = $_POST['version'];
    $release_date = $_POST['release_date'];

  if (empty($product_item) || empty($name) || empty($version) || empty($release_date)) {
        $error = "Invalid product data. Check all fields and try again.";
        header("Location: .?error=$error");
    } else {
        add_product($product_item, $name, $version, $release_date);
        header('Location: .');  }
}
?>