<?php

function get_products() {
    global $db;
    $query = 'SELECT * FROM products ORDER BY productCode';
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_database_error($error_message);
    }
}

function delete_product($product_item) {
    global $db;
    $query = 'DELETE FROM products WHERE productCode = :product_item';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':product_item', $product_item);
        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_database_error($error_message);
    }
}

function add_product($product_item, $name, $version, $release_date) {
    global $db;
    $query = 'INSERT INTO products
    (productCode, name, version, releaseDate)
    VALUES
    (:product_item, :name, :version, :release_date)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':product_item', $product_item);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':version', $version);
        $statement->bindValue(':release_date', $release_date);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_database_error($error_message);
    }
}























?>