<?php

require "template.php"; 


    if(isset($_GET["id"])){    
        if( hapus($_GET ["id"]) > 0 ) {     
              echo "
                 <script>
                       Swal.fire({ 
                          title: 'HOREE',
                          text: 'Data has deleted',
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
                      text: 'Data failed to delete', 
                      icon: 'warning', 
                      dangerMode: true, 
                      buttons: [false, 'OK'], 
                      }).then(function() { 
                          window.location.href=''; 
                      }); 
             </script>
           ";

        }
  }

$koneksi->close();

 ?>