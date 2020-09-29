<?php   

//Simpan dengan nama file koneksidb.php

$server       = "localhost";
$user         = "root";
$password     = "";
$database     = "counter"; //Nama Database di phpMyAdmin

$koneksi      = mysqli_connect($server, $user, $password, $database);


function query($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query );
    $box = [];
    while( $sql = mysqli_fetch_assoc($result) ){
    $box[] = $sql;
    }
    return $box;
}

function tambah($post) {
    global $koneksi;
    $Nama   = $post["Nama"];
    $hitung = $post["hitung"];
    //insert data ke dalam tabel hasil
    $sql = "INSERT INTO tabel_hasil(Nama, hitung) VALUES('$Nama', '$hitung')";
    mysqli_query($koneksi, $sql);
    return mysqli_affected_rows($koneksi);
}


function hapus ($id ) {
      global $koneksi;
      mysqli_query($koneksi, "DELETE FROM tabel_hasil WHERE id = '$id'");
      return mysqli_affected_rows($koneksi);
 }

 function setBatas ($post) {
      global $koneksi;
      $batas  = $post ['batas'];
     
        //update data tabel_set
         $query = "UPDATE tabel_set SET batas = '$batas'";
         mysqli_query($koneksi, $query);
         return mysqli_affected_rows($koneksi);
 }

 function ubah ($post) {
      global $koneksi;
      $id     = $post ['id'];
      $Nama   = $post ['Nama'];
      $hitung = $post ['hitung'];


        //update data tabel_hasil
         $query = "UPDATE tabel_hasil SET Nama = '$Nama', hitung = '$hitung' WHERE id = '$id'";
         mysqli_query($koneksi, $query);
         return mysqli_affected_rows($koneksi);
}

 

 ?>