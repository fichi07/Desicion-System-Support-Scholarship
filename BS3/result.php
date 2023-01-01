<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>DSS BEASISWA XYZ</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet" />


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>

<body>

    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

            <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


            <div class="sidebar-wrapper">


                <ul class="nav">
                    <li class="active">
                        <a href="index.php">
                            <i class="pe-7s-user"></i>
                            <p>Alternatif</p>
                        </a>
                    </li>
                    <li>
                        <a href="kriteria.php">
                            <i class="pe-7s-note2"></i>
                            <p>Kriteria</p>
                        </a>
                    </li>
                    <li>
                        <a href="bobot.php">
                            <i class="pe-7s-news-paper"></i>
                            <p>Bobot</p>
                        </a>
                    </li>
                    <li>
                        <a href="skala.php">
                            <i class="pe-7s-science"></i>
                            <p>Skala</p>
                        </a>
                    </li>
                    <li>
                        <a href="matrix.php">
                            <i class="pe-7s-map-marker"></i>
                            <p>Matrix</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="result.php">
                            <i class="pe-7s-bell"></i>
                            <p>Result</p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>

        <div class="main-panel">
            <nav class="navbar navbar-default navbar-fixed">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#navigation-example-2">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Result</a>
                    </div>
                    <div class="collapse navbar-collapse">

                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
                                        Dropdown
                                        <b class="caret"></b>
                                    </p>

                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <p>Log out</p>
                                </a>
                            </li>
                            <li class="separator hidden-lg hidden-md"></li>
                        </ul>
                    </div>
                </div>
            </nav>


            <section class="inner-page">
                <div class="container">
                    <table class="table">

                        <thead>
                            <tr>
                                <th scope="col">Metode</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td><a href="result.php?metode=saw">SAW</a></td>
                            <td><a href="result.php?metode=wp">WP</a></td>
                            <td><a href="result.php?metode=topsis">Topsis</a></td>
                            <td><a href="result.php?metode=multimoora">Multimoora</a></td>
                        </tbody>
                    </table>
                </div>
            </section>

            <?php
    include('config.php');
    $url = $_GET['metode'];
      //metode SAW
      $matrixSAW  = $conn->query("SELECT vmatrixkeputusan.* FROM vmatrixkeputusan GROUP BY id_matrix ");
      $normalisasiSAW = $conn->query("SELECT vnormalisasi.* FROM vnormalisasi GROUP BY id_matrix ");
      $rangkingSAW = $conn->query("SELECT vrangking.* FROM vrangking GROUP BY id_alternatif ");

      //metode WP
      $matrixWP  = $conn->query("SELECT wp_matrixkeputusan.* FROM wp_matrixkeputusan GROUP BY id_matrix ");
      $normalisasiWP = $conn->query("SELECT wp_normalisasi.* FROM wp_normalisasi");
      $pangkatWP = $conn->query("SELECT wp_pangkat.* FROM wp_pangkat");
      $nilaiSWP = $conn->query("SELECT wp_nilais.* FROM wp_nilais GROUP BY id_alternatif ");
      $nilaiVWP = $conn->query("SELECT wp_nilaiv.* FROM wp_nilaiv");

      //metode Topsis
      $matrixtopsis  = $conn->query("SELECT wp_matrixkeputusan.* FROM wp_matrixkeputusan GROUP BY id_matrix ");
      $normalisasitopsis = $conn->query("SELECT topsis_normalisasi.* FROM topsis_normalisasi");
      $bagiTopsis = $conn->query("SELECT topsis_pembagi.* FROM topsis_pembagi");
      $topsisMaxmin = $conn->query("SELECT topsis_maxmin.* FROM topsis_maxmin GROUP BY id_kriteria ");
      $topsisSipsin = $conn->query("SELECT topsis_sipsin.* FROM topsis_sipsin");
      $terbobot = $conn->query("SELECT topsis_terbobot.* FROM topsis_terbobot");
      $nilaiv = $conn->query("SELECT topsis_nilaiv.* FROM topsis_nilaiv");


         //metode Multimoora
         $matrixmultimora  = $conn->query("SELECT matrix_keputusan.* FROM matrix_keputusan GROUP BY id_matrix ");
         $pranormalisasi = $conn->query("SELECT mora_pra.* FROM mora_pra");
         $moranormalisasi = $conn->query("SELECT mora_normalisasi.* FROM mora_normalisasi");
         $moraterbobot = $conn->query("SELECT mora_terbobot.* FROM mora_terbobot GROUP BY id_matrix ");
         $morarangking = $conn->query("SELECT mora_rangking.* FROM mora_rangking");

    if ($url == 'saw') { ?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Result Matrix Keputusan</h4>
                                    <p class="category">Tabel result matrix Keputusan</p>
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <td>No</td>
                                            <td>ID Matrix</td>
                                            <td>ID Alternatif</td>
                                            <td>Nama Alternatif</td>
                                            <td>ID Kriteria</td>
                                            <td>Nama Kriteria</td>
                                            <td>ID Bobot</td>
                                            <td>Value</td>
                                            <td>Nilai</td>
                                            <td>Keterangan</td>
                                        </thead>
                                        <tbody>

                                            <?php
                                    $no = 1;
                                    while ($row = $matrixSAW->fetch_array()) { ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row['id_matrix']; ?></td>
                                                <td><?php echo $row['id_alternatif']; ?></td>
                                                <td><?php echo $row['nama_alternatif']; ?></td>
                                                <td><?php echo $row['id_kriteria']; ?></td>
                                                <td><?php echo $row['nama_kriteria']; ?></td>
                                                <td><?php echo $row['id_bobot']; ?></td>
                                                <td><?php echo $row['value']; ?></td>
                                                <td><?php echo $row['nilai']; ?></td>
                                                <td><?php echo $row['keterangan']; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Result Tabel Normalisasi</h4>
                                    <p class="category">Tabel result matrix Keputusan</p>
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <td>No</td>
                                            <td>ID Matrix</td>
                                            <td>ID Alternatif</td>
                                            <td>Nama Alternatif</td>
                                            <td>ID Kriteria</td>
                                            <td>Nama Kriteria</td>
                                            <td>ID Bobot</td>
                                            <td>Value</td>
                                            <td>Nilai</td>
                                            <td>Keterangan</td>
                                            <td>Normalisasi</td>
                                        </thead>
                                        <tbody>

                                            <?php
                                    $no = 1;
                                    while ($row = $normalisasiSAW->fetch_array()) { ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row['id_matrix']; ?></td>
                                                <td><?php echo $row['id_alternatif']; ?></td>
                                                <td><?php echo $row['nama_alternatif']; ?></td>
                                                <td><?php echo $row['id_kriteria']; ?></td>
                                                <td><?php echo $row['nama_kriteria']; ?></td>
                                                <td><?php echo $row['id_bobot']; ?></td>
                                                <td><?php echo $row['value']; ?></td>
                                                <td><?php echo $row['nilai']; ?></td>
                                                <td><?php echo $row['keterangan']; ?></td>
                                                <td><?php echo $row['normalisasi']; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Result Tabel Prankingan</h4>
                                    <p class="category">Tabel result matrix Keputusan</p>
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <td>No</td>
                                            <td>ID Alternatif</td>
                                            <td>Nama Alternatif</td>
                                            <td>Rangking</td>
                                        </thead>
                                        <tbody>

                                            <?php
                                    $no = 1;
                                    while ($row = $rangkingSAW->fetch_array()) { ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row['id_alternatif']; ?></td>
                                                <td><?php echo $row['nama_alternatif']; ?></td>
                                                <td><?php echo $row['ranking']; ?></td>
                                            </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <?php } else if ($url == 'wp') { ?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Result Matrix Keputusan WP</h4>
                                    <p class="category">Tabel result matrix Keputusan WP</p>
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <td>No</td>
                                            <td>ID Matrix</td>
                                            <td>ID Alternatif</td>
                                            <td>Nama Alternatif</td>
                                            <td>ID Kriteria</td>
                                            <td>Nama Kriteria</td>
                                            <td>ID Bobot</td>
                                            <td>Value</td>
                                            <td>Nilai</td>
                                            <td>Keterangan</td>
                                        </thead>
                                        <tbody>

                                            <?php
                                    $no = 1;
                                    while ($row = $matrixWP->fetch_array()) { ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row['id_matrix']; ?></td>
                                                <td><?php echo $row['id_alternatif']; ?></td>
                                                <td><?php echo $row['nama_alternatif']; ?></td>
                                                <td><?php echo $row['id_kriteria']; ?></td>
                                                <td><?php echo $row['nama_kriteria']; ?></td>
                                                <td><?php echo $row['id_bobot']; ?></td>
                                                <td><?php echo $row['value']; ?></td>
                                                <td><?php echo $row['nilai']; ?></td>
                                                <td><?php echo $row['keterangan']; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Result Tabel Normalisasi WP</h4>
                                    <p class="category">Tabel result matrix Keputusan WP</p>
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <td>No</td>
                                            <td>ID Bobot</td>
                                            <td>ID Kriteria</td>
                                            <td>Nama Kriteria</td>
                                            <td>Value</td>
                                            <td>Atribut</td>
                                            <td>Jumlah</td>
                                            <td>Normalisasi WP</td>
                                        </thead>
                                        <tbody>

                                            <?php
                                    $no = 1;
                                    while ($row = $normalisasiWP->fetch_array()) { ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row['id_bobot']; ?></td>
                                                <td><?php echo $row['id_kriteria']; ?></td>
                                                <td><?php echo $row['nama_kriteria']; ?></td>
                                                <td><?php echo $row['value']; ?></td>
                                                <td><?php echo $row['atribut']; ?></td>
                                                <td><?php echo $row['jumlah']; ?></td>
                                                <td><?php echo $row['normalisasi_wp']; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Result pangkat WP</h4>
                                    <p class="category">Tabel pangkat WP</p>
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <td>No</td>
                                            <td>ID Matrix</td>
                                            <td>ID Alternatif</td>
                                            <td>Nama Alternatif</td>
                                            <td>ID Kriteria</td>
                                            <td>Nama Kriteria</td>
                                            <td>ID Bobot</td>
                                            <td>Value</td>
                                            <td>Nilai</td>
                                            <td>Keterangan</td>
                                            <td>Normalisasi WP</td>
                                            <td>Pangkat</td>
                                        </thead>
                                        <tbody>

                                            <?php
                                    $no = 1;
                                    while ($row = $pangkatWP->fetch_array()) { ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row['id_matrix']; ?></td>
                                                <td><?php echo $row['id_alternatif']; ?></td>
                                                <td><?php echo $row['nama_alternatif']; ?></td>
                                                <td><?php echo $row['id_kriteria']; ?></td>
                                                <td><?php echo $row['nama_kriteria']; ?></td>
                                                <td><?php echo $row['id_bobot']; ?></td>
                                                <td><?php echo $row['value']; ?></td>
                                                <td><?php echo $row['nilai']; ?></td>
                                                <td><?php echo $row['keterangan']; ?></td>
                                                <td><?php echo $row['normalisasi_wp']; ?></td>
                                                <td><?php echo $row['pangkat']; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Result Tabel Nilai S</h4>
                                    <p class="category">Tabel result Nilai S</p>
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <td>No</td>
                                            <td>ID Alternatif</td>
                                            <td>Nama Alternatif</td>
                                            <td>Nilai S</td>
                                        </thead>
                                        <tbody>

                                            <?php
                                    $no = 1;
                                    while ($row = $nilaiSWP->fetch_array()) { ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row['id_alternatif']; ?></td>
                                                <td><?php echo $row['nama_alternatif']; ?></td>
                                                <td><?php echo $row['nilaiS']; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Result Tabel Nilai V</h4>
                                    <p class="category">Tabel result Nilai V</p>
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <td>No</td>
                                            <td>ID Alternatif</td>
                                            <td>Nama Alternatif</td>
                                            <td>Nilai S</td>
                                        </thead>
                                        <tbody>

                                            <?php
                                    $no = 1;
                                    while ($row = $nilaiVWP->fetch_array()) { ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row['id_alternatif']; ?></td>
                                                <td><?php echo $row['nama_alternatif']; ?></td>
                                                <td><?php echo $row['nilaiV']; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <?php } else if ($url == 'topsis') { ?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Result Matrix Keputusan Topsis</h4>
                                    <p class="category">Tabel result matrix Keputusan Topsis</p>
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <td>No</td>
                                            <td>ID Matrix</td>
                                            <td>ID Alternatif</td>
                                            <td>Nama Alternatif</td>
                                            <td>ID Kriteria</td>
                                            <td>Nama Kriteria</td>
                                            <td>ID Bobot</td>
                                            <td>Value</td>
                                            <td>Nilai</td>
                                            <td>Keterangan</td>
                                        </thead>
                                        <tbody>
                                            <?php
                                    $no = 1;
                                    while ($row = $matrixtopsis->fetch_array()) { ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row['id_matrix']; ?></td>
                                                <td><?php echo $row['id_alternatif']; ?></td>
                                                <td><?php echo $row['nama_alternatif']; ?></td>
                                                <td><?php echo $row['id_kriteria']; ?></td>
                                                <td><?php echo $row['nama_kriteria']; ?></td>
                                                <td><?php echo $row['id_bobot']; ?></td>
                                                <td><?php echo $row['value']; ?></td>
                                                <td><?php echo $row['nilai']; ?></td>
                                                <td><?php echo $row['keterangan']; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Result Tabel Normalisasi Topsis</h4>
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <td>No</td>
                                            <td>ID Matrix</td>
                                            <td>ID Alternatif</td>
                                            <td>Nama Alternatiff</td>
                                            <td>ID Kriteria</td>
                                            <td>Nama Kriteria</td>
                                            <td>Atribut</td>
                                            <td>ID Bobot</td>
                                            <td>Value</td>
                                            <td>Nilai</td>
                                            <td>Keterangan</td>
                                            <td>Normalisasi</td>
                                        </thead>
                                        <tbody>

                                            <?php
                                    $no = 1;
                                    while ($row = $normalisasitopsis->fetch_array()) { ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row['id_matrix']; ?></td>
                                                <td><?php echo $row['id_alternatif']; ?></td>
                                                <td><?php echo $row['nama_alternatif']; ?></td>
                                                <td><?php echo $row['id_kriteria']; ?></td>
                                                <td><?php echo $row['nama_kriteria']; ?></td>
                                                <td><?php echo $row['atribut']; ?></td>
                                                <td><?php echo $row['id_bobot']; ?></td>
                                                <td><?php echo $row['value']; ?></td>
                                                <td><?php echo $row['nilai']; ?></td>
                                                <td><?php echo $row['keterangan']; ?></td>
                                                <td><?php echo $row['normalisasi']; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Result Terbobot</h4>                                   
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <td>No</td>
                                            <td>ID Matrix</td>
                                            <td>ID Alternatif</td>
                                            <td>Nama Alternatif</td>
                                            <td>ID Kriteria</td>
                                            <td>Nama Kriteria</td>
                                            <td>Atribut</td>
                                            <td>ID Bobot</td>
                                            <td>Value</td>
                                            <td>Nilai </td>
                                            <td>Keterangan</td>
                                            <td>Normalisasi</td>
                                            <td>Terbobot</td>
                                        </thead>
                                        <tbody>

                                            <?php
                                    $no = 1;
                                    while ($row = $terbobot->fetch_array()) { ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row['id_matrix']; ?></td>
                                                <td><?php echo $row['id_alternatif']; ?></td>
                                                <td><?php echo $row['nama_alternatif']; ?></td>
                                                <td><?php echo $row['id_kriteria']; ?></td>
                                                <td><?php echo $row['nama_kriteria']; ?></td>
                                                <td><?php echo $row['atribut']; ?></td>
                                                <td><?php echo $row['id_bobot']; ?></td>
                                                <td><?php echo $row['value']; ?></td>
                                                <td><?php echo $row['nilai']; ?></td>
                                                <td><?php echo $row['keterangan']; ?></td>
                                                <td><?php echo $row['normalisasi']; ?></td>
                                                <td><?php echo $row['terbobot']; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Result pembagi Topsis</h4>
                                    <p class="category">Tabel pembagi Topsis</p>
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <td>No</td>
                                            <td>ID Kriteria</td>
                                            <td>Nama Kriteria</td>
                                            <td>Pembagi</td> 
                                        </thead>
                                        <tbody>

                                            <?php
                                    $no = 1;
                                    while ($row = $bagiTopsis->fetch_array()) { ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row['id_kriteria']; ?></td>
                                                <td><?php echo $row['nama_kriteria']; ?></td>
                                                <td><?php echo $row['bagi']; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Result Max Min</h4>
                                    
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <td>No</td>
                                            <td>ID kriteria</td>
                                            <td>Nama Kriteria</td>
                                            <td>Atribut</td>
                                            <td>Maximum</td>
                                            <td>Minimum</td>
                                        </thead>
                                        <tbody>

                                            <?php
                                    $no = 1;
                                    while ($row = $topsisMaxmin->fetch_array()) { ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row['id_kriteria']; ?></td>
                                                <td><?php echo $row['nama_kriteria']; ?></td>
                                                <td><?php echo $row['atribut']; ?></td>
                                                <td><?php echo $row['maximum']; ?></td>
                                                <td><?php echo $row['minimum']; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Result Nilai V</h4>                                   
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <td>No</td>
                                            <td>ID Alternatif</td>
                                            <td>Dplus</td>
                                            <td>Dmin</td>
                                            <td>Nilai V</td>
                                        
                                        </thead>
                                        <tbody>

                                            <?php
                                    $no = 1;
                                    while ($row = $nilaiv->fetch_array()) { ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row['id_alternatif']; ?></td>
                                                <td><?php echo $row['dplus']; ?></td>
                                                <td><?php echo $row['dmin']; ?></td>
                                                <td><?php echo $row['nilaiv']; ?></td>
                                                
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                       
             <?php } else if ($url == 'multimoora') { ?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Result Matrix Keputusan Multimoora</h4>
                                    <p class="category">Tabel result matrix Keputusan Multimoora</p>
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <td>No</td>
                                            <td>ID Matrix</td>
                                            <td>ID Alternatif</td>
                                            <td>Nama Alternatif</td>
                                            <td>ID Kriteria</td>
                                            <td>Nama Kriteria</td>
                                            <td>ID Bobot</td>
                                            <td>Value</td>
                                            <td>Nilai</td>
                                            <td>Keterangan</td>
                                        </thead>
                                        <tbody>
                                            <?php
                                    $no = 1;
                                    while ($row = $matrixtopsis->fetch_array()) { ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row['id_matrix']; ?></td>
                                                <td><?php echo $row['id_alternatif']; ?></td>
                                                <td><?php echo $row['nama_alternatif']; ?></td>
                                                <td><?php echo $row['id_kriteria']; ?></td>
                                                <td><?php echo $row['nama_kriteria']; ?></td>
                                                <td><?php echo $row['id_bobot']; ?></td>
                                                <td><?php echo $row['value']; ?></td>
                                                <td><?php echo $row['nilai']; ?></td>
                                                <td><?php echo $row['keterangan']; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Result Tabel Normalisasi Pra Multimoora</h4>
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <td>No</td>
                                            <td>ID Kriteria</td>
                                            <td>Nama Kriteria</td>
                                            <td>Atribut</td>
                                            <td>Pra</td>
                                        </thead>
                                        <tbody>

                                            <?php
                                    $no = 1;
                                    while ($row = $pranormalisasi->fetch_array()) { ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row['id_kriteria']; ?></td>
                                                <td><?php echo $row['nama_kriteria']; ?></td>
                                                <td><?php echo $row['atribut']; ?></td>
                                                <td><?php echo $row['pra']; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Result Normalisasi</h4>                                   
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <td>No</td>
                                            <td>ID Matrix</td>
                                            <td>ID Alternatif</td>
                                            <td>Nama Alternatif</td>
                                            <td>ID Kriteria</td>
                                            <td>Nama Kriteria</td>
                                            <td>Atribut</td>
                                            <td>ID Bobot</td>
                                            <td>Value</td>
                                            <td>Nilai </td>
                                            <td>Keterangan</td>
                                            <td>Pra</td>
                                            <td>Normalisasi</td>
                                        </thead>
                                        <tbody>

                                            <?php
                                    $no = 1;
                                    while ($row = $moranormalisasi->fetch_array()) { ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row['id_matrix']; ?></td>
                                                <td><?php echo $row['id_alternatif']; ?></td>
                                                <td><?php echo $row['nama_alternatif']; ?></td>
                                                <td><?php echo $row['id_kriteria']; ?></td>
                                                <td><?php echo $row['nama_kriteria']; ?></td>
                                                <td><?php echo $row['atribut']; ?></td>
                                                <td><?php echo $row['id_bobot']; ?></td>
                                                <td><?php echo $row['value']; ?></td>
                                                <td><?php echo $row['nilai']; ?></td>
                                                <td><?php echo $row['keterangan']; ?></td>
                                                <td><?php echo $row['pra']; ?></td>
                                                <td><?php echo $row['normalisasi']; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Result Terbobot</h4>                                   
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <td>No</td>
                                            <td>ID Matrix</td>
                                            <td>ID Alternatif</td>
                                            <td>Nama Alternatif</td>
                                            <td>ID Kriteria</td>
                                            <td>Nama Kriteria</td>
                                            <td>Atribut</td>
                                            <td>ID Bobot</td>
                                            <td>Value</td>
                                            <td>Nilai </td>
                                            <td>Keterangan</td>
                                            <td>Pra</td>
                                            <td>Normalisasi</td>
                                            <td>Normalisasi Terbobot</td>
                                        </thead>
                                        <tbody>

                                            <?php
                                    $no = 1;
                                    while ($row = $moraterbobot->fetch_array()) { ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row['id_matrix']; ?></td>
                                                <td><?php echo $row['id_alternatif']; ?></td>
                                                <td><?php echo $row['nama_alternatif']; ?></td>
                                                <td><?php echo $row['id_kriteria']; ?></td>
                                                <td><?php echo $row['nama_kriteria']; ?></td>
                                                <td><?php echo $row['atribut']; ?></td>
                                                <td><?php echo $row['id_bobot']; ?></td>
                                                <td><?php echo $row['value']; ?></td>
                                                <td><?php echo $row['nilai']; ?></td>
                                                <td><?php echo $row['keterangan']; ?></td>
                                                <td><?php echo $row['pra']; ?></td>
                                                <td><?php echo $row['normalisasi']; ?></td>
                                                <td><?php echo $row['normalisasiTerbobot']; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Result Nilai Rangking</h4>                                   
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <td>No</td>
                                            <td>ID Alternatif</td>
                                            <td>Nama Alternatif</td>
                                            <td>Hasil</td>
                                        
                                        </thead>
                                        <tbody>

                                            <?php
                                    $no = 1;
                                    while ($row = $morarangking->fetch_array()) { ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row['id_alternatif']; ?></td>
                                                <td><?php echo $row['nama_alternatif']; ?></td>
                                                <td><?php echo $row['hasil']; ?></td>
                                                
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                       

                    </div>
                </div>
            </div>

            <?php } else { ?>
            <div class="container">
                <h3>Anda belum memasukkan $_GET. Contoh seperti result.php?metode=saw</h3>
            </div>
            <?php } ?>
          


        </div>
    </div>


</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>


</html>