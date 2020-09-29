<?php 

     require "template.php";
     $data = query("SELECT * FROM tabel_set")[0];

     // if(isset($_GET["reset"])){
     //    $sql = "UPDATE tabel_set SET hitung = 0";
     //    $koneksi->query($sql);
     //    // header("Location: index.php");
     // }

  if(isset($_POST["save"]))  {
    if( tambah($_POST) > 0 ) {
            echo "
                 <script> 
                  Swal.fire({ 
                  title: 'HOREE',
                  text: 'Result has recorded',
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
            text: 'Result failed to record', 
            icon: 'warning', 
            dangerMode: true, 
            buttons: [false, 'OK'], 
            }).then(function() { 
                window.location.href='index.php'; 
            }); 
         </script>
        ";
    }
  } 

  if(isset($_POST["set"]))  {
    if( setBatas($_POST) > 0 ) {
            echo "
                 <script> 
                  Swal.fire({ 
                  title: 'HOREE',
                  text: 'Set Limit Succesfuly',
                  icon: 'success', buttons: [false, 'OK'], 
                  }).then(function() { 
                      window.location.href='index.php'; 
                  }); 
                 </script>
                ";   
        }
                   
    else {
      echo "
         <script> 
         Swal.fire({ 
            title: 'OOPS', 
            text: 'Set Limit Failed', 
            icon: 'warning', 
            dangerMode: true, 
            buttons: [false, 'OK'], 
            }).then(function() { 
                window.location.href='index.php'; 
            }); 
         </script>
        ";
    }
  } 



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
        
<h2 class="mt-3">LIVE COUNTING</h2>

     
        <div class="row mt-3">  
           <div class="col">
            <div class="card" style="max-width:18rem;">
              <h5 class="card-header bg-dark text-white">RESULT</h5>
              <div class="card-body">
                    <div class="load-input" style="font-size: 90px; color: blue;"></div>
              </div>
              <div class="card-footer">Maximum Limits: <?=$data["batas"];?></div>
            </div>
          </div>
        </div>  
            <!--  -->
            <div class="row mt-3" style="max-width:18rem;">
               <div class="col">
                  <button type="button" class="btn btn-sm btn-success" data-toggle="modal"data-target="#save"><i class="fa fa-plus"></i></button>
               </div>
               <!-- <div class="col">
                  <button class="btn btn-sm btn-danger" onclick="data(this)"><i class="fa fa-undo"></i></button>
               </div> -->
                <div class="col">
                  <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"data-target="#set"><i class="fa fa-cog"></i></button>
               </div>
               <div class="col">
                  <a href="data.php" class="btn btn-sm btn-primary"><i class="fa fa-table"></i></a>
               </div>
            </div>

       <!-- Modal save Data -->
<div class="modal fade" id="save" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-save"></i> SUBMIT RESULT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="index.php" method="post">
         <div class="modal-body">
              <div class="form-group">
                  <input class="form-control" name="Nama" type="text" autocomplete="off" placeholder="Input Item's Name" required><br>
                  <input type="text" name="hitung" value="<?=$data["hitung"];?>" hidden>
                  <div style="font-size: 25px; font-weight: bold">RESULT:</div>
                  <div class="load-input" style="font-size: 50px; color: blue;"></div>    
             </div>  
      </div>
      <div class="modal-footer">
        <button type="submit" name="save" class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
        <button type="button" class=" btn btn-danger" data-dismiss="modal"> <i class="fa fa-undo"></i> Cancel</button>
      </div>
     </form>
    </div>
  </div>
</div>

<!-- Modal set batas penghitungan -->
<div class="modal fade" id="set" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-edit"></i> SET LIMIT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="index.php" method="post">
         <div class="modal-body">
              <div class="form-group">
                  <input class="form-control" name="batas" type="number" placeholder="Input Limit Value" required><br>
             </div>  
      </div>
      <div class="modal-footer">
        <button type="submit" name="set" class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
        <button type="button" class=" btn btn-danger" data-dismiss="modal"> <i class="fa fa-undo"></i> Cancel</button>
      </div>
     </form>
    </div>
  </div>
</div>
     
   
    

      <footer class="py-3">
          <div class="container">
                <p class="m-0 text-center">Copyright &copy;2020 Rizky Project</p>
          </div>
        </footer>


    </center>    

    <script>
           function data(e){
              var xhr = new XMLHttpRequest();
              xhr.open("GET", "proses.php?Reset = 1", true);
              xhr.send();
           }
    </script>    
  </body>
</html>

