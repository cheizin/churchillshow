<?php
session_start();
include("controllers/setup/connect.php");
require_once("assets/libs/BrowserDetection/lib/BrowserDetection.php");

//require_once('../payments/checkusersubscription.php');
//get browser  type, exit if internet explore
$http_origin = "https://churchill.potentialsoftwares.com/";
/*
if ($http_origin == "https://Pan.cma.or.ke" || $http_origin == "https://va.tawk.to" || $http_origin == "http://tawk.link/")
{
    header("Access-Control-Allow-Origin: $http_origin");
}
*/


$browser = new Wolfcast\BrowserDetection();
$browser_name = $browser->getName();
if($browser_name == "Internet Explorer")
{
  $message = '<blockquote class="blockquote">
                <h4></h4>
                Please re-start the application using
                <strong><i class="fab fa-firefox-browser"></i> Mozilla Firefox </strong> or
                <strong><i class="fab fa-chrome"></i> Google Chrome </strong>
                for maximum experience and system compatibilty.
              </blockquote>';

  exit($message);
}

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title id="current-title">Churchill </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <!--<link rel="stylesheet" href="assets/fonts/fontawesome-pro-5.12.0/css/all.min.css">-->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
  <link rel="stylesheet" href="assets/css/font-awesome-animation.css">
  <!-- Ionicons 2.0.1-->
  <link rel="stylesheet" href="assets/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- sweetalert -->
  <link rel="stylesheet" href="assets/css/sweetalert2@9.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.css">
  <!-- Datatables-->
  <link rel="stylesheet"  href="assets/css/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/libs/datatables/datatables.min.css"/>
  <!-- Hover-->
  <link rel="stylesheet"  href="assets/css/hover.css"/>
    <!-- Animate-->
  <link rel="stylesheet"  href="assets/css/animate.css"/>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
  <!--Jquery UI -->
  <link href="assets/css/jquery-ui.css" rel="Stylesheet"type="text/css"/>
  <!-- Date Picker -->
  <link rel="stylesheet" href="assets/css/datepicker.min.css">
<!-- News like simpleticker -->
  <link rel="stylesheet" href="assets/libs/jquery.simpleTicker/jquery.simpleTicker.css">

  <!-- select2 css ver @4.0.12 -->
  <link href="assets/css/select2.min.css" rel="stylesheet" />
  <!-- select2-bootstrap4-theme -->
<link href="assets/css/select2-bootstrap4.css" rel="stylesheet">
  <!-- custom css -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <!-- title icon -->

  <link rel="icon" href="../assets/favicon/apple-touch-icon.png" type="image/x-icon" />
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper" style="border:0; padding:0;">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: rgb(0,0,0);">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-light" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" onclick="location.reload();" class="nav-link text-light">

          <i class="nav-icon fa fa-home" aria-hidden="true"></i> Home</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <input type="hidden" id="days_remaining" value="<?php echo $deadline_message;?>">
        <a href="#" class="nav-link days_remaining" style="color: white;font-weight:bold;"></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto" id="dynamic-navbar"></ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#"  style="background-color: rgb(0,0,0);" class="brand-link" data-toggle="tooltip" data-placement="bottom" title="Panorama Inventory System">
      <img src="../assets/media/site-logo/logo-dark.png" alt="Churchill Logo" class="brand-image elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b></b></span>
    </a>

    <!-- Sidebar -->
    <!-- IF USER IS NOT LOGGED IN, DISPLAY LOGIN SIDEBAR, ELSE, DISPLAY FULL SIDEBAR -->
    <?php
    if(!isset($_SESSION['email']))
    {
      ?>
      <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column nav-compact" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
              <li class="nav-item">
                <a href="#" class="nav-link test-login-link">
                  <i class="nav-icon far fa-sign-in"></i>
                  <p>Log In</p>
                </a>
              </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
      <?php
    }
    else
    {
    ?>
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">

                      <?php $user_image = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM userImages WHERE email ='".$_SESSION['email']."' ORDER by id DESC limit 1"));?>
           <?php
$sql_query2544 = mysqli_query($dbc,"SELECT * FROM userImages WHERE email ='".$_SESSION['email']."' ORDER by id DESC limit 1");
$number = 1;
if($total_rows = mysqli_num_rows($sql_query2544) > 0)
{
?>

<img src="https://churchill.potentialsoftwares.com/admin/images/profile/<?php echo $user_image['thumbnail'];?>" class="img-circle elevation-2" alt="User Image">


<?php
}
else
{
?>

<img src="https://churchill.potentialsoftwares.com/admin/images/user.jpg" class="img-circle elevation-2" alt="User Image">


<?php
}
?>



        </div>
        <div class="info">
          <a href="#" class="d-block user-profile-link-"><?php echo $_SESSION['name'] ;?></a>

              <a href="#" class="d-block user-profile-link-"><?php echo $_SESSION['mobile'] ;?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-compact nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">

            <li class="nav-item mb-1">
              <a href="#" class="nav-link active" onclick="location.reload();">
                <i class="nav-icon fa fa-home"></i>
                <p>
                  HOME
                </p>
              </a>
            </li>


                               <li class="nav-item mb-1">
              <a href="https://churchill.potentialsoftwares.com" class="nav-link">
                <i class="nav-icon fas fa-globe"></i>
                <p>
                  Main Site
                </p>
              </a>
            </li>
            <?php
            if($_SESSION['access_level'] == 'admin' || $_SESSION['access_level'] == 'superuser')
            {
             ?>
               <li class="nav-item">
                 <a href="#" class="nav-link superuser-dashboard-link">
                   <i class="nav-icon fas fa-tachometer-alt-fast"></i>
                   <p>
                     Dashboard
                   </p>
                 </a>
               </li>

               <?php
              }
    ?>

                <?php
            if($_SESSION['access_level'] == 'standard')
            {
             ?>
               <li class="nav-item">
                 <a href="#" class="nav-link standard-dashboard-link">
                   <i class="nav-icon fas fa-tachometer-alt-fast"></i>
                   <p>
                    User Dashboard
                   </p>
                 </a>
               </li>

               <?php
              }
    ?>

           <li class="nav-item has-treeview border-top">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-video"></i>
              <p>
                Video Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="#" class="nav-link upload-local-link">
                  <i class="nav-icon fas fa-video"></i>
                  <p>Upload Local Videos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link upload-youtube-link">
                  <i class="nav-icon fab fa-youtube"></i>
                  <p>Upload Youtube Videos</p>
                </a>
              </li>

              <?php

             if($_SESSION['access_level'] == 'admin')
             {
              ?>

              <li class="nav-item">
                <a href="#" class="nav-link upload-banner-link">
                  <i class="nav-icon fas fa-flag"></i>
                  <p>Banner Video</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link change-popular-link">
                  <i class="nav-icon fal fa-history"></i>
                  <p>Popular Video</p>
                </a>
              </li>

              <?php
             }
   ?>

            </ul>
          </li>

          <li class="nav-item has-treeview border-top">
           <a href="#" class="nav-link">
                 <i class="nav-icon fas fa-tv"></i>
             <p>
               Channels Management
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">

             <li class="nav-item">
               <a href="#" class="nav-link add-channel-link">
                 <i class="nav-icon fas fa-plus"></i>
                 <p>Add Channel</p>
               </a>
             </li>


  <?php
  if($_SESSION['access_level'] =='admin')
  {
   ?>
             <li class="nav-item">
               <a href="#" class="nav-link top-channel-link">
                   <i class="nav-icon fas fa-arrow-up"></i>
                 <p>Top Channel List</p>
               </a>
             </li>

                          <li class="nav-item">
               <a href="#" class="nav-link approve-channel-link">
                   <i class="nav-icon fa fa-check"></i>
                 <p>Approve Channels</p>
               </a>
             </li>



             <?php
            }
  ?>
           </ul>
         </li>

           <?php
          }


          ?>
          <?php

         if($_SESSION['access_level'] == 'admin')
         {
          ?>
        <li class="nav-item has-treeview border-top">
         <a href="#" class="nav-link">
               <i class="nav-icon fa fa-rss"></i>
           <p>
          Feeds Management
             <i class="right fas fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
<!--
                        <li class="nav-item">
                          <a href="#" class="nav-link channel-reordering-link">
                              <i class="nav-icon fa fa-sort"></i>
                            <p>Add Feeds Category</p>
                          </a>
                        </li> 
                      -->
                        <li class="nav-item">
             <a href="#" class="nav-link video-reordering-link">
                 <i class="nav-icon fas fa-plus"></i>
               <p>Add Feeds Details</p>
             </a>
           </li>
<!--
           <li class="nav-item">
<a href="#" class="nav-link images-compression-link">
    <i class="nav-icon fas fa-money-bill-wave"></i>
  <p>Images Compression</p>
</a>
</li>  -->

           <?php
          }
?>
         </ul>
       </li>


       <?php

      if($_SESSION['access_level'] == 'admin')
      {
       ?>
     <li class="nav-item has-treeview border-top">
      <a href="#" class="nav-link">
            <i class="nav-icon fas fa-sort"></i>
        <p>
       Channel/Video Reordering
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
<!--
                     <li class="nav-item">
                       <a href="#" class="nav-link channel-reordering-link">
                           <i class="nav-icon fa fa-sort"></i>
                         <p>Add Feeds Category</p>
                       </a>
                     </li> 
                   -->
                     <li class="nav-item">
          <a href="https://churchill.potentialsoftwares.com/orderChannel.php" class="nav-link">
              <i class="nav-icon fas fa-plus"></i>
            <p>Order Channel or Video</p>
          </a>
        </li>
<!--
        <li class="nav-item">
<a href="#" class="nav-link images-compression-link">
 <i class="nav-icon fas fa-money-bill-wave"></i>
<p>Images Compression</p>
</a>
</li>  -->

        <?php
       }
?>
      </ul>
    </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header" style="padding:12px">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">

          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <div id="response-data" style="width:100%">
            <?php
            if(isset($_SESSION['email']))
            {
              ?>



                    <?php
                  if($_SESSION['access_level'] == 'admin')
                  {

                    //all  usersd
                    $users_sql2 = mysqli_query($dbc,"SELECT * FROM users");
                      $total_users2 = mysqli_num_rows($users_sql2);
                   ?>
                   <div class="row module-panel">
                       <!-- /.col -->

                       <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item active" aria-current="page"><strong> <?php echo $total_users2;?></strong> Churchill Users</li>

     <li>

     </li>

                            </ol>
                       </nav>

                       <div class="tab-content" id="pills-tabContent">
                         <div class="tab-pane fade show active" id="database_users_tab" role="tabpanel">
                           <div class="row">
                               <div class="col-md-12">
                                   <div class="card">
                                       <div class="card-header bg-light">

                                       </div>
                                       <div class="card-body table-responsive">
                                                          <?php
                                         $sql_query = mysqli_query($dbc,"SELECT * FROM users ORDER BY id DESC");
                                         $number = 1;
                                         if($total_rows = mysqli_num_rows($sql_query) > 0)
                                         {?>
                                         <table class="table table-striped table-hover" id="staff-users-table2">
                                           <thead>
                                             <tr>
                                               <td>NO</td>
                                               <td>Churchill ID</td>
                                               <td>Name</td>
                                               <td>Email</td>
                                               <td>Mobile</td>
                                               <td>Access Level</td>
                                               <td>Status</td>
                                             </tr>
                                           </thead>
                                           <?php
                                           while($row = mysqli_fetch_array($sql_query))
                                           {
                                             if($row['status'] == 'suspended')
                                             {
                                               $class_suspended = 'bg-danger';
                                             }
                                             else
                                             {
                                               $class_suspended ='';
                                             }

                                             ?>
                                           <tr style="cursor: pointer;" class="<?php echo $class_suspended;?>">
                                             <td><?php echo $number++;?></td>
                                             <td>
                                               <button type="button" class="btn btn-link"
                                                       data-toggle="modal"
                                                       data-target="#edit-user-modal-<?php echo $row['id'];?>">

                                                       <?php echo $row['id'];?>
                                               </button>
                                             </td>
                                             <td><?php echo $row['name'];?></td>
                                             <td><?php echo $row['email'];?></td>
                                             <td><?php echo $row['mobile'];?></td>
                                             <td><?php echo $row['access_level'];?></td>
                                             <td>
                                               <?php


                                               if($row['user_status']== 'Active')
             {

                                                     ?>

                   <strong>    <a onclick="deactivateUser2('<?php echo $row['id'];?>');" data-toggle="tooltip" title="Click here to deactivate account" >     <i class="text-success"> Active</i>        </a>      </strong>

                                                      <?php
             }
             else
             {
               ?>
          <a href="#" class="btn btn-link text-danger" onclick="activateUser2('<?php echo $row['id'];?>');" data-toggle="tooltip" title="Click here to activate account" >
              <i class="fas fa-times text-danger"> Deactivated</i>
                 </a>


               <?php
             }

                                                      ?></td>


                                             <!-- start edit user Modal -->
                                               <div class="modal fade" id="edit-user-modal-<?php echo $row['EmpNo']; ?>" role="dialog" aria-hidden="true">
                                                 <div class="modal-dialog modal-lg" role="document">
                                                   <div class="modal-content">
                                                     <div class="modal-header">
                                                       <h5 class="modal-title">Edit User</h5>
                                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                         <span aria-hidden="true">&times;</span>
                                                       </button>
                                                     </div>
                                                     <div class="modal-body">
                                                     <form id="update-user-settings2-form-<?php echo $row['id'];?>">
                                                        <div class="row">
                                                           <div class="col-md-12 col-xs-12">
                                                              <div class="row">
                                                                 <div class="col-lg-6 col-xs-12 form-group">
                                                                    <label for="emp_no">Churchill No</label>
                                                                    <input type="text" class="form-control" name="emp_no" id="emp_no-<?php echo $row['id'];?>" value="<?php echo $row['id'];?>" readonly="true">
                                                                 </div>
                                                                 <div class="col-lg-6 col-xs-12 form-group">
                                                                    <label for="name">Name</label>
                                                                    <input type="text" class="form-control" id="name-<?php echo $row['id'];?>" name="name" value="<?php echo $row['name'];?>" readonly="true">
                                                                 </div>
                                                                 <div class="col-lg-6 col-xs-12 form-group">
                                                                    <label for="email">Email</label>
                                                                    <input type="text" class="form-control" name="email" id="email-<?php echo $row['id'];?>" value="<?php echo $row['email'];?>" readonly="true">
                                                                 </div>
                                                              </div>
                                                           </div>
                                                        </div>
                                                        <!-- /.end row programme status -->
                                                        <!-- start row -->
                                                        <div class="row">
                                                           <div class="col-lg-6 col-xs-12 form-group">
                                                              <label for="department">Department</label>
                                                              <?php
                                                                 $result = mysqli_query($dbc, "SELECT * FROM departments ORDER BY department_name ASC");
                                                                 echo '
                                                                 <select name="department" id="department-'.$row['EmpNo'].'" class="select2 form-control">
                                                                 <option value="'.$row['DepartmentCode'].'" selected>'.$row['DepartmentCode'].'</option>';

                                                                 while($row_dep = mysqli_fetch_array($result)) {
                                                                     echo '<option value="'.$row_dep['department_id'].'">'.$row_dep['department_name']."</option>";
                                                                 }
                                                                 echo '</select>';
                                                                 ?>
                                                           </div>
                                                           <div class="col-lg-6 col-xs-12 form-group">
                                                              <label for="designation">Designation</label>
                                                              <input type="text" name="designation"
                                                                     id="designation-<?php echo $row['EmpNo'];?>" class="form-control" value="<?php echo $row['designation'];?>" required>
                                                           </div>
                                                           <div class="col-lg-6 col-xs-12 form-group">
                                                              <label for="access_level">Access Level</label>
                                                              <select class="select2 form-control" name="access_level" id="access_level-<?php echo $row['EmpNo'];?>">
                                                                 <option value="<?php echo $row['access_level'];?>" selected><?php echo $row['access_level'];?></option>
                                                                 <option value="superuser">SUPERUSER</option>
                                                                 <option value='standard'>STANDARD</option>
                                                                 <option value="admin">ADMIN</option>
                                                                 <option value="director">DIRECTOR</option>
                                                              </select>
                                                           </div>
                                                           <div class="col-lg-6 col-xs-12 form-group">
                                                              <label for="status">Status</label>
                                                              <select class="select2 form-control" name="status" id="status-<?php echo $row['EmpNo'];?>">
                                                                 <option value="<?php echo $row['status'];?>" selected><?php echo $row['status'];?></option>
                                                                 <option value="active">active</option>
                                                                 <option value="suspended">suspended</option>
                                                              </select>
                                                           </div>
                                                        </div>
                                                        <!-- end row  -->
                                                        <!-- start row button -->
                                                        <div class="row">
                                                           <div class="col-md-12 text-center">
                                                              <button type="submit" class="btn btn-primary btn-block" onclick="EditUser('<?php echo $row['EmpNo'];?>');">SUBMIT</button>
                                                           </div>
                                                        </div>
                                                        <!-- end row button -->
                                                     </form>
                                                     </div>
                                                     <div class="modal-footer">
                                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                     </div>
                                                   </div>
                                                 </div>
                                               </div>
                                               <!-- end of edit user modal -->
                                           </tr>
                                           <?php
                                           }
                                           ?>
                                           <tfoot>
                                               <tr>
                                                   <th>NO</th>
                                                   <th>Churchill ID</th>
                                                   <th>Name</th>
                                                   <th>Email</th>
                                                   <th>Mobile</th>


                                                   <th>Access Level</th>
                                                       <th>Status</th>

                                               </tr>
                                           </tfoot>
                                         </table>
                                         <?php
                                         }
                                         ?>
                                       </div>
                                   </div>
                               </div>
                           </div>
                         </div>

                         <div class="tab-pane fade" id="ldap_users_tab" role="tabpanel"></div>
                       </div>
                       <!-- User LDAP PASSWORD Modal -->
                       <div class="modal fade" id="user-password-modal" role="dialog" aria-hidden="true">
                         <div class="modal-dialog" role="document">
                           <div class="modal-content">
                             <div class="modal-header">
                               <h5 class="modal-title">Enter Password</h5>
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                               </button>
                             </div>
                             <div class="modal-body">
                               <form id="submit-password-form">
                                  <div id="feedback"></div>
                                  <br/>
                                  <div class="form-group">
                                     <input type="hidden" name="sign_in_name" value="<?php echo $_SESSION['sign_in_name'];?>">
                                     <label for="pwd">Password:</label>
                                     <input type="password" name="password" class="form-control" id="password" required>
                                  </div>
                                  <div class="row">
                                     <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary btn-block" id="submit-password-btn">SUBMIT</button>
                                     </div>
                                  </div>
                               </form>
                             </div>
                             <div class="modal-footer">
                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                             </div>
                           </div>
                         </div>
                       </div>

                       <!-- start add user Modal -->
                       <div class="modal fade" id="add-user-modal" role="dialog" aria-hidden="true">
                         <div class="modal-dialog" role="document">
                           <div class="modal-content">
                             <div class="modal-header">
                               <h5 class="modal-title">Add User</h5>
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                               </button>
                             </div>
                             <div class="modal-body">
                               <form id="add-new-user-form">
                                     <!-- start of row -->
                                     <div class="row">
                                       <div class="col-lg-6 col-xs-12 form-group">
                                               <label for="emp_no">Employee No</label>
                                               <input type="text" name="emp_no" class="form-control" required>
                                       </div>
                                       <div class="col-lg-6 col-xs-12 form-group">
                                               <label for="name">Name</label>
                                               <input type="text" name="name" class="form-control" required>
                                       </div>
                                       <div class="col-lg-6 col-xs-12 form-group">
                                               <label for="email">Email</label>
                                               <input type="text" name="email" class="form-control" required>
                                       </div>
                                        <div class="col-lg-6 col-xs-12 form-group">
                                               <label for="access_level">Access Level</label>
                                               <select class="select2 form-control" name="access_level">
                                                         <option value="" disabled>-- Please Select --</option>
                                                         <option value='standard'>STANDARD</option>
                                                         <option value="superuser">SUPERUSER</option>
                                                         <option value="director">DIRECTOR</option>
                                                         <option value="admin">ADMIN</option>
                                               </select>
                                       </div>
                                       <div class="col-lg-6 col-xs-12 form-group">
                                               <label for="department">Department</label>
                                                 <?php
                                                   $result = mysqli_query($dbc, "SELECT * FROM departments WHERE department_name!='' ORDER BY department_name ASC");
                                                   echo '
                                                   <select name="department" class="select2 form-control">';

                                                   while($row = mysqli_fetch_array($result)) {
                                                       echo '<option value="'.$row['department_id'].'">'.$row['department_name']."</option>";
                                                   }
                                                   echo '</select>';
                                                   ?>
                                       </div>
                                       <div class="col-lg-6 col-xs-12 form-group">
                                               <label for="designation">Designation</label>
                                               <input type="text" name="designation" class="form-control" required>
                                       </div>
                                     </div>
                                     <!-- end of row -->


                                     <!-- start row button -->
                                     <div class="row">
                                           <div class="col-md-12 text-center">
                                               <button type="submit" class="btn btn-primary btn-block">SUBMIT</button>
                                           </div>
                                     </div>

                                     <!-- end row button -->
                               </form>
                             </div>
                             <div class="modal-footer">
                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                             </div>
                           </div>
                         </div>
                       </div>
                       <!-- end of add user modal -->

                   </div>


                       <!-- /.col -->

                   <?php
                  }
                  else
                  { //standard user
                    ?>
                    <!-- end user card -->
                    <div class="row module-panel">
                    <!-- start user card -->

                    <?php $row = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM users WHERE email ='".$_SESSION['email']."'"));?>

                      <?php $user_image = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM userImages WHERE email ='".$_SESSION['email']."' ORDER by id DESC limit 1"));?>
                        <!-- Profile Image -->

                        <div class="card card-primary card-outline col-md-12">
                          <div class="card-body box-profile">


                            <div class="row">
                              <div class="col-md-4 text-center">
                                <form id="upload-picture-form" class="mt-4" enctype="multipart/form-data">
                                  <input type="hidden" value="upload-picture" name="upload-picture">

                                     <input type="hidden" value="id" name="<?php echo $row['id'] ;?>">

                                      <input type="hidden" name="token" value="<?php echo uniqid();?>">
<div class="row">
                         <small>(<span class="text-success"><?php echo $youtube_channels ;?> Click Thumbnail To Upload profile photo</span>)</small>
</div>
                                      <?php
                     $sql_query254 = mysqli_query($dbc,"SELECT * FROM userImages WHERE email ='".$_SESSION['email']."' ORDER by id DESC limit 1");
                     $number = 1;
                     if($total_rows = mysqli_num_rows($sql_query254) > 0)
                     {
                       ?>


                       <img src="https://churchill.potentialsoftwares.com/images/profile/<?php echo $user_image['thumbnail'];?>"
                       width="100" height="100"class="img-circle" alt="Clear here to Upload Your Profile Image" onClick="triggerClick()" id="profileDisplay">

                         <input type="file" name="thumbnail" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
<?php
                     }
                     else
                     {
                       ?>


                       <img src="https://churchill.potentialsoftwares.com/images/profile/avatar.png"
                       width="100" height="100"class="img-circle" alt="Clear here to Upload Your Profile Image" onClick="triggerClick()" id="profileDisplay">

                         <input type="file" name="thumbnail" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">

                       <?php
                     }
                      ?>



      <div class="row">
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary btn-block font-weight-bold submitting">Upload Photo</button>
        </div>
      </div>

    </form>


      <h3 class="profile-username text-center"><?php echo $row['name'] ;?><br/>
          <small class="text-muted"><?php echo $row['email'] ;?></small><br/>
          <small class="text-muted"><?php echo $row['mobile'] ;?></small>

           <!--   <button type="submit" class="btn btn-primary btn-block font-weight-bold submitting">Save Image</button>  -->

      </h3>
      <!-- end row button -->

                              </div>

                              <div class="col-md-4 text-center">
                                <p class="text-muted text-center"><?php echo $_SESSION['designation'] ;?></p>

                                <ul class="list-group list-group-unbordered mb-3">
                                  <li class="list-group-item">
                                    <b>Churchill ID:</b> <a class="float-right">Churchill<?php echo $row['id'] ;?></a>
                                  </li>
                                  <li class="list-group-item">
                                    <b>Access Level:</b> <a class="float-right"><?php echo $row['access_level'] ;?></a>
                                  </li>

                                  <li class="list-group-item">
                                    <b>Status:</b>


                                                                                            <?php


                                                                                            if($row['user_status']== 'Active')
                                                          {

                                                                                                  ?>

                                                                <strong>    <a class="float-right" onclick="deactivateUser('<?php echo $row['id'];?>');" data-toggle="tooltip" title="Click here to deactivate account" >     <i class="text-success"> Active</i>        </a>      </strong>

                                                                                                   <?php
                                                          }
                                                          else
                                                          {
                                                            ?>
                                                       <a href="#" class="btn btn-link text-danger" onclick="activateUser('<?php echo $row['id'];?>');" data-toggle="tooltip" title="Click here to activate account" >
                                                           <i class="fas fa-times text-danger"> Deactivated</i>
                                                              </a>


                                                            <?php
                                                          }

                                                                                                   ?>

                                  </li>

                                </ul>

                              </div>

                            </div>






                            <!--<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>-->
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>


                    <?php
                  }

            }
            else
            {
             ?>
             <div class="row">
               <div class="col-md-4 offset-md-4">

                 <div class="card animated slideInLeft">
                   <form id="test-login-form">
                       <div class="card-header bg-light">
                        Churchill Log in
                       </div>
                       <div class="card-body">
                         <label for="email">Enter Email Address
                            <i class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="right"
                            title="Your Name associated to your Windows account, i.e MUser" id="name_help"></i></label>
                         <input type="text" autocomplete="on" id="email" name="email" class="form-control" maxlength="70" required placeholder="input your Email">
                         <div class="row">
                           <br/>
                         </div>
                         <!--<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>-->
                           <label for="password">Password
                             <i class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="right"
                             title="Your Password associated to your Windows account" id="password_help"></i></label>
                           <div class="input-group add-on">
                             <input type="password" name="password" id="password" maxlength="40" class="form-control pwd"  required placeholder="input your password">
                             <input class="form-check-input" type="checkbox" onclick="ShowPassword()" id="show-password"/>
     <label class="form-check-label" for="show-password">
       Show Password
     </label>
                           </div>
                           <span class="text-info invisible" id="caps-lock">CAPS LOCK IS ON!</span>
                          </div> <!-- form-group// -->
                          <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary btn-block"> Log in  </button>
                          </div>
                     </form>

                   </div>

                 </div>
               </div>
                <div class="row activity-ticker rounded-pill" style="background:#343a40;">
                  <div class="text-light pl-2 font-weight-bold"> TODAY : </div>
                  <ul class="ml-5 list-unstyled pl-3">
                    <?php
                       //select todays activity logs
                        $today = date('Y/m/d');
                        $sql_today = mysqli_query($dbc,"SELECT * FROM activity_logs
                                                  WHERE (SUBSTRING(time_recorded,1,10) = '".$today."')
                                                  && Email!='Automated Script' ORDER BY id DESC ");
                        while($todays_logs = mysqli_fetch_array($sql_today))
                        {
                          $name = mysqli_fetch_array(mysqli_query($dbc,"SELECT Name FROM staff_users WHERE Email='".$todays_logs['email']."'"))
                          ?>
                            <li class="text-light">
                              <small><?php echo $name['Name'];?>
                              <?php echo $todays_logs['action_reference'];?>
                               (<i class="<?php echo $todays_logs['action_icon'] ;?>"></i>)
                             </small>
                             </li>
                          <?php
                        }
                     ?>
                   </ul>
                </div>
             <?php
            }
            ?>

          </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="add-about-me-modal2" role="dialog">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header alert alert-success">

  <h5 class="modal-title">Change Password Form
  <span class="font-weight-bold"></h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>
  <div class="modal-body">
    <form id="inventory-signup-form">
        <div class="card-header bg-light">
          HRMIS Change Password
        </div>
        <div class="card-body">
          <label for="email">Enter Your official Email address
             <i class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="right"
             title="Your Name associated to your Windows account, i.e MUser" id="name_help"></i></label>
          <input type="text" autocomplete="on" id="email" name="email" class="form-control" maxlength="70" required placeholder="input your registered Email">
          <div class="row">
            <br/>
          </div>
          <!--<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>-->
            <label for="password">Enter Password
              <i class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="right"
              title="Your Password associated to your Windows account" id=""></i></label>
            <div class="input-group add-on">
              <input type="password" name="password" id="password" maxlength="40" class="form-control pwd"  required placeholder="input your password">

            </div>
            <span class="text-info invisible" id="caps-lock">CAPS LOCK IS ON!</span>
            <div class="row">

            </div>
            <label for="password">Confirm Password
              <i class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="right"
              title="Your Password associated to your Windows account" id="password_help"></i></label>
            <div class="input-group add-on">
              <input type="password" id="confirm" name="confirm" maxlength="40" class="form-control pwd"  required placeholder="Confirm Your password">

            </div>
            <span class="text-info invisible" id="caps-lock">CAPS LOCK IS ON!</span>

           </div> <!-- form-group// -->
           <div class="card-footer text-right">
             <button type="submit" class="btn btn-primary btn-block submitting"> Change Password </button>
           </div>
      </form>
  </div>
  <div class="modal-footer">
   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  </div>
  </div>
  </div>
  </div>


  <footer class="main-footer">
    <strong <a href="#"  data-toggle="modal" data-target="#rating-user-modal"> >Copyright &copy; <?php echo date("Y");?> All rights reserved.</a>.</strong>
  
    <div class="modal fade" id="rating-user-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header bg-light">
             

            <h5 style="color:black;">Churchill Credits</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="video-type-details-modal-body" style="color:black;">
          Credit to developers:-
          
          <ul>
  <li>prchege@gmail.com,</li>
  <li>#</li>
  <li> #</li>
</ul>  

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <div class="float-right d-none d-sm-inline-block">
      <button type="button" class="btn btn-link" data-toggle="modal" data-target="#submit-feedback-modal">
        <i class="fas fa-comment-alt-edit"></i> Submit Feedback
      </button>

      <!-- User Feeback Modal -->
    <div class="modal fade" id="submit-feedback-modal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Please Let us know how you feel about the system</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <small class="text-muted mb-3">Your feedback will help us improve the system and serve you better</small><br/>
            <small class="text-muted mb-4"><i class="fad fa-user-secret"></i> (Your feedback will be anonymous)</small>
            <form id="user-feedback-form" class="mt-4">
              <div class="row">
                <div class="col-sm-12">
                    <textarea maxlength="1000" required class="form-control" name="user_feedback_message" placeholder="enter your feedback here"></textarea>
                </div>
              </div>
              <br/><br/>
              <div class="row">
                    <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-primary btn-block" id="user-feedback-button">SUBMIT</button>
                    </div>
              </div>
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

      <b>Version</b> 1.0
    </div>
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte.js"></script>
<script src="assets/js/pace.min.js"></script>

<!--blockui ver 2.70-->
<script src="assets/js/jquery.blockUI.js"></script>
<!--sweetalert-->
<script src="assets/js/sweetalert2@9.js"></script>


<!--select2  ver @4.0.12-->
<script src="assets/js/select2.min.js"></script>

<!-- select2 bootstrap theme -->
<script src="assets/js/select2-bootstrap4-theme.js"></script>
<!--jquery autosize-->
<script src="assets/js/jquery.autosize.js"></script>
<!-- Datatables -->
<script type="text/javascript" src="assets/libs/datatables/pdfmake.min.js"></script>
<script type="text/javascript" src="assets/libs/datatables/vfs_fonts.js"></script>
<script type="text/javascript" src="assets/libs/datatables/datatables.min.js"></script>
<!-- datepicker -->
<script src="assets/js/bootstrap-datepicker.min.js"></script>
<!-- maxlength -->
<script src="assets/js/bootstrap-maxlength.js"></script>

<!--highcharts -->
<script src="assets/js/highcharts.js"></script>
<script src="assets/js/exporting.js"></script>
<script src="assets/js/offline-exporting.js"></script>


<!-- autosave forms sisyphus -->
<script src="assets/js/sisyphus.min.js"></script>

<!--Typed js -->
<script src="assets/js/typed.js"></script>
<script src="assets/js/jq-ajax-progress.js"></script>

<!-- shimmer js -->
<script src="assets/libs/shimmerjs/shimmer.js"></script>

<!-- simpleticker  js -->
<script src="assets/libs/vticker/jquery.vticker-min.js"></script>

<!-- pace min js -->
<script data-pace-options='{ "ajax": true }' src='assets/js/pace.min.js'></script>


<!-- animated event calendar  js -->
<script src="assets/libs/animated-event-calendar/src/jquery.simple-calendar.js"></script>

<!-- roadmap -->
<script src="assets/libs/roadmap/dist/jquery.roadmap.min.js"></script>

<!-- gantt -->
<script src="assets/libs/gantt/js/jquery.fn.gantt.js"></script>

<!-- color schemes for the charts -->
<script src="assets/js/chartjs-plugin-colorschemes.min.js"></script>
<script src="https://timeago.yarp.com/jquery.timeago.js"></script>

<!-- routes -->
<script src="controllers/routes.js?v12"></script>

<!-- custom -->
<script src="controllers/custom.js?v41"></script>

<!-- skeleton -->
<script src="controllers/skeletons.js?v=8"></script>

<!-- forms -->
<script src="controllers/forms.js?v=40"></script>

<!-- s1.src='assets/js/tawk.js'; -->

<script>
    function ShowPassword() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<script type="text/javascript"> window.$crisp=[];window.CRISP_WEBSITE_ID="aade7b13-df34-439e-8c2c-0e6fd7cb8c0d";(function(){ d=document;s=d.createElement("script"); s.src="https://client.crisp.chat/l.js"; s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})(); </script>

<script>
$crisp.push(["set", "user:nickname", ["<?php echo $_SESSION['name']; ?>"]]);
</script>
  <script>
function triggerClick(e) {
  document.querySelector('#profileImage').click();
}
function displayImage(e) {
  if (e.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e){
      document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}

function triggerClick2(e) {
  document.querySelector('#profileImage2').click();
}
function displayImage2(e) {
  if (e.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e){
      document.querySelector('#profileDisplay2').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}
</script>

<script>
//staff users table
$('#staff-users-table2').DataTable({
destroy:true,
dom: 'Bfrtip',
buttons: [
  {
      extend: 'copy',
      exportOptions: {
          columns: ':visible'
      }
  },
  {
      extend: 'csv',
      exportOptions: {
          columns: ':visible'
      }
  },
  {
      extend: 'excel',
      exportOptions: {
          columns: ':visible'
      }
  },
  {
      extend: 'pdf',
      orientation: 'landscape',
      pageSize: 'LEGAL',
      exportOptions: {
          columns: ':visible'
      }
  },
   {
      extend: 'print',
      orientation: 'landscape',
      pageSize: 'LEGAL',
      title:'PPRMIS USERS',
      messageTop: 'Capital Markets Authority',
      exportOptions: {
          columns: ':visible'
      }
  },
  'colvis','colvisRestore'
  ],
  columnDefs: [ {
      visible: false,


  } ],

initComplete: function () {
  this.api().columns().every( function () {
      var column = this;
      var select = $('<select class="select2 form-control"><option value=""></option></select>')
          .appendTo( $(column.footer()).empty() )
          .on( 'change', function () {
              var val = $.fn.dataTable.util.escapeRegex(
                  $(this).val()
              );

              column
                  .search( val ? '^'+val+'$' : '', true, false )
                  .draw();
          } );

      column.data().unique().sort().each( function ( d, j ) {
          select.append( '<option value="'+d+'">'+d+'</option>' );
      } );
  } );
}

});
$('#staff-users-table2 tfoot tr').insertAfter($('#staff-users-table thead tr'));
//end of staff users table
</script>
<!--Start of Tawk.to Script-->
<!--Start of Tawk.to Script
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5ed8c6274a7c62581799e672/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<!--End of Tawk.to Script-->


</body>
</html>
