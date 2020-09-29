<?php 

//Simpan dengan nama file proses.php
require "koneksidb.php";

	 if(isset($_GET['hitung'])){
	 	  $set    = query("SELECT * FROM tabel_set")[0];
	 	  $hitung = $_GET["hitung"];
	 	  $Reset  = "0";
	 	  $sql    = "UPDATE tabel_set SET hitung = '$hitung'";
		  $koneksi->query($sql);
		  $result = ["batas" => $set["batas"]];
		  $json = json_encode($result);
		  echo $json;
	 }    
        
 ?>