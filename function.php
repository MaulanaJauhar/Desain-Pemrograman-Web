<?php 
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'pariwisata';
    //membuat koneksi
    $conn=mysqli_connect($host,$user,$pass,$db);
    function query($query2){
        global $conn;
        $result = mysqli_query($conn, $query2);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
    function getWisata(){
        global $conn;
        $query = "SELECT * FROM wisata";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    function getWilayah(){
        global $conn;
        $query = "SELECT * FROM wilayah";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    function tambahWisata($data) {
        global $conn;

        // $nama   =htmlspecialchars($data["Nama"]) ;
        $nama   =htmlspecialchars($data["Nama"]) ;
        $keterangan    =htmlspecialchars($data["Keterangan"]);
        $prefektur  =htmlspecialchars($data["Prefektur"]);
        $biaya=htmlspecialchars($data["Biaya"]);
        $buka=htmlspecialchars($data["Buka"]);
        // $gambar=htmlspecialchars($data["Gambar"]);

        $gambar=upload();
        // var_dump($gambar);die();
        if(!$gambar)
        {
            return false;
        }

        $query= " INSERT INTO wisata
                    VALUES
                    ('','$nama','$keterangan','$prefektur','$biaya','$buka','$gambar')";
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);
    }
    function tambahWilayah($data) {
        global $conn;
    
        $kawasan = htmlspecialchars($data["Kawasan"]);
        $prefektur = htmlspecialchars($data["Prefektur"]);
        $ibukota = htmlspecialchars($data["Ibukota"]);
        $pulau = htmlspecialchars($data["Pulau"]);
    
        $query = "INSERT INTO wilayah
                    VALUES
                    ('', '$kawasan', '$prefektur', '$ibukota', '$pulau')
                    ";
        mysqli_query($conn, $query);
    
        return mysqli_affected_rows($conn);
    }
    function upload(){
        $nama_file  =$_FILES['Gambar']['name'];
        $ukuran_file=$_FILES['Gambar']['size']; 
        $error      =$_FILES['Gambar']['error'];
        $tmpfile    =$_FILES['Gambar']['tmp_name'];
        
        if($error===4)
        {
            //pastikan pada inputan gambar tidak terdapat atribut required
            echo "
                <script>
                    alert('Tidak ada gambar yang diupload');
                </script>
            ";
            return false;
        }

        $jenis_gambar=['jpg','jpeg','gif','png'];
        $pecah_gambar=explode('.',$nama_file); 
        $pecah_gambar=strtolower(end($pecah_gambar));
        if(!in_array($pecah_gambar,$jenis_gambar))
        {
            echo "
                <script> 
                    alert('yang anda upload bukan file gambar');
                </script>
                ";
                return false;
        }

    
        // cek kapasitas gambar dalam byte kalau 1000000 byte = 1 Megabyte
        if($ukuran_file > 10000000)
        {
            echo "
                <script> 
                    alert('ukuran gambar terlalu besar');
                </script>    
            ";
            return false;
        }

        //generate id untuk penamaan gambar dengan function uniqid()
        $namafilebaru=uniqid(); 
        $namafilebaru .= '.';
        $namafilebaru .= $pecah_gambar;
        // var_dump ($namafilebaru);die();

        move_uploaded_file($tmpfile,'img/'.$namafilebaru);
        
        // kita return nama file nya agar dapat masuk ke $gambar=$upload() pada function tambah
        return $namafilebaru;
    }
    function hapusWisata($id){
        global $conn;

        $id = $_GET['id'];
        $tampilQ = "SELECT * FROM wisata WHERE id='$id';";
        $tampilSh = mysqli_query($conn,$tampilQ);
        $result=mysqli_fetch_assoc($tampilSh);

        unlink("img/".$result['gambar']);

        $query = "DELETE FROM wisata WHERE id = '$id';";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    }
    function hapusWilayah($id){
        global $conn;

        $id = $_GET['id'];
        $tampilQ = "SELECT * FROM wilayah WHERE id ='$id';";
        $tampilSh = mysqli_query($conn,$tampilQ);
        $result=mysqli_fetch_assoc($tampilSh);
        $query = "DELETE FROM wilayah WHERE id = '$id';";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    }
    function editWisata($data){
        global $conn;

        $id         =$data["id"];
        $nama       =htmlspecialchars($data["Nama"]) ;
        $keterangan =htmlspecialchars($data["Keterangan"]) ;
        $prefektur  =htmlspecialchars($data["Prefektur"]) ;
        $biaya      =htmlspecialchars($data["Biaya"]) ;
        $buka       =htmlspecialchars($data["Buka"]) ;
        $GambarLama =htmlspecialchars($data["GambarLama"]) ;

        // cek apakah user menekan button browse
        if($_FILES['Gambar']['error']===4)
        {
            $gambar=$GambarLama;
        }else
        {
            $gambar=upload();
        }
        
        $query= " UPDATE wisata SET 
                Nama = '$nama',
                Keterangan = '$keterangan',
                Prefektur = '$prefektur',
                Biaya = '$biaya',
                Buka = '$buka',
                Gambar = '$gambar'
                WHERE id = '$id'
                ";
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);
    }
    function editWilayah($data){
        global $conn;

        $id         =$data["id"];
        $kawasan    =htmlspecialchars($data["Kawasan"]) ;
        $prefektur  =htmlspecialchars($data["Prefektur"]) ;
        $ibukota    =htmlspecialchars($data["Ibukota"]) ;
        $pulau      =htmlspecialchars($data["Pulau"]) ;
        
        $query= " UPDATE wilayah SET 
                Kawasan = '$kawasan',
                Prefektur = '$prefektur',
                Ibukota = '$ibukota',
                Pulau = '$pulau'
                WHERE id = '$id'
                ";
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);
    }
    function registrasi($data){
        global $conn;
        $username = strtolower(stripslashes($data['username']));
        $email = strtolower(stripslashes($data['email']));
        $password = mysqli_real_escape_string($conn,$data['password']);
        $password2 = mysqli_real_escape_string($conn,$data['password2']);
        //cek username sudah ada atau belum
        $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                    alert('Username Sudah Terdaftar');
                </script>";
            return false;
        }
        //cek konfirmasi password
        if ($password !== $password2) {
            echo "<script>
                    alert('Konfirmasi Password Tidak Sesuai');
                </script>";
            return false;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($conn, "INSERT INTO users VALUES ('','$username','$email','$password')");
        return mysqli_affected_rows($conn);
    }
?>