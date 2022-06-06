<?php
include '../koneksi.php';

//POST DATA
if ($_POST){
    $isbn = $_POST['isbn'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];
    $abstrak = $_POST['abstrak'];

    //INSERT DATA
    $stmt = $connection->prepare("INSERT INTO buku (isbn, judul, pengarang, jumlah, tanggal, abstrak) VALUES ('$isbn', '$judul', '$pengarang', '$jumlah', '$tanggal', '$abstrak')");
    $stmt->execute();

    //Beri Response
    $response['message'] = "Insert Berhasil";
    $response['data'] = [
        'isbn' => $isbn,
        'judul' => $judul,
        'pengarang' => $pengarang,
        'jumlah' => $jumlah,
        'tanggal' => $tanggal,
        'abstrak' => $abstrak
    ];

    //Jadikan data dalam bentuk JSON
    $json = json_encode($response, JSON_PRETTY_PRINT);

    //print json
    echo $json;

} else {
    $response['message'] = "Insert Gagal";
    //Jadikan data dalam bentuk JSON
    $json = json_encode($response, JSON_PRETTY_PRINT);

    //print json
    echo $json;
}