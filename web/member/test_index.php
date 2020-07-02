<?php
session_start();
require_once('../connect.php');
try {
  if (isset($_POST["input_name"]) and $_POST["input_name"] != '') {
$date_add = date("Y-m-d");
    $pic_tmp = $_FILES['imgInp']['tmp_name'];  //เอาไฟล์ temporary ไปเก็บที่ตัวแปร $pic_tmp
    $pic_name = $_FILES['imgInp']['name'];    //เอาชื่อไฟล์ ไปเก็บที่ตัวแปร $pic_name
    if ($pic_name <> "") {
      $rename = "img_" . date('dmYHis') . "_sen" . substr($pic_name, -4);
    }

    if (move_uploaded_file($_FILES["imgInp"]["tmp_name"], "../img/send_money/" . $rename)) {

      $sql = "INSERT INTO send_money (user,room,month_send,date_bill,img_send,status_send)
VALUES ('".$_SESSION["user_session"]."','".$_SESSION["room_session"]."','" . $_POST["input_name"] . "','$date_add', '" . $rename . "','1')";

      if ($conn->query($sql) === TRUE) {

      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
	$sql_bill = "UPDATE add_bill SET status_bill='2',user='".$_SESSION["user_session"]."',date_pay='$date_add' WHERE id_bill ='" . $_POST["input_name"] . "' ";

	if ($conn->query($sql_bill) === TRUE) {
	  
	}



  }
} catch (Exception $e) {
    echo $e->getMessage();
}
?>


<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Jackson Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

	<link rel="stylesheet" type="text/css" href="css/singha.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
<style>
	.col-md-6.qr {

text-align: center;
}
.col-md-6.bill {
    text-align: right;
}
.col-md-6.five {
    text-align: left;
}
.btn-file {
    position: relative;
    overflow: hidden;
}


</style>

	</head>
	<body>
	<div id="colorlib-page">
		<div class="container-wrap">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="border js-fullheight">
			<div class="text-center">
				<div class="author-img" style="background-image: url(../img/<?php echo $_SESSION["img_session"] ?>);"></div>
				
				<h1 id="colorlib-logo"><a href="index.php"><?php echo $_SESSION["user_session"]; ?></a></h1>
				<span class="position"><a href="#">Smart Door</a> ...s</span>
			</div>
			<nav id="colorlib-main-menu" role="navigation" class="navbar">
				<div id="navbar" class="collapse">
					<ul>
						<li class="active"><a href="#" data-nav-section="home">Home</a></li>
						<li><a href="#" data-nav-section="about">ข้อมูลส่วนตัว</a></li>
						<li><a href="#" data-nav-section="services">ค่าใช้จ่าย</a></li>
						<li><a href="#" data-nav-section="skills">หลักฐานการชำระเงิน</a></li>
						<li><a href="#" data-nav-section="education">ข้อปฏิบัติการพักอาศัย</a></li>
						<!-- <li><a href="#" data-nav-section="experience">Experience</a></li>
						<li><a href="#" data-nav-section="work">Work</a></li>
						<li><a href="#" data-nav-section="blog">Blog</a></li> -->
						<li><a href="#" data-nav-section="contact">Contact</a></li>
						
					</ul>
				</div>
				<ul>
						<li><a href="logout.php"data-nav-section="logout" onClick="return confirm('คุณต้องการออกจากระบบหรือไม่ ?');">logout</a></li>
					</ul>
			
			</nav>

			<div class="colorlib-footer">
				
				<ul>
					<li><a href="#"><i class="icon-facebook2"></i></a></li>
					<li><a href="#"><i class="icon-twitter2"></i></a></li>
					<li><a href="#"><i class="icon-instagram"></i></a></li>
					<li><a href="#"><i class="icon-linkedin2"></i></a></li>
				</ul>
			</div>

		</aside>

		<div id="colorlib-main">
			<section id="colorlib-hero" class="js-fullheight" data-section="home">
				<div class="flexslider js-fullheight">
					<ul class="slides">
				   	<li style="background-image: url(images/img_bg_1.jpg);">
				   		<div class="overlay"></div>
				   		<div class="container-fluid">
				   			<div class="row">
					   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 col-sm-12 col-xs-12 js-fullheight slider-text">
					   				<div class="slider-text-inner js-fullheight">
					   					<div class="desc">
						   					<h1>Hi! <br>I'm Jackson</h1>
						   					<h2>100% html5 bootstrap templates Made by <a href="https://colorlib.com/" target="_blank">colorlib.com</a></h2>
												<p><a class="btn btn-primary btn-learn">Download CV <i class="icon-download4"></i></a></p>
											</div>
					   				</div>
					   			</div>
					   		</div>
				   		</div>
				   	</li>
				   	<li style="background-image: url(images/img_bg_2.jpg);">
				   		<div class="overlay"></div>
				   		<div class="container-fluid">
				   			<div class="row">
					   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 col-sm-12 col-xs-12 js-fullheight slider-text">
					   				<div class="slider-text-inner">
					   					<div class="desc">
						   					<h1>I am <br>a Designer</h1>
												<h2>100% html5 bootstrap templates Made by <a href="https://colorlib.com/" target="_blank">colorlib.com</a></h2>
												<p><a class="btn btn-primary btn-learn">View Portfolio <i class="icon-briefcase3"></i></a></p>
											</div>
					   				</div>
					   			</div>
					   		</div>
				   		</div>
				   	</li>
				  	</ul>
			  	</div>
			</section>

			<section class="colorlib-about" data-section="about">
				<div class="colorlib-narrow-content">
					<div class="row">
						<div class="col-md-12">
							<div class="row row-bottom-padded-sm animate-box" data-animate-effect="fadeInLeft">
								<div class="col-md-12">
									<div class="about-desc">
										<span class="heading-meta">About Us</span>
										<h2 class="colorlib-heading">ข้อมูลส่วนตัว</h2>

										<?php $sql_us = "SELECT * FROM member where user='".$_SESSION["user_session"]."'";
$result_us = $conn->query($sql_us);

if ($result_us->num_rows > 0) {
  // output data of each row
  while($row_us = $result_us->fetch_assoc()) {
    
?>
										<form class="contact100-form validate-form">
				

				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">ชื่อ-นามสกุล</span>
					<input class="input100" type="text" name="name" placeholder="Name..." value="<?php echo $row_us["user"]; ?>">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<span class="label-input100">อีเมล</span>
					<input class="input100" type="text" name="email" placeholder="Email addess..." value="<?php echo $row_us["email_user"]; ?>">
					<span class="focus-input100"></span>
					
				</div>

				<div class="wrap-input100">
					<span class="label-input100">เบร์โทรศัพท์</span>
					<input class="input100" type="text" name="phone" placeholder="Phone Number..." value="<?php echo $row_us["phone_user"]; ?>">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<span class="label-input100">Message</span>
					<textarea class="input100" name="message" placeholder="Questions/Comments..."></textarea>
					<span class="focus-input100"></span>
				</div>

            </form>
  <?php }} ?>


									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3 animate-box" data-animate-effect="fadeInLeft">
									<div class="services color-1">
										<span class="icon2"><i class="icon-bulb"></i></span>
										<h3>Graphic Design</h3>
									</div>
								</div>
								<div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
									<div class="services color-2">
										<span class="icon2"><i class="icon-globe-outline"></i></span>
										<h3>Web Design</h3>
									</div>
								</div>
								<div class="col-md-3 animate-box" data-animate-effect="fadeInTop">
									<div class="services color-3">
										<span class="icon2"><i class="icon-data"></i></span>
										<h3>Software</h3>
									</div>
								</div>
								<div class="col-md-3 animate-box" data-animate-effect="fadeInBottom">
									<div class="services color-4">
										<span class="icon2"><i class="icon-phone3"></i></span>
										<h3>Application</h3>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
									<div class="hire">
										<h2>I am happy to know you <br>that 300+ projects done sucessfully!</h2>
										<a href="#" class="btn-hire">Hire me</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>


			
			<section class="colorlib-services" data-section="services">
				<div class="colorlib-narrow-content">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">What I do?</span>
							<h2 class="colorlib-heading">ค่าใช้จ่าย</h2>
						</div>
					</div>
					<div class="row row-pt-md">
					<?php 
			

					$sql_pay = "SELECT * FROM add_bill where member_bill='".$_SESSION["id_session"]."'";
$result_pay = $conn->query($sql_pay);


if ($result_pay->num_rows > 0) {
	
  // output data of each row
  while($row_pay = $result_pay->fetch_assoc()) {
	  

?>  
 <?php }} ?>

 <div class="row">
 <div class="col-md-12 pay">
 <?php 
			
			$sql_pay = "SELECT * FROM add_bill where member_bill='".$_SESSION["id_session"]."'";
$result_pay = $conn->query($sql_pay);


if ($result_pay->num_rows > 0) {

// output data of each row
while($row_pay = $result_pay->fetch_assoc()) {
	
?>  

<div class="w3-content w3-display-container">
<div class="mySlides"style="width:100%"> 

<div class="col-md-6 bill">
	<div class="col-md-12">
	<div class="col-md-12">
		<h1>ค่าไฟเดือน <?php  ?></h1>
	</div>
	<div class="col-md-6 five">
<p>หน่วยค่าไฟเดือนนี้</p>
		</div>
		<div class="col-md-6">
	<p><?php echo $row_pay["electricity_bill"]; ?> หน่วย</p>
		</div>
		<div class="col-md-6 five">
<p>หน่วยค่าไฟเดือนก่อน</p>
		</div>
		<div class="col-md-6">
	<p><?php echo $row_pay["bill_old"]; ?> หน่วย</p>
		</div>
		<div class="col-md-6 five">
<p>ค่าไฟฟ้า</p>
		</div>
		<div class="col-md-6">
<p> 		<?php $sum=($row_pay["electricity_bill"]-$row_pay["bill_old"]);$total=$sum*5;
echo $total; ?> บาท</p>
		</div>
		<div class="col-md-6 five">
<p>ค่าน้ำ</p>
		</div>
		<div class="col-md-6">
			<p> <?php echo $row_pay["water_bill"]; ?> บาท</p>
		
		</div>
		<div class="col-md-6">
<p></p>
		</div>
		<div class="col-md-6">
			<p>รวม <?php $end_total=$total+$row_pay["water_bill"]; echo $end_total; ?> บาท </p>
			
		</div>

	</div>


	 



  </div>
 <div class="col-md-6 qr">
 <?php 
require_once("./PromptPay/lib/PromptPayQR.php");
$PromptPayQR = new PromptPayQR(); // new object
$PromptPayQR->size = 6; // Set QR code size to 8
$PromptPayQR->id = '0966791113'; // PromptPay ID
$PromptPayQR->amount = $end_total; // Set amount (not necessary)
echo '<img src="' . $PromptPayQR->generate() . '" />';
?>
</div>
<?php }} ?>
</div>


  <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
  <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
</div>

 </div>

 
					</div>
				</div>
			</section>
			
			<div id="colorlib-counter" class="colorlib-counters" style="background-image: url(images/cover_bg_1.jpg);" data-stellar-background-ratio="0.5">
				<div class="overlay"></div>
				<div class="colorlib-narrow-content">
					<div class="row">
					</div>
					<div class="row">
						<div class="col-md-3 text-center animate-box">
							<span class="colorlib-counter js-counter" data-from="0" data-to="309" data-speed="5000" data-refresh-interval="50"></span>
							<span class="colorlib-counter-label">Cups of coffee</span>
						</div>
						<div class="col-md-3 text-center animate-box">
							<span class="colorlib-counter js-counter" data-from="0" data-to="356" data-speed="5000" data-refresh-interval="50"></span>
							<span class="colorlib-counter-label">Projects</span>
						</div>
						<div class="col-md-3 text-center animate-box">
							<span class="colorlib-counter js-counter" data-from="0" data-to="30" data-speed="5000" data-refresh-interval="50"></span>
							<span class="colorlib-counter-label">Clients</span>
						</div>
						<div class="col-md-3 text-center animate-box">
							<span class="colorlib-counter js-counter" data-from="0" data-to="10" data-speed="5000" data-refresh-interval="50"></span>
							<span class="colorlib-counter-label">Partners</span>
						</div>
					</div>
				</div>
			</div>

			<section class="colorlib-skills" data-section="skills">
				<div class="colorlib-narrow-content">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">My Specialty</span>
							<h2 class="colorlib-heading animate-box">ส่งหลักฐานการชำระเงิน</h2>
						</div>
					</div>
					<div class="row">
						
						
						
						<div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
						<form role="form" name="send_money" action="test_index.php" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group">
                     
						<div class="col-sm-6">
                      <!-- select -->
                
					</div>
					<div class="col-md-12 form-group">
                    <label for="exampleInputPassword1">ชำระของเดือน</label>
                    <select class="form-control" name="input_name" id="input_name">
                          <option value="-">เลือกเดือนที่ชำระ</option>
                     
                              <?php
                                          $status_sql = "SELECT * FROM add_bill where member_bill='".$_SESSION["id_session"]."' AND status_bill='1' ";
                                          $status_result = $conn->query($status_sql);

                                          if ($status_result->num_rows > 0) {
                                            $i = 1;
                                            while ($status_row = $status_result->fetch_assoc()) {

                                          ?> 
                                <option value="<?php echo $status_row["id_bill"]; ?>"><?php echo $status_row["date_add"]; ?>
                            </option>
                        <?php }
                                          } ?>
                          </select>
                  </div>
                      </div>

                      <div class="form-group">
						 
                        <label for="exampleInputFile">อัพโหลดรูปภาพหลักฐานการชำระเงิน</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="imgInp" name="imgInp">
                            <label class="custom-file-label" for="exampleInputFile">เลือกรูปภาพ</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text" id=""></span>
                          </div>
                        </div>
                      </div>
                     
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                  </form>
		
						</div>
					</div>
				</div>
			</section>

			<section class="colorlib-education" data-section="education">
				<div class="colorlib-narrow-content">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">ข้อปฏิบัติการพักอาศัย</span>
							<h2 class="colorlib-heading animate-box">ข้อปฏิบัติการพักอาศัย</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
							<div class="fancy-collapse-panel">
								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
									<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="headingOne">
									        <h4 class="panel-title">
									            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">กฎระเบียบ
									            </a>
									        </h4>
									    </div>
									    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
									         <div class="panel-body">
									            <div class="row">
										      		<div class="col-md-12">
										      			<p>1.ห้ามส่งเสียงดังสร้างความรบกวน ก่อความรำคาญให้กับผู้พักอาศัยในหอพัก และห้ามทะเลาะวิวาทภายในหอพัก</p>
														  <p>2.ห้ามลักขโมยทรัพย์สิน หรือสิ่งของใดๆ ภายในหอพักหรือของผู้ที่พักอาศัยในหอพัก</p>
														  <p>3.ห้ามเสพอบายมุขภายในหอพัก เช่น บุหรี่ สุรา ยาเสพติด การพนัน ฯลฯ</p>
														  <p>4.ห้ามนำนักศึกษาหรือบุคคลภายนอกเข้าพักอาศัยในหอพักโดยไม่ได้รับอนุญาตจากอาจารย์ที่ปรึกษาหอพักและสำนักงานหอพักโดยเด็ดขาด หากฝ่าฝืนจะถูกตัดสิทธิการเข้าพักอาศัยในหอพัก และถูกยึดเงินค่าประกันหอพัก</p>
														  <p>5.ไม่อนุญาตให้นำนักศึกษาหรือบุคคลภายนอกขึ้นหอพัก</p>
														  <p>6.นักศึกษาหรือบุคคลภายนอกที่เข้าพักชั่วคราวจะต้องออกจากหอพักไม่เกินเวลา 12.00 น. ของวันถัดไป</p>
														  <p>7.นักศึกษาต้องรักษาความสะอาดห้องพัก ของใช้ส่วนรวม และไม่วางสิ่งของไว้หน้าห้องพัก</p>
														  <p>8.ห้ามครอบครองวัตถุอันตราย อันจะนำมาซึ่งความเสียหายและเกิดอันตรายแก่ทรัพย์สินของหอพัก และผู้อาศัยในหอพัก เช่น อาวุธ วัตถุระเบิด แก๊ส เชื้อเพลิง ฯลฯ</p>
														  <p>9.ห้ามทำลายทรัพย์สินหอพัก เช่น รื้อถอน ดัดแปลง ต่อเติม เคลื่อนย้ายอุปกรณ์ ฯลฯ  กรณีเจาะ-ตอกตะปูฝาผนัง ประตู เพดาน ฯลฯ จะถูกปรับจุดละ 300 บาท และหากทำทรัพย์สินเสียหายจะต้องชำระค่าปรับตามราคาของทรัพย์สินนั้น</p>
														  <p>10.ห้ามโยน ขว้างปา หรือทิ้งสิ่งของใดลงมาจากห้องพัก</p>
														  <p>11.ห้ามนำอุปกรณ์เครื่องใช้ไฟฟ้าที่ก่อให้เกิดอันตรายได้ง่ายมาใช้ในห้องพัก เช่น ขดลวดต้มน้ำ เตา ไฟฟ้า (Hot Plate) ฯลฯ</p>
														  <p>12.ห้ามประกอบอาหารในหอพัก และห้ามนำภาชนะของร้านค้าขึ้นหอพัก</p>
														  <p>13.ห้ามตากผ้าและวางพาดสิ่งของต่างๆ บนขอบระเบียงหลังห้องพัก</p>
														  <p>14.ห้ามนำสัตว์เลี้ยงทุกชนิดมาเลี้ยงไว้ในบริเวณหอพัก / ห้องพัก</p>
														  <p>15.ห้ามนักศึกษานอนค้างคืนภายนอกหอพัก ก่อนได้รับอนุญาตจากอาจารย์ที่ปรึกษาหอพัก ทั้งนี้ นักศึกษาชายและหญิง
จะต้องกลับเข้าหอพักภายในเวลา 24.00 น.</p>
														  <p>16.นักศึกษาจะต้องไม่ฝ่าฝืนคำสั่งและคำตักเตือนของอาจารย์ที่ปรึกษาหอพัก กรรมการนักศึกษาหอพัก และเจ้าหน้าที่หอพัก รวมทั้งจะต้องไม่ประพฤติผิดวินัยนักศึกษาตามข้อบังคับของมหาวิทยาลัยเทคโนโลยีพระจอมเกล้าธนบุรี ว่าด้วยวินัย
นักศึกษา</p>
														  <p>17.นักศึกษาต้องไม่ฝ่าฝืนกฎระเบียบอื่นๆ ของหอพัก</p>
										      		</div>
										      		<div class="col-md-6">
										      			<p></p>
										      		</div>
										      	</div>
									         </div>
									    </div>
									</div>
									<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="headingTwo">
									        <h4 class="panel-title">
									            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">สัญญาการเช่าหอพัก
									            </a>
									        </h4>
									    </div>
									    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
									        <div class="panel-body">
									            <p>Far far away, behind the word <strong>mountains</strong>, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
													<ul>
														<li>Separated they live in Bookmarksgrove right</li>
														<li>Separated they live in Bookmarksgrove right</li>
													</ul>
									        </div>
									    </div>
									</div>
									<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="headingThree">
									        <h4 class="panel-title">
									            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">ติดต่อแจ้งเหตุ
									            </a>
									        </h4>
									    </div>
									    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
									        <div class="panel-body">
									            <p>Far far away, behind the word <strong>mountains</strong>, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>	
									        </div>
									    </div>
									</div>

									<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="headingFour">
									        <h4 class="panel-title">
									            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Diploma in Information Technology
									            </a>
									        </h4>
									    </div>
									    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
									        <div class="panel-body">
									            <p>Far far away, behind the word <strong>mountains</strong>, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>	
									        </div>
									    </div>
									</div>

									<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="headingFive">
									        <h4 class="panel-title">
									            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">High School Secondary Education
									            </a>
									        </h4>
									    </div>
									    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
									        <div class="panel-body">
									            <p>Far far away, behind the word <strong>mountains</strong>, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>	
									        </div>
									    </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="colorlib-contact" data-section="contact">
				<div class="colorlib-narrow-content">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">Get in Touch</span>
							<h2 class="colorlib-heading">Contact</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-5">
							<div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
								<div class="colorlib-icon">
									<i class="icon-globe-outline"></i>
								</div>
								<div class="colorlib-text">
									<p><a href="#">info@domain.com</a></p>
								</div>
							</div>

							<div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
								<div class="colorlib-icon">
									<i class="icon-map"></i>
								</div>
								<div class="colorlib-text">
									<p>198 West 21th Street, Suite 721 New York NY 10016</p>
								</div>
							</div>

							<div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
								<div class="colorlib-icon">
									<i class="icon-phone"></i>
								</div>
								<div class="colorlib-text">
									<p><a href="tel://">+123 456 7890</a></p>
								</div>
							</div>
						</div>
						<div class="col-md-7 col-md-push-1">
							<div class="row">
								<div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInRight">
									<form action="">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Name">
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Email">
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Subject">
										</div>
										<div class="form-group">
											<textarea name="" id="message" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-primary btn-send-message" value="Send Message">
										</div>
									</form>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</section>

		</div><!-- end:colorlib-main -->
	</div><!-- end:container-wrap -->
	</div><!-- end:colorlib-page -->

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Counters -->
	<script src="js/jquery.countTo.js"></script>
	
	
	<!-- MAIN JS -->
	<script src="js/main.js"></script>
	<script src="js/singha.js"></script>
	
	<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>

	</body>
</html>