<?php 
    $conn = mysqli_connect("localhost","root","","pariwisata");
    if (!$conn) {
        die('Koneksi Error : '.mysqli_connect_errno() 
        .' - '.mysqli_connect_error());
     }
?>