<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['uid']==0)) {
  header('location:logout.php');
  } else{

  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Meta -->
 <meta name="description" content="Insurance Management System in PHP and MySQL">
    <meta name="author" content="Sarita Pandey">

    <title>Benefit Ticket Form!!</title>

    <!-- vendor css -->
    <link href="../lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="../lib/morris.js/morris.css" rel="stylesheet">
    <link href="../lib/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="../lib/jqvmap/jqvmap.min.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="../css/azia.css">

 

  </head>



  <body class="az-body az-body-sidebar">
      <!-- -sidebar -->
<?php include_once('includes/sidebar.php');?>
  <!-- -sidebar -->
    <div class="az-content az-content-dashboard-two">
     
     <!-- -header -->
<?php include_once('includes/header.php');?>
  <!-- -header -->

      <div class="az-content-header d-block d-md-flex">
        <div>
          <h2 class="az-content-title mg-b-5 mg-b-lg-8">Benefit Ticket Form !</h2>
        </div>
       <!-- az-dashboard-header-right -->
      </div><!-- az-content-header -->
      <div class="az-content-body">
     

        <div class="row row-sm mg-b-20 mg-lg-b-0">
          <div class="col-md-12 col-xl-7">
            <div class="card card-table-two">
              <h6 class="card-title"> Fill the Info</h6>
            <form method="post">
        <p style="font-size:16px; color:red" align="left"> <?php if($msg){
    echo $msg;
  }  ?> </p>
         <?php
$cid=$_GET['ticid'];
$ret=mysqli_query($con,"select * from tblticket where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

<table border="1" class="table table-bordered mg-b-0">
  <tr>
    <th>Ticket ID :</th>
    <td><?php  echo $row['ID'];?></td>
  </tr>
   <tr>
    <th>Ticket Generation Date</th>
    <td><?php  echo $row['TicketGenerationDate'];?></td>
  </tr>
<tr>
    <th>Subject</th>
    <td><?php  echo $row['Subject'];?></td>
  </tr>

<tr>
    <th>Nature Of Issue</th>
    <td><?php  echo $row['NatureofIssue'];?></td>
  </tr>

  <tr>
    <th>Description</th>
    <td><?php  echo $row['Description'];?></td>
  </tr>

  <tr>
    <th>Admin Remark</th>
    <td><?php
if($row['AdminRemark']==""){
  echo "No action taken yet";
} else {
      echo $row['AdminRemark'];
    }?></td>
  </tr>


 

  <tr>
    <th>Admin Remark date</th>
    <td>
<?php
if($row['AdminRemarkdate']==""){
  echo "No action taken yet";
} else {
      echo $row['AdminRemarkdate'];
    }?>

  </td>
  </tr>

  

</table>

<?php } ?>
</body>
</html>

<?php } ?>