<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'tigerpos');

if (isset($_GET['term'])){
	$conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT `id`,`name` FROM `products` WHERE `name` LIKE '%" . $_GET['term'] . "%'";
	$return_arr = array();
	$result = $conn->query($sql);
	while ($row = $result->fetch_assoc()) {
		$return_arr[] = array(
			'label' => $row['name'],
			'value' => $row['name'],
			'id' => $row['id']
		);
	}
    echo json_encode($return_arr);
}
?>