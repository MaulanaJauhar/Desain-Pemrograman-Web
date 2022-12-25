<?php
    require 'function.php';
    if(isset($_POST["register"])){
        if(registrasi($_POST) > 0){
            echo "<script>
                    alert('User Berhasil Ditambahkan!');
                </script>";
            header("Location: login.php");
        }else{
            echo mysqli_error($conn);
        }
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Japan Tourist Places</title>
        <link rel="shortcut icon" href="img/icon.png">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@500;600;700&display=swap" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="font/css/font-awesome.min.css">
    </head>
    <body>
        <div class="container">
            <section class="login d-flex">
                <div class="login-left w-50 h-100">
                    <div class="row justify-content-center align-items-center h-100">
                        <div class="col-6">
                            <div class="header text-center">
                                <h1><span>日本 </span>Kankō<span>-chi</span></h1>
                                <p class="mb-20">Japan Tourist Places</p>
                            </div>
                            <form action="" method="post">
                                <div class="login-form">
                                    <div class="mb-1">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="username" name="username" class="form-control" id="username" placeholder="Masukkan Username">
                                    </div>
                                    <div class="mb-1">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan Email">
                                    </div>
                                    <div class="mb-1">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan Password">
                                    </div>
                                    <div class="mb-1">
                                        <label for="password2" class="form-label">Konfirmasi Password</label>
                                        <input type="password" name="password2" class="form-control" id="password2" placeholder="Masukkan Password">
                                    </div>
                                    <button class="register" type="submit" name="register">Register</button>
                                    <div class="text-center">
                                        <span>Have Account ? <a class="text-decoration-none" href="login.php"> Login</a></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="login-right w-50 h-100">
                    <div class="row justify-content-center align-items-center h-100">
                        <div class="col-12">
                            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="img/img7.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/img8.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/img9.jpg" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <script src="js/bootstrap.bundle.min.js"></script>
    </body>
</html>