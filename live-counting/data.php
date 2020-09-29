<?php 
 
     require "template.php";

     $data = query("SELECT * FROM tabel_hasil ORDER BY id DESC");
     


 ?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
  </head>
  <body>

    <center>
        
<h4 class="mt-3">RESULT RECORD</h4>

<a href="index.php" class="btn btn-primary"><i class="fa fa-home"></i></a>
       
       <div class="table table-responsive-sm mt-3">
            <table class="table table-bordered table-hover table-striped" style="width:30rem;">
               <tr class="bg-dark text-white text-center">
                  <th>Time</th>
                  <th>Item</th>
                  <th>Result</th>
                  <th>Option</th>
               </tr>
               <?php foreach ($data as $row) :?>
                 <tr>
                    <td class="text-center"><?=$row["waktu"];?></td>
                    <td class="text-center"><?=$row["Nama"];?></td>
                    <td class="text-center"><?=$row["hitung"];?></td>
                    <td class="text-center">
                      <a class="ubah btn btn-success btn-sm" href="ubah.php?id=<?=$row["id"];?>"><i class="fa fa-edit"></i></a>
                       <a class="hapus btn btn-danger btn-sm alert_hapus" href="hapus.php?id=<?=$row["id"];?>"><i class="fa fa-trash"></i></a>
                    </td>
                 </tr>
               <?php endforeach; ?>
            </table>
        </div>

    

      <footer class="py-3">
          <div class="container">
                <p class="m-0 text-center">Copyright &copy;2020 Rizky Project</p>
          </div>
        </footer>


    </center>        

  </body>
</html>


 