<?php
    $dsn = 'mysql:host=localhost;dbname=dsuclass_talab4';
    $username = 'dsuclass_talab4';
    $password = 'dsuclass_talab4';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>