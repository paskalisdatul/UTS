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
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_peserta
    if (isset($_GET['id_favorit'])) {
        $id_favorit=($_GET["id_favorit"]);

        $sql="select * from favorit where id_favorit=$id_favorit";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_favorit=htmlspecialchars($_POST["id_favorit"]);
        $judul=($_POST["judul"]);
        $penyanyi=($_POST["penyanyi"]);
        $tahun=($_POST["tahun"]);
    
        //Query update data pada tabel anggota
        $sql="update favorit set
			judul='$judul',
			penyanyi='$penyanyi',
			tahun='$tahun'
			where id_favorit=$id_favorit";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
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
            <div class="container"><a class="navbar-brand me-lg-auto cursor-pointer" href="">Ubah Musik Favorit</a>
            </div>
          </nav>
          <div class="container" data-bs-target="#navbar-top" data-bs-spy="scroll" tabindex="0">
            <div class="mb-9 mb-lg-10 mb-xxl-11 text-center text-lg-start mt-9">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <div class="row g-4 g-lg-6 g-xl-7 mb-6 mb-lg-7 mb-xl-10 align-items-center">
                        <div class="mb-3 row">
                            <label for="Judul" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="judul" value="<?php echo $data["judul"]; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="penyanyi" class="col-sm-2 col-form-label">penyanyi</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="penyanyi" value="<?php echo $data["penyanyi"]; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tahun" class="col-sm-2 col-form-label">Tahun Rilis</label>
                            <div class="col-sm-10">
                            <input type="date" class="form-control" name="tahun" value="<?php echo $data["tahun"]; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-10">
                            <input type="hidden" name="id_favorit" value="<?php echo $data['id_favorit']; ?>" />
                            <button type="submit" name="submit" class="btn btn-success"> Simpan </button>
                            <a href="index.php" class="btn btn-warning"> Batal </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
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