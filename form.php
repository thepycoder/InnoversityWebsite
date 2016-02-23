<?php
include(config.php);

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

    <link rel="stylesheet" href="css/custom.css">

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
                      <h1>Add new location</h1>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h3 class="panel-title"><i class="fa fa-file-text fa-fw"></i>Fill in the form below</h3>
                        </div>
                        <div class="panel-body">
                          <form role="form" action="process_form.php" method="post">
                            <div class="col-lg-4">
                              <div class="form-group">
                                <label>Common name of Location</label>
                                <input name="name" class="form-control" placeholder="Common name">
                                <br>
                                <label>Address</label>
                                <input class="form-control" placeholder="Address">
                                <br>
                                <label>Faculty (/ if NA)</label>
                                <input class="form-control" placeholder="Faculty">
                                <br>
                                <label>People Capacity</label>
                                <input class="form-control" placeholder="Capacity">
                                <br>
                                <label>Amount of Computers (0 if none)</label>
                                <input class="form-control" placeholder="Computers">
                                <br>
                                <button type="submit" class="btn btn-default">Submit</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                              </div>
                            </div>
                            <div class="col-lg-5 text-center">
                              <div class="form-group">
                                <label>Openingsuren</label>
                                <br>
                                <div id="hourForm">
                                  <div id="Monday" class="day"></div>
                                  <div id="Tuesday" class="day"></div>
                                  <div id="Wednesday" class="day"></div>
                                  <div id="Thursday" class="day"></div>
                                  <div id="Friday" class="day"></div>
                                  <div id="Saturday" class="day"></div>
                                  <div id="Sunday" class="day"></div>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-3">
                              <div class="form-group">
                                <label>Features</label>
                                <br>
                                <p class="checkbox">
                                  <input type="checkbox" id="inlineCheckbox1" value="option1"> EduRoam
                                </p>
                                <p class="checkbox">
                                  <input type="checkbox" id="inlineCheckbox2" value="option2"> Drankautomaat
                                </p>
                                <p class="checkbox">
                                  <input type="checkbox" id="inlineCheckbox3" value="option3"> Snackautomaat
                                </p>
                                <p class="checkbox">
                                  <input type="checkbox" id="inlineCheckbox3" value="option3"> Printer
                                </p>
                                <p class="checkbox">
                                  <input type="checkbox" id="inlineCheckbox3" value="option3"> Laptopvriendelijk
                                </p>
                              </div>
                            </div>
                          </form>
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

    <!-- Cutom opening hour selection script -->
    <script type="text/javascript">
      $('.day').each(function() {
        var day = $(this).attr('id');
        $(this).append('<div id="label"><u>' + day + '</u>: </div>');
        $(this).append('<select name="' + day + 'FromH" class="hour from"></select>');
        $(this).append('<select name="' + day + 'FromM" class="min from"></select>');
        $(this).append('<select name="' + day + 'FromAP" class="ampm from"></select>');
        $(this).append(' to <select name="' + day + 'ToH" class="hour to"></select>');
        $(this).append('<select name="' + day + 'ToM" class="min to"></select>');
        $(this).append('<select name="' + day + 'ToAP" class="ampm to"></select>');
        $(this).append(' <input type="checkbox" name="closed" value="closed" class="closed"><span>Closed</span>');

      });

      $('.hour').each(function() {
        for (var h = 1; h < 13; h++) {
            $(this).append('<option value="' + h + '">' + h + '</option>');
        }

        $(this).filter('.from').val('9');
        $(this).filter('.to').val('5');
      });

      $('.min').each(function() {
        var min = [':00', ':15', ':30', ':45'];
        for (var m = 0; m < min.length; m++) {
            $(this).append('<option value="' + min[m] + '">' + min[m] + '</option>');
        }

        $(this).val(':00');
      });

      $('.ampm').each(function() {
        $(this).append('<option value="AM">AM</option>');
        $(this).append('<option value="PM">PM</option>');

        $(this).filter('.from').val('AM');
        $(this).filter('.to').val('PM');
      });

      $('input').change( function() {
        if($(this).filter(':checked').val() == "closed") {
            $(this).siblings('select').attr('disabled', true);
        } else {
            $(this).siblings('select').attr('disabled', false);
        }
      });

      $('#Saturday .closed, #Sunday .closed').val(["closed"]).siblings('select').attr('disabled', true);
    </script>

</body>

</html>
<?php
$conn->close();
?>
