<?php
include("config.php");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Vesta</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Vesta</a>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                          <a href="list.php"><i class="fa fa-list fa-fw"></i> List</a>
                        </li>
                        <li>
                          <a href="map.php"><i class="fa fa-map-marker fa-fw"></i> Map</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                      <h1>Dashboard</h1>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h3 class="panel-title"><i class="fa fa-star fa-fw"></i>Favorites</h3>
                        </div>
                        <div class="panel-body">
                          <div class="list-group">

                           <?php

                              $sql = "SELECT * FROM favorites INNER JOIN locations ON favorites.name=locations.name WHERE username = 'victor'";
                              $result = $conn->query($sql);
                              if ($result->num_rows > 0) {
                                  // output data of each row
                                  while($row = $result->fetch_assoc()) {
                                      $percent1 = round(($row["ppres"] / $row["pcap"])*100,0);
                                      $percent2 = round(($row["cpres"] / $row["ccap"])*100,0);
                                      echo '<a href="#" class="list-group-item">';
                                      echo '<p><strong>'.$row["name"].'</strong> <span class="badge"><i class="fa fa-star fa-fw"></i> 3.0</span></p>';
                                      echo '<div class="progress progress-striped active"><div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="'.$percent1.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$percent1.'%"><span class="show"><i class="fa fa-user fa-fw"></i>'.$row["ppres"].' / '.$row["pcap"].'</span></div></div>';
                                      echo '<div class="progress progress-striped active"><div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="'.$percent2.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$percent2.'%"><span class="show"><i class="fa fa-desktop fa-fw"></i>'.$row["cpres"].' / '.$row["ccap"].'</span></div></div>';
                                      echo '</a>';
                                  }
                              } else {
                                  echo "No favorites yet";
                              }

                            ?>

                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h3 class="panel-title">Recommended</h3>
                        </div>
                        <div class="panel-body">
                          Panel Content
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          Reservations
                        </div>
                        <div class="panel-body">
                          Panel Content
                        </div>
                      </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
<?php
$conn->close();
?>
