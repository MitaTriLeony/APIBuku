<?php
include '../koneksi.php';
/**
 * @var $connection PDO
 */
//prepare query
$query = "select * from buku";
$statement = $connection->query ($query);
$statement -> setFetchMode(PDO::FETCH_ASSOC);
//jalankan query
$results = $statement->fetchALL();
//output JSON
header('Content-Type: application/json');
echo json_encode($results);