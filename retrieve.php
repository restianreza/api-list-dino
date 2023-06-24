<?php
require("koneksi.php");
$perintah = " SELECT * FROM tb_dino";
$eksekusi = mysqli_query($connect, $perintah);

$cek = mysqli_affected_rows($connect);
if($cek > 0){
    $response["kode"] = 1;
    $response["pesan"] = "Data Tersedia";
    $response["data"] = array();
    
    while($get = mysqli_fetch_object($eksekusi)){
        $var["id"] = $get -> id;
        $var["nama"] = $get -> nama;
        $var["jenis"] = $get -> jenis;
        $var["ukuran"] = $get -> ukuran;
        $var["asal"] = $get -> asal;
        $var["deskripsi"] = $get -> deskripsi;
        //$var["deskripsi_lengkap"] = $get -> deskripsi_lengkap;
        
        array_push($response["data"], $var);
    }
}else {
    $response["kode"] = 0;
    $response["pesan"] = "Data tidak Tersedia";
}
echo json_encode($response);
mysqli_close($connect);
