<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inno";

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

    <!-- Bootstrap theme for DT -->
    <link href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">

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
                      <h1>List overview</h1>
                      <div class="panel panel-default">
                        <div class="panel-body">
                          <table id="list" class="table table-striped table-bordered">
                              <thead>
                                  <tr>
                                      <th>Name</th>
                                      <th>Faculty</th>
                                      <th>Adress</th>
                                      <th>Working Spaces</th>
                                      <th>Computers</th>
                                  </tr>
                              </thead>
                              <tbody>

                                  <?php

                                    $sql = "SELECT * FROM locations";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row["name"] . "</td>";
                                            echo "<td>" . $row["faculty"] . "</td>";
                                            echo "<td>" . $row["adress"] . "</td>";
                                            $percent1 = round(($row["ppres"] / $row["pcap"])*100,0);
                                            $percent2 = round(($row["cpres"] / $row["ccap"])*100,0);
                                            echo '<td><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="'.$percent1.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$percent1.'%"><span class="show"><i class="fa fa-user fa-fw"></i>'.$row["ppres"].' / '.$row["pcap"].'</span></div></td>';
                                            echo '<td><div class="progress progress-striped active"><div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="'.$percent2.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$percent2.'%"><span class="show"><i class="fa fa-user fa-fw"></i>'.$row["cpres"].' / '.$row["ccap"].'</span></div></td>';
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "0 results";
                                    }

                                  ?>


                              </tbody>
                          </table>
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
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>

    <!-- DataTables JQ -->
    <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>

    <!-- DataTables BTS -->
    <script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap4.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Initialise the datatable -->
    <script>
        $(document).ready(function() {
            $('#list').DataTable();
        } );
    </script>

    <!-- Responsive table -->
    <script>
        $('#list').DataTable( {
            responsive: true
        } );
    </script>

</body>

</html>
<?php
$conn->close();
?>
