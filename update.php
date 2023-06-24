<?php
require("koneksi.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $jenis = $_POST["jenis"];
    $ukuran = $_POST["ukuran"];
    $asal = $_POST["asal"];
    $deskripsi = $_POST["deskripsi"];
    
    $perintah = "UPDATE tb_dino SET nama='$nama', jenis='$jenis', ukuran='$ukuran', asal='$asal', deskripsi='$deskripsi' WHERE id='$id'";
    $eksekusi = mysqli_query($connect, $perintah);
    $cek = mysqli_affected_rows($connect);
    
    if($cek>0){
        $response["kode"] = 1;
        $response["pesan"] = "Sukses Mengubah Data"; 
    }else{
        $response["kode"] = 0;
        $response["pesan"] = "Ada Kesalahan. Gagal Menyimpan Data";
    }
}else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada Data";
}

echo json_encode($response);
mysqli_close($connect);