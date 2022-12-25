<?php 
     session_start();

     if(!isset($_SESSION["login"]))
     {
         echo $_SESSION["login"];
         header("Location:login.php");
         exit;
     }
    require 'function.php';
    $id=$_GET["id"];

    if(hapusWilayah($id)>0){
        echo "
            <script>
                alert('data berhasil dihapus');
                document.location.href='admin/admin.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('data gagal dihapus');
                document.location.href='admin/admin.php';
            </script>";
        echo "<br>";
        echo mysqli_error($conn);
    }
?>