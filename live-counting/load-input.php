<?php 
   require "koneksidb.php";	

     $data  = query("SELECT * FROM tabel_set")[0];
    
      	echo $data["hitung"];
     


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
       <input type="text" name="hitung" value="<?=$data["hitung"];?>" hidden>
 </body>
 </html>
