<?php 
require "template.php";

if(isset($_POST["ubah"]))  {
    if(ubah($_POST) > 0) {
            echo "
            <script> 
              Swal.fire({ 
                  title: 'HOREE',
                  text: 'Data has changed',
                  icon: 'success', buttons: [false, 'OK'], 
                  }).then(function() { 
                      window.location.href='data.php'; 
                  });  
             </script>
                ";   
        }
                
   
    else {
      echo "
         <script> 
           Swal.fire({ 
              title: 'OOPS', 
              text: 'Data failed to change!!!', 
              icon: 'warning', 
              dangerMode: true, 
              buttons: [false, 'OK'], 
              }).then(function() { 
                  window.location.href='data.php'; 
              }); 
         </script>
        ";
    }
  }



 ?>

 <!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <center>
    <h3>EDIT DATA</h3>
    <br>

       <?php 
               if(isset($_GET["id"])){
                 $id     = $_GET["id"]; 
                 $data   = query("SELECT * FROM tabel_hasil WHERE id = '$id'")[0];
           ?>
         
               <div class="card" style="max-width:21rem;">
                         <form method="post" action="ubah.php">
                          <input type="text" name="id" value="<?=$id;?>" hidden>
                            <table class="table text-center">
                                <tr>
                                  <td>Item</td>
                                  <td><input class="text-center" type="text" name="Nama" 
                                      value="<?=$data["Nama"];?>" autocomplete = "off"></td>
                                </tr> 
                                <tr>
                                  <td>Result</td>
                                  <td><input class="text-center" type="number" name="hitung" 
                                      value="<?=$data["hitung"];?>" autocomplete = "off"></td>
                                </tr>
                           </table>    
                    <button type="submit" name="ubah" class="btn btn-sm btn-primary"><i class="fa fa-save"></i></button>
                    <a href="data.php" type="button" class="btn btn-sm btn-danger"><i class="fa fa-sign-out"></i></a>
                  </form>
               </div>
              
              
             <?php  
          }
       ?>

     
  </center>

</body>
</html>