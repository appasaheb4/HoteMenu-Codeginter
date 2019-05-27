<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Menu App Admin Panel</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <?php
        include_once 'application/views/staticfiles.php';
        ?>
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link href="application/Resource/MyFiles/adminDashboard/AdminLTE.min.css" rel="stylesheet" type="text/css"/>
        <link href="application/Resource/MyFiles/adminDashboard/_all-skins.min.css" rel="stylesheet" type="text/css"/>
        <link href="application/Resource/MyFiles/adminDashboard/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css"/>
        <link href="application/Resource/MyFiles/adminDashboard/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css"/>
        <link href="application/Resource/MyFiles/adminDashboard/daterangepicker.css" rel="stylesheet" type="text/css"/>
        <link href="application/Resource/MyFiles/adminDashboard/ionicons.min.css" rel="stylesheet" type="text/css"/>
        <link href="application/Resource/MyFiles/adminDashboard/jquery-jvectormap.css" rel="stylesheet" type="text/css"/>
        <link href="application/Resource/MyFiles/adminDashboard/morris.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
        <style>  

            .nav-tabs{
                background-color: #EC7C00;
            }
            .nav-tabs  li a{
                color: white;
            }
            .titleColor{
                color:white;
            }
            .imgDash{
                height: 100px;
            }
            .bottomShow{
                position: fixed;
                bottom: 0;
            }

            .scheduler-border {
                border: 2px groove #ddd !important;
                padding: 0 1.4em 1.4em 1.4em !important;
                margin: 0 0 1.5em 0 !important;
                -webkit-box-shadow: 0px 0px 0px 0px #000;
                box-shadow: 0px 0px 0px 0px #000;
            }

            .error1 {
                width:200px;
                height:20px;
                height:auto;
                position:absolute;
                z-index: 1;
                left:50%;
                margin-left:-100px;
                bottom:10px;
                background-color: #383838;
                color: #F0F0F0;
                font-family: Calibri;
                font-size: 20px;
                padding:10px;
                text-align:center;
                border-radius: 2px;
                -webkit-box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
                -moz-box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
                box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
            }
        </style>

        <style>
            .dashIcon{
                font-size: 50px;
            }

            .dashFont{
                font-size: 30px;
                color: white;   
                font-family: 'Bree Serif', serif; 
            }

            .pointerMouse{
                cursor: pointer;
            }

            .dashTi{
                color: white;   
            }

            #table-wrapper {
                position:relative;
            }

            #table-scroll {
                height:300px;
                overflow:auto;  
                margin-top:20px;
            }

            #table-wrapper table {
                width:100%;

            }   

            #table-wrapper table thead th .text {
                position:absolute;   
                top:-20px;
                z-index:2;
                height:20px;
                width:35%;
                border:1px solid red;
            }

        </style>

        <script type="text/javascript">
            $(document).ready(function () {
<?php
$commentMess = $this->session->flashdata('adminBackEnd');
if ($commentMess == "AddMenu Save Data.") {
    ?>

                    $('.content').load("AddMenu");
                    setTimeout(function () {
                        $('.error1').text('Data save.');
                        $('.error1').fadeIn(400).delay(2000).fadeOut(300);
                    }, 300);

    <?php
} else if ($commentMess == "Login not done.") {
    ?>

                    setTimeout(function () {
                        $('.error1').text('Enter corret email and password.');
                        $('.error1').fadeIn(400).delay(2000).fadeOut(300);
                    }, 300);

    <?php
} else if ($commentMess == "MyProfile Image Upload.") {
    ?>
                    $('.content').load("MyProfile");
                    setTimeout(function () {
                        $('.error1').text('Image Upload.');
                        $('.error1').fadeIn(400).delay(2000).fadeOut(300);
                    }, 300);

    <?php
}
?>
            });
        </script>


    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class='error1' style="display: none"></div>
        <div class="wrapper">      
            <header class="main-header">
                <!-- Logo -->
                <a href="#" class="logo dashboard">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>Menu App</b></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Menu App </b>Panel</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                            <li class="dropdown messages-menu"><a href="Content/DeployFile/MenuApp.apk">  
                                    <i class="fa fa-android"></i>
                                    <span class="label label-danger">New</span>
                                </a>
                            </li>

                            <!-- Notifications: style can be found in dropdown.less -->
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-warning">10</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 10 notifications</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                                                    page and may cause design problems
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-users text-red"></i> 5 new members joined
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-user text-red"></i> You changed your username
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">View all</a></li>
                                </ul>
                            </li>

                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php foreach ($getUserData as $profileRow): ?>
                                        <?php echo '<img src="' . $profileRow['imagePath'] . '" class="user-image" alt="User Image" />'; ?>
                                        <span class="hidden-xs"> <?php
                                            echo $profileRow['fullName'];
                                            ?>
                                        </span>
                                    <?php endforeach; ?>
                                </a>
                            </li>
                            <li class="logout pointerMouse"><a><i class="fa fa-sign-out" aria-hidden="true"></i>  Logout</a></li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="active pointerMouse" >
                            <a class="dashboard">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-list"></i>
                                <span>Master</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#" class="userList"><i class="fa fa-circle-o"></i>User List</a></li>
                                <li><a href="#" class="addMenu"><i class="fa fa-circle-o"></i>Add Admin Menu</a></li>
                                <li><a href="#" class="addRest"><i class="fa fa-circle-o"></i>User Menu List</a></li>

                            </ul>
                        </li>
                        <li class="treeview">    
                            <a href="#">
                                <i class="fa fa-wrench"></i>
                                <span>Setting</span>  
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">   
                                <li><a  onClick="location.href = '/dataBaseBackUp/getBackup'"><i class="fa fa-circle-o"></i>Back Up</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="logout">
                                <i class="fa fa-sign-out"></i> <span>Logout</span>
                            </a>
                        </li>
                        <li class="header" style="color: white;">Category</li>
                        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Information</span></a></li>
                       
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
<!--                <section class="content-header">
                    <h1>    
                        Dashboard
                        <small>Control panel</small>   
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>-->

                <!-- Main content -->
                <section class="content">
                    <div class="form-group">   
                        <div class="col-md-3 col-sm-6 col-xs-6 col-lg-3 pointerMouse">
                            <div class="panel panel-primary userList">
                                <div class="panel-body bg-AcidGreen"> 
                                    <i class="fa fa-users pull-right dashIcon" aria-hidden="true"></i>
                                    <div class="pull-left">
                                        <big class="dashFont"><?php echo ' ' ?></big> <br/> 
                                        <span class="dashTi">User List</span></div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6 col-lg-3 pointerMouse">
                            <div class="panel panel-primary addMenu">
                                <div class="panel-body bg-Aero">
                                    <i class="fa fa-plus-square pull-right dashIcon" aria-hidden="true"></i>
                                    <div class="pull-left">
                                        <big class="dashFont"><?php echo ' ' ?></big> <br/> 
                                        <span class="dashTi">Add Admin Menu</span></div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6 col-lg-3 pointerMouse">
                            <div class="panel panel-primary addRest">
                                <div class="panel-body bg-yellow">
                                    <i class="fa fa-bars pull-right dashIcon" aria-hidden="true"></i>
                                    <div class="pull-left">
                                        <big class="dashFont"><?php echo ' ' ?></big> <br/> 
                                        <span class="dashTi">User Menu List</span></div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6 col-lg-3 pointerMouse">
                            <div class="panel panel-primary" onClick="location.href = '/dataBaseBackUp/getBackup'">
                                <div class="panel-body bg-Aero">
                                    <i class="fa fa-database pull-right dashIcon" aria-hidden="true"></i>
                                    <div class="pull-left">
                                        <big class="dashFont"><?php echo ' ' ?></big> <br/> 
                                        <span class="dashTi">Back Up</span></div>   

                                </div>
                            </div>  
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-6 col-lg-3 pointerMouse">
                            <div class="panel panel-primary myProfile">
                                <div class="panel-body bg-red">
                                    <i class="fa fa-user pull-right dashIcon"  aria-hidden="true"></i>
                                    <div class="pull-left">
                                        <big class="dashFont" ><?php echo ' ' ?></big> <br/> 
                                        <span class="dashTi">My Profile</span></div>

                                </div>

                            </div>
                        </div>  
                        <div class="clearfix"></div>
                    </div>  

                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Kumar Sir</b>
                </div>
                <strong>Menu App</strong>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">
                        <h3 class="control-sidebar-heading">Recent Activity</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                        <p>Will be 23 on April 24th</p>
                                    </div>
                                </a>
                            </li>

                        </ul>
                    </div>

                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>

                    <div class="tab-pane" id="control-sidebar-settings-tab">
                        <form method="post">
                            <h3 class="control-sidebar-heading">General Settings</h3>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
            </aside>

            <div class="control-sidebar-bg"></div>
        </div>
        <script src="application/Resource/MyFiles/adminDashboard/adminlte.min.js" type="text/javascript"></script>
        <script type="text/javascript">
                                $(document).ready(function () {
                                    $('.content-header').hide();
                                    $(".bottomShow").draggable();
                                    $('.dashboard').click(function () {
                                        location.reload();
                                    });
                                    $('.userList').click(function () {
                                        $('.content').load("UserList");
                                        $('.content-header').hide();
                                    });
                                    $('.addMenu').click(function () {
                                        $('.content').load("AddMenu");
                                        $('.content-header').hide();
                                    });

                                    $('.addRest').click(function () {
                                        $('.content').load("AddRestaurants");
                                        $('.content-header').hide();
                                    });
                                    $('.myProfile').click(function () {
                                        $('.content').load("MyProfile");
                                        $('.content-header').hide();
                                    });


                                    $('.logout').click(function () {
                                        location.href = '/LoginPage/logout';
                                    });



                                });
        </script>




    </body>
</html>
