<?php

include '../koneksi.php';

$isbn = $_POST['isbn'];

/**
 * @var $connection PDO
 */
//Prepare query

$query = "DELETE from buku WHERE isbn = ('$isbn')";

$statement = $connection->query($query);
$statement->setFetchMode(PDO::FETCH_ASSOC);
//jalankan query
$results = $statement->fetchAll();

$output = [
    $results
];
//output JSON
header('Content-Type: application/json');
echo json_encode($results);