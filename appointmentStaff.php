<?php
include_once 'dbconnect.php';
$res=mysqli_query($con,"SELECT * FROM doctor");
$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Clinica Abeleda | Stocks</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">

    <!-- FooTable -->
    <link href="../css/plugins/footable/footable.core.css" rel="stylesheet">

    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="../script.js"></script>
</head>

<body>

    <div id="wrapper">

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <img alt="image" class="rounded-circle" src="../img/New Project.png"/>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="block m-t-xs font-bold">Anna Santos</span>
                                <span class="text-muted text-xs block">Staff<b class="caret"></b></span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                                <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                                <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                                <li class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="login.html">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            CA
                        </div>
                    </li>
                    <li>
                        <a href="staff-dashboard.html"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>

                    </li>
                    <li>
                        <a href="staff-patient-records.html"><i class="fa fa-table"></i> <span class="nav-label">Patients</span></a>

                    </li>

                    <li class="active">
                      <a href="#"><i class="fa fa-calendar"></i> <span class="nav-label">Appointments</span><span class="fa arrow"></span></a>
                      <ul class="nav nav-second-level collapse">
                          <li class="active"><a href="appointmentStaff.php">Appointment List</a></li>
                          <li><a href="staff-stocks.html">Doctor Schedule</a></li>
                      </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Medicine Stocks</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="appointmentStaff.php">Medicines</a></li>
                            <li class="active"><a href="staff-stocks.html">Stocks</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
        </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="" class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <span class="m-r-sm text-muted welcome-message">Welcome to Clinica Abeleda</span>
            </li>
            <li>
                <a href="login.html">
                    <i class="fa fa-sign-out"></i> Log out
                </a>
            </li>

        </ul>

        </nav>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">


            <div class="row">
                <div class="col-lg-12">
                    <!-- <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Appointment</h5>

                             <div class="ibox-tools">
                                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal5">
                                    Add Stocks
                                </button>

                                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal6">
                                 QTY
                                </button>
									</div> -->

                  <div class="panel panel-primary filterable">
                                       <!-- Default panel contents -->
                                      <div class="panel-heading">
                                       <h3 class="panel-title">Appointment List</h3>
                                       <div class="pull-right"><br>
                                           <button class="btn btn-outline-success btn-filter"><span class="fa fa-filter"></span> Filter</button>
                                           <button class='btn btn-outline-success' type='submit' value='Submit' name='submit'>Update</button>;
                                       </div>
                                       </div>
                                       <div class="panel-body">
                                       <!-- Table -->
                                       <table class="table table-hover table-bordered">
                                           <thead>
                                               <tr class="filters">
                                                   <th><input type="text" class="form-control" placeholder="Name" disabled></th>
                                                   <th><input type="text" class="form-control" placeholder="Contact #" disabled></th>
                                                   <th><input type="text" class="form-control" placeholder="Email" disabled></th>
                                                   <th><input type="text" class="form-control" placeholder="Day" disabled></th>
                                                   <th><input type="text" class="form-control" placeholder="Date" disabled></th>
                                                   <th><input type="text" class="form-control" placeholder="Start" disabled></th>
                                                   <th><input type="text" class="form-control" placeholder="End" disabled></th>
                                                   <th><input type="text" class="form-control" placeholder="Status" disabled></th>
                                                   <th><input type="text" class="form-control" placeholder="Complete" disabled></th>
                                                   <th><input type="text" class="form-control" placeholder="Delete" disabled></th>
                                               </tr>
                                           </thead>

                                           <?php
                                           $res=mysqli_query($con,"SELECT a.*, b.*,c.*
                                                                   FROM patient a
                                                                   JOIN appointment b
                                                                   On a.icPatient = b.patientIc
                                                                   JOIN doctorschedule c
                                                                   On b.scheduleId=c.scheduleId
                                                                   Order By appId desc");
                                                 if (!$res) {
                                                   printf("Error: %s\n", mysqli_error($con));
                                                   exit();
                                               }
                                           while ($appointment=mysqli_fetch_array($res)) {

                                               if ($appointment['status']=='process') {
                                                   $status="danger";
                                                   $icon='remove';
                                                   $checked='';

                                               } else {
                                                   $status="success";
                                                   $icon='ok';
                                                   $checked = 'disabled';
                                               }


                                               echo "<tbody>";
                                               echo "<tr class='$status'>";

                                                   echo "<td>" . $appointment['patientLastName'] . "</td>";
                                                   echo "<td>" . $appointment['patientPhone'] . "</td>";
                                                   echo "<td>" . $appointment['patientEmail'] . "</td>";
                                                   echo "<td>" . $appointment['scheduleDay'] . "</td>";
                                                   echo "<td>" . $appointment['scheduleDate'] . "</td>";
                                                   echo "<td>" . $appointment['startTime'] . "</td>";
                                                   echo "<td>" . $appointment['endTime'] . "</td>";
                                                   echo "<td><span class='glyphicon glyphicon-".$icon."' aria-hidden='true'></span>".' '."". $appointment['status'] . "</td>";
                                                   echo "<form method='POST'>";
                                                   echo "<td class='text-center'><input type='checkbox' name='enable' id='enable' value='".$appointment['appId']."' onclick='chkit(".$appointment['appId'].",this.checked);' ".$checked."></td>";
                                                   echo "<td class='text-center'><a href='#' id='".$appointment['appId']."' class='delete'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a>
                                           </td>";

                                           }
                                               echo "</tr>";
                                          echo "</tbody>";
                                      echo "</table>";
                                      echo "<div class='panel panel-default'>";
                                      echo "<div class='col-md-offset-3 pull-right'>";
                                      // echo "<button class='btn btn-primary' type='submit' value='Submit' name='submit'>Update</button>";
                                       echo "</div>";
                                       echo "</div>";
                                       ?>
                                   </div>
                               </div>
                                   <!-- panel end -->
               <script type="text/javascript">
               function chkit(uid, chk) {
                  chk = (chk==true ? "1" : "0");
                  var url = "checkdb.php?userid="+uid+"&chkYesNo="+chk;
                  if(window.XMLHttpRequest) {
                     req = new XMLHttpRequest();
                  } else if(window.ActiveXObject) {
                     req = new ActiveXObject("Microsoft.XMLHTTP");
                  }
                  // Use get instead of post.
                  req.open("GET", url, true);
                  req.send(null);
               }
               </script>
                               </div>
                               <!-- /.container-fluid -->
                           </div>
                           <!-- /#page-wrapper -->
                       </div>
                       <!-- /#wrapper -->
                       <!-- jQuery -->
                       <script src="../patient/assets/js/jquery.js"></script>
                       <script type="text/javascript">
               $(function() {
               $(".delete").click(function(){
               var element = $(this);
               var appid = element.attr("id");
               var info = 'id=' + appid;
               if(confirm("Are you sure you want to delete this?"))
               {
                $.ajax({
                  type: "POST",
                  url: "deleteAppointment.php",
                  data: info,
                  success: function(){
                }
               });
                 $(this).parent().parent().fadeOut(300, function(){ $(this).remove();});
                }
               return false;
               });
               });
               </script>
                       <!-- Bootstrap Core JavaScript -->
                       <script src="../patient/assets/js/bootstrap.min.js"></script>
                       <!-- Latest compiled and minified JavaScript -->
                        <!-- script for jquery datatable start-->
                       <script type="text/javascript">
                           /*
                           Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
                           */
                           $(document).ready(function(){
                               $('.filterable .btn-filter').click(function(){
                                   var $panel = $(this).parents('.filterable'),
                                   $filters = $panel.find('.filters input'),
                                   $tbody = $panel.find('.table tbody');
                                   if ($filters.prop('disabled') == true) {
                                       $filters.prop('disabled', false);
                                       $filters.first().focus();
                                   } else {
                                       $filters.val('').prop('disabled', true);
                                       $tbody.find('.no-result').remove();
                                       $tbody.find('tr').show();
                                   }
                               });

                               $('.filterable .filters input').keyup(function(e){
                                   /* Ignore tab key */
                                   var code = e.keyCode || e.which;
                                   if (code == '9') return;
                                   /* Useful DOM data and selectors */
                                   var $input = $(this),
                                   inputContent = $input.val().toLowerCase(),
                                   $panel = $input.parents('.filterable'),
                                   column = $panel.find('.filters th').index($input.parents('th')),
                                   $table = $panel.find('.table'),
                                   $rows = $table.find('tbody tr');
                                   /* Dirtiest filter function ever ;) */
                                   var $filteredRows = $rows.filter(function(){
                                       var value = $(this).find('td').eq(column).text().toLowerCase();
                                       return value.indexOf(inputContent) === -1;
                                   });
                                   /* Clean previous no-result if exist */
                                   $table.find('tbody .no-result').remove();
                                   /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
                                   $rows.show();
                                   $filteredRows.hide();
                                   /* Prepend no-result row if all rows are filtered */
                                   if ($filteredRows.length === $rows.length) {
                                       $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
                                   }
                               });
                           });
                       </script>
                       <!-- script for jquery datatable end-->
                     </body>

</html>
