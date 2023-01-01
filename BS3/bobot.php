<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>BEASISWA XYZ</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


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
                <li>
                    <a href="index.php">
                        <i class="pe-7s-user"></i>
                        <p>Alternatif</p>
                    </a>
                </li>
                <li >
                    <a href="kriteria.php">
                        <i class="pe-7s-note2"></i>
                        <p>Kriteria</p>
                    </a>
                </li>
                <li class="active">
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
                <li>
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
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Bobot</a>
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

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Bobot</h4>
                                <p class="category">Tabel Bobot</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <td>No</td>
                                    <td>ID Bobot</td>
                                    <td>ID Kriteria</td>
                                    <td>Value</td>
                                    </thead>
                                    <tbody>
                                       
                                    <?php
                                    include 'config.php';
                                    include 'aksi_bobot.php';
                                    $no = 1;
                                    $query = "SELECT * FROM bobot";
                                    $result = $conn->query($query);
                                    while ($row = $result->fetch_array()) { ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row['id_bobot']; ?></td>
                                            <td><?php echo $row['id_kriteria']; ?></td>
                                            <td><?php echo $row['value']; ?></td>
                                        </tr>
                                    <?php } ?>

                                    <div class="content">
                                <form class='forms-sample' method='POST'>
                                <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Id Bobot</label>
                                                <input type="text" class="form-control" placeholder="ID Bobot" name="id">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label >Kriteria</label>
                                                <select class="form-control" placeholder="Kriteria" name="kriteria">
                                                <?php
                                                    
                    								$query = "SELECT * FROM kriteria";
                    								$result = $conn->query($query);
                    								while ($row = $result->fetch_array()) {
                    							?>
                    							<option value="<?php echo $row['id_kriteria']; ?>"><?php echo $row['nama_kriteria']; ?></option>
                    							<?php
                    								}
                    							?>
                    						</select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>value</label>
                                                <input type="text" class="form-control" placeholder="Value" name="value">
                                            </div>
                                        </div>
                                    </div>
                                    <button type='submit' name='insert' class='btn btn-primary mr-2'>Insert</button>
                                </form>
                                    </div>

                                   
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>


                   

                </div>
            </div>
        </div>


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


