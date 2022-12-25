<div
        class="my-account-section section pt-90 pt-lg-70 pt-md-60 pt-sm-50 pt-xs-45  pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <div class="row">
                        <!-- My Account Tab Menu Start -->
                        <div class="col-lg-3 col-12">
                            <div class="myaccount-tab-menu nav" role="tablist">
                                <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i>
                                    Dashboard</a>
                                <a href="#wisata" data-toggle="tab"><i class="fa fa-user"></i> wisata</a>
                                <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                            </div>
                        </div>
                        <!-- My Account Tab Menu End -->

                        <!-- My Account Tab Content Start -->
                        <div class="col-lg-9 col-12">
                            <div class="tab-content" id="myaccountContent">
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Dashboard</h3>

                                        <div class="welcome mb-20">
                                            <p>Halo <strong><?php echo $_SESSION['username']; ?></strong> Anda telah
                                                login sebagai
                                                <b>Admin</b>.
                                            </p>
                                        </div>
                                        <?php 
                                            if (isset($_GET['pesan'])){
                                                $pesan = $_GET['pesan'];
                                                if($pesan == "updateb"){
                                                    echo "Data wisata berhasil di update";
                                                }
                                                if($pesan == "inputb"){
                                                    echo "Data wisata berhasil di update";
                                                }
                                                if($pesan == "hapusb"){
                                                    echo "Data wisata berhasil di hapus";
                                                }
                                            }else {
                                                ?> <p class="mb-0">Menu Admin </p> <?php
                                            }
                                            ?>


                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->

                                <!-- Single Tab Content End -->

                                <div class="tab-pane fade" id="wisata" role="tabpanel">

                                    <div class="myaccount-content">

                                        <h3>Daftar Wisata <a href="input_wisata.php" class="btn">Tambah wisata</a></h3>

                                        <div class="myaccount-table table-responsive text-center">

                                            <table class="table table-bordered">
                                                <thead class="thead-light">

                                                    <tr>
                                                        <th>Kode wisata</th>
                                                        <th>Nama wisata</th>
                                                        <th>Harga Tiket</th>

                                                        <th>Jumlah</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php 
                                            $select2 = mysqli_query($con,"SELECT * FROM wisata");
                                        
                                            while ($data2 = mysqli_fetch_array($select2)) {   
                                            ?>
                                                    <tr>
                                                        <td><?php echo$data2['kd_wisata']?></td>
                                                        <td><?php echo$data2['nama_wisata']?></td>
                                                        <td>Rp. <?php echo$data2['harga_tiket']?></td>
                                                        <td><?php echo$data2['open_closes']?></td>
                                                        <td><a href="edit_wisata.php?kd_wisata=<?php echo $data2['kd_wisata']; ?>"
                                                                class="btn">Edit</a>
                                                            <a href="delete_wisata.php?kd_wisata=<?php echo $data2['kd_wisata']; ?>"
                                                                class="btn">Delete</a>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- My Account Tab Content End -->
                    </div>

                </div>

            </div>
        </div>
    </div>