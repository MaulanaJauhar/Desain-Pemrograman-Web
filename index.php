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
    $wilayah = getWilayah();
?>
<!DOCTYPE html>
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
  <body id="home">
    <header>
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
                  <i class="ri-home-3-line"></i>
                  <a href="#home">Wilayah</a>
                </li>
                <li>
                  <i class="ri-information-line"></i>
                  <a href="#about">Wisata</a>
                </li>
                <li>
                  <i class="ri-phone-line"></i>
                  <a href="#contact">Contact</a>
                </li>
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

      <!-- hero -->
      <section class="hero">
        <h1 class="animate__animated animate__pulse">Destinasi Wisata Di Jepang</h1>
      </section>
      <!-- hero -->
    </header>

    <!-- about -->
    <section class="about" id="about">
      <div class="container">
        <div class="box-about">
          <div class="box" data-aos="fade-right" data-aos-duration="1000">
            <h1>Japan Tourist Places</h1>
            <p>
                Japan is a country in East Asia. It is an island country in the Pacific Ocean. It has a population of about 126 million people. The capital and largest city is Tokyo. Japan is a member of the United Nations, G7, G20, and the OECD. Japan is the world's third-largest economy by nominal GDP and the world's fourth-largest economy by purchasing power parity (PPP).
            </p>
          </div>
          <div class="box" data-aos="zoom-in" data-aos-duration="1000">
            <img src="./img/img20.jpg" alt="" />
          </div>
        </div>
      </div>
    </section>
    <!-- about -->

    <!-- famous -->
    <section class="famous" id="famous">
      <div class="container">
        <div class="box-famous">
            <table class="table table-hover text-secondary bg-opacity-75">
                    <thead class="thead-light text-center">
                        <tr>
                            <th class="w-25">Nama</th>
                            <th>Lokasi</th>
                            <th>Biaya</th>
                            <th>Buka</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider h-50">
                        <?php $i=1?>
                        <?php foreach ($wisata as $row):?>
                            <tr class="text-center">
                                <td><?= $row["Nama"]; ?></td>
                                <td><?= $row["Prefektur"]; ?></td>
                                <td><?= $row["Biaya"]; ?></td>
                                <td><?= $row["Buka"]; ?></td>
                            </tr>
                        <?php $i++ ?>
                        <?php endforeach;?>
                    </tbody>
                </table>
        <!-- <?php $i=1?>
        <?php foreach ($wisata as $row):?>
          <div class="box " data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="100">
            <div class="row align-items-center">
                <div class="col-12">        
                    <img src="img/<?php echo $row["Gambar"]; ?>">
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-12">        
                    <h1><?= $row['Nama'];?></h1>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-12">        
                    <p><?= $row['Keterangan'];?></p>
                </div>
            </div>
          </div>
          <?php $i++;?>
          <?php endforeach;?> -->
        </div>
      </div>
    </section>
    <!-- famous -->

    <!-- gallery -->
    <section class="gallery" id="gallery">
      <div class="container">
          <h1>Gallery</h1>
        <div class="box-gallery">
            <?php $i=1?>
            <?php foreach ($wisata as $row):?>
                <div class="box" data-aos="zoom-in">
                    <img src="img/<?php echo $row["Gambar"]; ?>"srcset="">
                    <h5><?= $row['Nama'];?></h5>
                </div>
            <?php $i++;?>
            <?php endforeach;?>
        </div>
      </div>
    </section>
    <!-- gallery -->

    <!-- contact -->
    <section class="contact" id="contact">
      <div class="container">
        <div class="box-contact">
          <h1 data-aos="fade-right" data-aos-duration="1000" data-aos-delay="100">Contact</h1>
          <form action="">
            <table>
              <tr>
                <td><label for="nama">Nama</label></td>
                <td><input type="text" id="nama" name="nama" placeholder="Masukkan Nama" autocomplete="off" /></td>
              </tr>
              <tr>
                <td><label for="email">Email</label></td>
                <td><input type="email" id="email" name="email" placeholder="Masukkan Email" autocomplete="off" /></td>
              </tr>
              <tr>
                <td><label for="pesan">Pesan</label></td>
                <td><textarea name="pesan" id="pesan" placeholder="Masukkan Pesan..." autocomplete="off"></textarea></td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </section>
    <!-- contact -->

    <!-- footer -->
    <footer>
        <div class="footer-content">
            <div class="content-title">
                <h3><span>日本 </span>Kankō<span>-chi</span></h3>
            </div>
            <div class="text">
                <p>Politeknik Negeri Malang</p>
            </div>
            <div class="socials">
                <ul>
                    <li><a href="https://www.facebook.com/jauhar.maulana.525" target="_blank"><img src="img/fb.PNG" alt=""></a></li>
                    <li><a href="https://www.youtube.com/channel/UCDUlQvyaWMnlUhgtGS87U6w" target="_blank"><img src="img/youtube.PNG" alt=""></a></li>
                    <li><a href="https://bit.ly/3yKNATW" target="_blank"><img src="img/wa.PNG" alt=""></a></li>
                    <li><a href="https://twitter.com/maulana_ala?t=eCzzC7FynJoz1uvLQzLiig&s=08" target="_blank"><img src="img/twitter.png" alt=""></a></li>
                    <li><a href="https://bit.ly/3D1O36H" target="_blank"><img src="img/email.PNG" alt=""></a></li>
                    <li><a href="https://instagram.com/maaulana.ala?igshid=YmMyMTA2M2Y=" target="_blank"><img src="img/ig.PNG" alt=""></a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy;2022 <span>Jauhar Maulana A'la</span></p>
        </div>
    </footer>
    <!-- footer -->

    <script src="./dist/js/script.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
  </body>
</html>