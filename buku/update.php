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

    //UPDATE DATA
    $stmt = $connection->prepare("UPDATE `buku` SET `judul`='$judul',`pengarang`='$pengarang',`jumlah`='$jumlah',`tanggal`='$tanggal',`abstrak`='$abstrak' WHERE `isbn` = $isbn");
    $stmt->execute();

    //Beri Response
    $response['message'] = "Update Berhasil";
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
    $response['message'] = "Update Gagal";
    //Jadikan data dalam bentuk JSON
    $json = json_encode($response, JSON_PRETTY_PRINT);

    //print json
    echo $json;
}