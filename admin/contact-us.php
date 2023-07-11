<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsaid']==0)) {
  header('location:logout.php');
  } else{
   if(isset($_POST['submit']))
  {

$pagetitle=$_POST['pagetitle'];
$pagedes=$_POST['pagedes'];
$mobnum=$_POST['mobnum'];
$email=$_POST['email'];
$twt=$_POST['twt'];
$ig=$_POST['ig'];
$fb=$_POST['fb'];
$wapp=$_POST['wapp'];
$sql="update tblpage set PageTitle=:pagetitle,PageDescription=:pagedes,Email=:email,MobileNumber=:mobnum,Twitter=:twt,Instagram=:ig,Facebook=:fb,WhatsApp=:wapp where PageType='contactus'";
$query=$dbh->prepare($sql);
$query->bindParam(':pagetitle',$pagetitle,PDO::PARAM_STR);
$query->bindParam(':pagedes',$pagedes,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobnum',$mobnum,PDO::PARAM_STR);
$query->bindParam(':twt',$twt,PDO::PARAM_STR);
$query->bindParam(':ig',$ig,PDO::PARAM_STR);
$query->bindParam(':fb',$fb,PDO::PARAM_STR);
$query->bindParam(':wapp',$wapp,PDO::PARAM_STR);
$query->execute();
echo '<script>alert("Contact us has been updated")</script>';


  }

  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Student Committee Portal || Update Contact Us</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/select2/select2.min.css">
    <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css" />
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
     <?php include_once('includes/header.php');?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
      <?php include_once('includes/sidebar.php');?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Update Contact Us </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Update Contact Us</li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Update Contact Us</h4>
                   
                    <form class="forms-sample" method="post">
                      <?php

$sql="SELECT * from  tblpage where PageType='contactus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>    
                      <div class="form-group">
                        <label for="exampleInputName1">Page Title:</label>
                        <input type="text" name="pagetitle" value="<?php  echo $row->PageTitle;?>" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Page Description:</label>
                        <textarea type="text" name="pagedes" class="form-control" required='true'><?php  echo $row->PageDescription;?></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Email:</label>
                        <input type="text" name="email" id="email" required="true" value="<?php  echo $row->Email;?>" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Mobile Number:</label>
                        <input type="text" name="mobnum" id="mobnum" required="true" value="<?php  echo $row->MobileNumber;?>" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Twitter:</label>
                        <input type="text" name="twt" id="twt" required="true" value="<?php  echo $row->Twitter;?>" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Instagram:</label>
                        <input type="text" name="ig" id="ig" required="true" value="<?php  echo $row->Instagram;?>" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Facebook:</label>
                        <input type="text" name="fb" id="fb" required="true" value="<?php  echo $row->Facebook;?>" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">WhatsApp:</label>
                        <input type="text" name="wapp" id="wapp" required="true" value="<?php  echo $row->WhatsApp;?>" class="form-control">
                      </div>
                      <?php $cnt=$cnt+1;}} ?>
                      <button type="submit" class="btn btn-primary mr-2" name="submit">Update</button>
                     
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         <?php include_once('includes/footer.php');?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/select2/select2.min.js"></script>
    <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="js/typeahead.js"></script>
    <script src="js/select2.js"></script>
    <!-- End custom js for this page -->
  </body>
</html><?php }  ?>