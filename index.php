<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Web Programming</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="assets/js/config.js"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="stylesheet" href="vendors/swiper/swiper-bundle.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="assets/css/theme.css" rel="stylesheet" id="style-default">
    <link href="assets/css/user-rtl.css" rel="stylesheet" id="user-style-rtl">
    <link href="assets/css/user.css" rel="stylesheet" id="user-style-default">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  </head>


  <body>
  <?php
      include "koneksi.php";
      //Cek apakah ada kiriman form dari method post
      if (isset($_GET['id_daftarmusik'])) {
      $id_daftarmusik=htmlspecialchars($_GET["id_daftarmusik"]);
      $sql="delete from daftarmusik where id_daftarmusik='$id_daftarmusik' ";
      $hasil=mysqli_query($kon,$sql);
      //Kondisi apakah berhasil atau tidak
      if ($hasil) {
          header("Location:index.php");
            }
            else {
            echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
            }
          }
  ?>

<?php
      include "koneksi.php";
      //Cek apakah ada kiriman form dari method post
      if (isset($_GET['id_artis'])) {
      $id_artis=htmlspecialchars($_GET["id_artis"]);
      $sql="delete from artis where id_artis='$id_artis' ";
      $hasil=mysqli_query($kon,$sql);
      //Kondisi apakah berhasil atau tidak
      if ($hasil) {
          header("Location:index.php");
            }
            else {
            echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
            }
          }
  ?>

<?php
      include "koneksi.php";
      //Cek apakah ada kiriman form dari method post
      if (isset($_GET['id_favorit'])) {
      $id_favorit=htmlspecialchars($_GET["id_favorit"]);
      $sql="delete from favorit where id_favorit='$id_favorit' ";
      $hasil=mysqli_query($kon,$sql);
      //Kondisi apakah berhasil atau tidak
      if ($hasil) {
          header("Location:index.php");
            }
            else {
            echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
            }
          }
  ?>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="bg-white">
        <div class="content">
          <nav class="navbar navbar-expand-lg py-1" id="navbar-top" data-navbar-soft-on-scroll="data-navbar-soft-on-scroll">
            <div class="container"><a class="navbar-brand me-lg-auto cursor-pointer" href="">My Music</a>
              <button class="navbar-toggler border-0 pe-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent" data-navbar-collapse="data-navbar-collapse">
                <div class="container d-lg-flex justify-content-lg-end pe-lg-0 w-lg-100">
                  <ul class="navbar-nav mt-2 mt-lg-1 ms-lg-4 ms-xl-8 ms-2xl-9 gap-lg-x1" data-navbar-nav="data-navbar-nav">
                    <li class="nav-item"> <a class="nav-link nav-bar-item px-0" href="#home" title="home">Daftar Musik</a></li>
                    <li class="nav-item"> <a class="nav-link nav-bar-item px-0" href="#favorit" title="favorit">Music Favorit</a></li>
                    <li class="nav-item"> <a class="nav-link nav-bar-item px-0" href="#artis" title="artis">Artis</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </nav>
          <div class="container" data-bs-target="#navbar-top" data-bs-spy="scroll" tabindex="0">
            <section class="mb-9 mb-lg-10 mb-xxl-11 text-center text-lg-start mt-9" id="home">
              <div>
                <div class="row g-4 g-lg-6 g-xl-7 mb-6 mb-lg-7 mb-xl-10 align-items-center">
                <div>
                   <a href="create_musik.php" class="btn btn-warning" role="button">Tambah Data</a>
                </div>
                <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Judul</th>
                          <th scope="col">Penyanyi</th>
                          <th scope="col">Tahun Rilis</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          include "koneksi.php";
                          $sql="select * from daftarmusik order by id_daftarmusik desc";
                          $hasil=mysqli_query($kon,$sql);
                          $no=0;
                          while ($data = mysqli_fetch_array($hasil)) {
                              $no++;
                              ?>
                        <tr>
                          <td> <?php echo $no;   ?></td>
                          <td> <?php echo $data["judul"];   ?></td>
                          <td> <?php echo $data["penyanyi"];   ?></td>
                          <td> <?php echo $data["tahun"];   ?></td>
                          <td>
                               <a href="update_musik.php?id_daftarmusik=<?php echo htmlspecialchars($data['id_daftarmusik']); ?>" class="btn btn-secondary" role="button">Update</a>
                               <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_daftarmusik=<?php echo $data['id_daftarmusik']; ?>" class="btn btn-danger" role="button">Delete</a>
                          </td>
                        </tr>
                      </tbody>
                      <?php } ?>
                   </table>
                </div>
              </div>
            </section>
            <section class="mb-9 mb-lg-10 mb-xxl-11 text-center text-lg-start" id="favorit">
              <h4 class="mb-x1 fs-8 fs-md-7 fs-xxl-6 text-success fw-bold pt-6 text-capitalize">Music Favorit </h4>
               <div>
                   <a href="create_favorit.php" class="btn btn-warning" role="button">Tambah Data</a>
               </div>
              <table class="table table-striped">
                  <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Penyanyi</th>
                        <th scope="col">Tahun Rilis</th>
                        <th></th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                          include "koneksi.php";
                          $sql="select * from favorit order by id_favorit desc";
                          $hasil=mysqli_query($kon,$sql);
                          $no=0;
                          while ($data = mysqli_fetch_array($hasil)) {
                              $no++;
                              ?>
                      <tr>
                          <td> <?php echo $no;   ?></td>
                          <td> <?php echo $data["judul"];   ?></td>
                          <td> <?php echo $data["penyanyi"];   ?></td>
                          <td> <?php echo $data["tahun"];   ?></td>
                        <td>
                          <a href="update_favorit.php?id_favorit=<?php echo htmlspecialchars($data['id_favorit']); ?>" class="btn btn-secondary" role="button">Update</a>
                          <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_favorit=<?php echo $data['id_favorit']; ?>" class="btn btn-danger" role="button">Delete</a>
                        </td>
                       </tr>
                  </tbody>
                      <?php } ?>
              </table>
            </section>
            <section class="mb-9 mb-lg-10 mb-xxl-11 text-center text-md-start" id="artis">
              <h3 class="mb-x1 fs-8 fs-md-7 fs-xxl-6 text-success fw-bold pt-6">Artis </h3>
                <div>
                   <a href="create_artis.php" class="btn btn-warning" role="button">Tambah Data</a>
                </div>
                <table class="table table-striped">
                  <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Artis</th>
                        <th></th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                          include "koneksi.php";
                          $sql="select * from artis order by id_artis desc";
                          $hasil=mysqli_query($kon,$sql);
                          $no=0;
                          while ($data = mysqli_fetch_array($hasil)) {
                              $no++;
                              ?>
                      <tr>
                        <td> <?php echo $no;   ?></td>
                        <td> <?php echo $data["namaartis"];   ?></td>
                        <td>
                          <a href="update_artis.php?id_artis=<?php echo htmlspecialchars($data['id_artis']); ?>" class="btn btn-secondary" role="button">Update</a>
                          <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_artis=<?php echo $data['id_artis']; ?>" class="btn btn-danger" role="button">Delete</a>
                        </td>
                       </tr>
                  </tbody>
                      <?php } ?>
              </table>    
            </section>
          <footer class="Footer">
            <div class="bg-success py-2 py-md-3 position-relative terms-condition">
              <center>
              <div class="overley-background">2024@speKTrum</div>
            </center>
            </div>
          </footer>
        </div>
      </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="vendors/popper/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="vendors/countup/countUp.umd.js"></script>
    <script src="vendors/swiper/swiper-bundle.min.js"></script>
    <script src="vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="vendors/list.js/list.min.js"></script>
    <script src="assets/js/theme.js"></script>

  </body>

</html>