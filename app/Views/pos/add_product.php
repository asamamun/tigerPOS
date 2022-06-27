<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'tigerpos');

if (isset($_POST['id'])){    
    $id = $conn->escape_string($_POST['id']);
    $sql = "SELECT * FROM products WHERE id = " . $id . " LIMIT 1";    
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $return_arr = array(
        'id' => $row['id'],
        'barcode' => $row['barcode'],
        'name' => $row['name'],
        'retail_price' => $row['retail_price'],

    );
    echo json_encode($return_arr);
}
       