<?php
session_start();
require_once('../connect.php');

if (isset($_GET["key"]) and $_GET["key"] == 'add_bill') {
    $date_add = date("Y-m-d");
    $date_m = date("m");
    $sum_bill = 0;
    $bill_old = 0;
    $bill_old = $_GET["bill_old"];
    $sum_bill = $_POST["electricity_bill"] - $_GET["bill_old"];

    $sql = "INSERT INTO add_bill (room,bill_old,electricity_bill,mitor,water_bill,member_bill,date_add,date_m,date_pay,status_bill )
VALUES ('" . $_GET["room"] . "','$bill_old','" . $_POST["electricity_bill"] . "','$sum_bill','" . $_POST["water_bill"] . "','" . $_GET["user_room"] . "','$date_add','$date_m','','1')";
    if ($conn->query($sql) === TRUE) {
        // echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else if (isset($_GET["key"]) and $_GET["key"] == 'up_bill') {

    $sql_bill = "UPDATE add_bill SET electricity_bill ='" . $_POST["electricity_bill"] . "',water_bill ='" . $_POST["water_bill"] . "' WHERE id_bill  ='" . $_GET["bill_ids"] . "'";

    if ($conn->query($sql_bill) === TRUE) {
        // echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    
}


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">สมาชิก</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Smart Door</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../img/<?php echo $_SESSION["img_session"] ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION["user_session"] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                ข้อมูลสมาชิก
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="./index.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>สมาชิก</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="./add_member.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>เพิ่มสมาชิก</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                ข้อมูลการชำระเงิน
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./add_bill.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ป้อนค่าน้ำ ค่าไฟ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./approve.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>แจ้งเตือนการชำระเงิน</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>การกำหนดสิทธิ์</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                ตั้งค่าหอพัก
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>หน้าเว็ป</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>กฎระเบียบ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>การติดต่อ</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item has-treeview">
            <a href="../member/logout.php"data-nav-section="logout" onClick="return confirm('คุณต้องการออกจากระบบหรือไม่ ?');">
              <i class="fa fa-sign-out" style="font-size:24px">
             logout
              </i>
             
            </a>
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
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>บันทึกค่าไฟฟ้า-ค่าน้ำ <?php
                                                            function DateThai($strDate)
                                                            {
                                                                $strYear = date("Y", strtotime($strDate)) + 543;
                                                                $strMonth = date("n", strtotime($strDate));
                                                                $strDay = date("j", strtotime($strDate));
                                                                $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
                                                                $strMonthThai = $strMonthCut[$strMonth];
                                                                return "$strDay $strMonthThai $strYear";
                                                            }

                                                            $strDate = date("d-m-Y");
                                                            echo ": " . DateThai($strDate);
                                                            ?> </h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">บันทึกค่าไฟฟ้า-ค่าน้ำ</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Default box -->
                    <div class="card card-solid">
                        <div class="card-body pb-0">
                            <div class="row d-flex align-items-stretch">
                                <?php
                                $sql_seletc_room = "SELECT * FROM member INNER JOIN room ON member.room=room.name_room order by room ASC";
                                $result_seletc_room = $conn->query($sql_seletc_room);

                                if ($result_seletc_room->num_rows > 0) { 
                                    // output data of each row
                                    while ($row_seletc_room = $result_seletc_room->fetch_assoc()) {

                                ?>


                                        <?php
                                        $date = date("m");
                                        $sql_seletc_bill = "SELECT id_bill,room,electricity_bill,water_bill FROM add_bill WHERE room = '" . $row_seletc_room["name_room"] . "'and date_m=$date";
                                        $result_seletc_bill = $conn->query($sql_seletc_bill);

                                        if ($result_seletc_bill->num_rows > 0) {
                                            // output data of each row
                                            while ($row = $result_seletc_bill->fetch_assoc()) {
                                        ?>
                                                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                                    <div class="card bg-light col-12">
                                                        <form role="form" name="member" action="add_bill.php?key=up_bill&bill_ids=<?php echo $row["id_bill"]; ?>" method="POST">
                                                            <div class="card-header text-muted border-bottom-0">
                                                                <h3 class="card-title" style="float: right"> <B>ห้อง
                                                                        <?php echo $row_seletc_room["name_room"]; ?></B></h3>
                                                                <div class="card-header">

                                                                </div>
                                                            </div>
                                                            <div class="card-body pt-0">

                                                                <div class="row">

                                                                    <div class="col-12">

                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control" name="electricity_bill_old" id="electricity_bill_old" style="letter-spacing: 5px;text-align:center;" value="<?php echo $row_seletc_room["mitor"]; ?>" disabled><input class="form-control" name="electricity_bill" id="electricity_bill" style="letter-spacing: 5px;text-align:center;" placeholder="ค่าไฟฟ้า/หน่วย" value="<?php echo $row["electricity_bill"]; ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="8">

                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text"><svg class="bi bi-lightning-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                                        <path fill-rule="evenodd" d="M11.251.068a.5.5 0 01.227.58L9.677 6.5H13a.5.5 0 01.364.843l-8 8.5a.5.5 0 01-.842-.49L6.323 9.5H3a.5.5 0 01-.364-.843l8-8.5a.5.5 0 01.615-.09z" clip-rule="evenodd" />
                                                                                    </svg></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"><svg class="bi bi-droplet-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                                        <path fill-rule="evenodd" d="M8 16a6 6 0 006-6c0-1.655-1.122-2.904-2.432-4.362C10.254 4.176 8.75 2.503 8 0c0 0-6 5.686-6 10a6 6 0 006 6zM6.646 4.646c-.376.377-1.272 1.489-2.093 3.13l.894.448c.78-1.559 1.616-2.58 1.907-2.87l-.708-.708z" clip-rule="evenodd" />
                                                                                    </svg></i></span>
                                                                            </div>
                                                                            <input type="text" class="form-control" name="water_bill" id="water_bill" style="letter-spacing: 5px;text-align:center;" placeholder="ค่าน้ำ/บาท" value="<?php echo $row["water_bill"]; ?>">
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text">.00</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <div class="text-right">
                                                                    <button class="btn btn-sm btn-primary">
                                                                        <svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd" />
                                                                            <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 00.5.5H4v.5a.5.5 0 00.5.5H5v.5a.5.5 0 00.5.5H6v-1.5a.5.5 0 00-.5-.5H5v-.5a.5.5 0 00-.5-.5H3z" clip-rule="evenodd" />
                                                                        </svg> แก้ไขข้อมูล
                                                                    </button>
                                                                </div>



                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>


                                            <?php }
                                        } else { ?>
                                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                                <div class="card bg-light col-12">
                                                    <form role="form" name="member" action="add_bill.php?key=add_bill&bill_old=<?php echo $row_seletc_room["mitor"]; ?>&room=<?php echo $row_seletc_room["name_room"]; ?>&user_room=<?php echo $row_seletc_room["id_mem"]; ?>" method="POST">
                                                        <div class="card-header text-muted border-bottom-0">
                                                            <h3 class="card-title" style="float: right"> <B>ห้อง
                                                                    <?php echo $row_seletc_room["name_room"]; ?></B></h3>
                                                            <div class="card-header">

                                                            </div>
                                                        </div>

                                                        <div class="card-body pt-0">

                                                            <div class="row">

                                                                <div class="col-12">

                                                                    <div class="input-group mb-3">


                                                                        <input type="text" class="form-control" name="electricity_bill_old" id="electricity_bill_old" style="letter-spacing: 5px;text-align:center;" value="<?php echo $row_seletc_room["mitor"]; ?>" disabled><input class="form-control" name="electricity_bill" id="electricity_bill" style="letter-spacing: 5px;text-align:center;" placeholder="ค่าไฟฟ้า/หน่วย" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="8">

                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><svg class="bi bi-lightning-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                                    <path fill-rule="evenodd" d="M11.251.068a.5.5 0 01.227.58L9.677 6.5H13a.5.5 0 01.364.843l-8 8.5a.5.5 0 01-.842-.49L6.323 9.5H3a.5.5 0 01-.364-.843l8-8.5a.5.5 0 01.615-.09z" clip-rule="evenodd" />
                                                                                </svg></span>
                                                                        </div>
                                                                    </div>



                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"><svg class="bi bi-droplet-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                                    <path fill-rule="evenodd" d="M8 16a6 6 0 006-6c0-1.655-1.122-2.904-2.432-4.362C10.254 4.176 8.75 2.503 8 0c0 0-6 5.686-6 10a6 6 0 006 6zM6.646 4.646c-.376.377-1.272 1.489-2.093 3.13l.894.448c.78-1.559 1.616-2.58 1.907-2.87l-.708-.708z" clip-rule="evenodd" />
                                                                                </svg></i></span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="water_bill" id="water_bill" style="letter-spacing: 5px;text-align:center;" placeholder="ค่าน้ำ/บาท">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">.00</span>
                                                                        </div>
                                                                    </div>




                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="text-right">

                                                                <button class="btn btn-sm btn-primary">
                                                                    <svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd" />
                                                                        <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 00.5.5H4v.5a.5.5 0 00.5.5H5v.5a.5.5 0 00.5.5H6v-1.5a.5.5 0 00-.5-.5H5v-.5a.5.5 0 00-.5-.5H3z" clip-rule="evenodd" />
                                                                    </svg> บันทึกข้อมูล
                                                                </button>
                                                            </div>



                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        <?php  } ?>
                                <?php  }
                                } ?>





                            </div>
                        </div>
                        <!-- /.card-body -->

                        <!-- /.card-footer -->
                    </div>

                    <!-- /.card -->

                </section>
                <!-- /.content -->
            </div>
 






  <!-- /.content-wrapper -->
  <footer class="main-footer">
   

    <div class="float-right d-none d-sm-inline-block">
   
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>