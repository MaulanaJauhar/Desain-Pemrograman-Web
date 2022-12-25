<?php 
    session_start();
    if(!isset($_SESSION["login"]))
    {
        echo $_SESSION["login"];
        header("Location:login.php");
        exit;
    }
    require 'function.php';
    $wisata = getWisata();
    if (isset($_POST['submit'])) {
        // check if data has been added successfully
        if (tambahWisata($_POST) > 0) {
          echo "
            <script>
              alert('Data Berhasil Ditambahkan');
              document.location.href = 'admin/admin.php';
            </script>";
        } else {
          echo "
            <script>
              alert('Data Gagal Ditambahkan');
              document.location.href = 'tambahWisata.php';
            </script>";
        }
      }
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./dist/css/style.css" />
    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="font/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>Japan Tourist Places</title>
  </head>
  <style>
    html::-webkit-scrollbar{
            width: 0.5rem;
            background: transparent;
            scroll-behavior: smooth;
        }
        html::-webkit-scrollbar-thumb{
            background: lightgrey;
        }
  </style>
  <body id="home">
    <header class="header-tambah">
      <!-- navigation -->
      <section class="navigation">
        <div class="container">
          <div class="box-navigation animate__animated animate__fadeInDown">
            <div class="box">
                <h1><span>日本 </span>Kankō<span>-chi</span></h1>
            </div>
            <div class="box menu-navigation">
              <ul>
                <li>
                    <div class="dropdown show">
                        <a class="dropdown-toggle text-capitalize" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['username']; ?>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </div>
                </li>
              </ul>
            </div>
            <div class="box menu-bar">
              <i class="ri-menu-3-fill" style="color: white"></i>
            </div>
          </div>
        </div>
      </section>
      <!-- navigation -->
    </header>
    <section>
        <div class="container">
                <div class="col-6 justify-content-center align-items-center">
                    <figure class="text-center mt-4">
                        <blockquote class="blockquote">
                            <h1>Tambah Data</h1>
                        </blockquote>
                        <figcaption class="blockquote-footer">
                            <cite title="Source Title">Japan Tourist Places</cite>
                        </figcaption>
                    </figure>
                    <form action="" method="POST" enctype="multipart/form-data">
                            <ul>
                                <li class="mb-3 row">
                                    <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="Nama" class="form-control" id="Nama" placeholder="Masukkan Nama">
                                    </div>
                                </li>
                                <li class="mb-3 row">
                                    <label for="Keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="Keterangan" class="form-control" id="Keterangan" placeholder="Masukkan Keterangan" required>
                                    </div>
                                </li>
                                <li class="mb-3 row">
                                    <label for="Prefektur" class="col-sm-2 col-form-label">Lokasi</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="Prefektur" class="form-control" id="Prefektur" placeholder="Masukkan Lokasi">
                                    </div>
                                </li>
                                <li class="mb-3 row">
                                    <label for="Biaya" class="col-sm-2 col-form-label">Biaya</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="Biaya" class="form-control" id="Biaya" placeholder="Masukkan Biaya">
                                    </div>
                                </li>
                                <li class="mb-3 row">
                                    <label for="Buka" class="col-sm-2 col-form-label">Buka</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="Buka" class="form-control" id="Buka" placeholder="Masukkan Buka">
                                    </div>
                                </li>
                                <li class="mb-3 row">
                                    <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="gambar" type="file" id="gambar" accept="image/*">
                                    </div>
                                </li>
                                <li class="mb-3 row">
                                    <div class="col">
                                        <button class="btn btn-primary" name="submit" type="submit">Tambah Data</button>
                                    </div>
                                </li>
                            </ul>
                        </form>
                </div>
        </div>
    </section>