<?php
session_start();
?>
<?php
require_once('./connect.php');
if (isset($_GET["chk"]) and $_GET["chk"] == 'login') {
    //chk
    $sql = "SELECT * FROM member Where email_user='" . $_POST["email_user"] . "' or user='" . $_POST["email_user"] . "'  and pass='" . $_POST["pass"] . "' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        $_SESSION["id_session"] = $row["id_mem"];
        $_SESSION["user_session"] = $row["user"];
        $_SESSION["pass_session"] = $row["pass"];
        $_SESSION["status_session"] = $row["status_member"];
        $_SESSION["img_session"] = $row["img_user"];
        $_SESSION["room_session"] = $row["room"];
        if ($_SESSION["status_session"] == '1') {
            Header("Location: admin/index.php");
        } else {
            Header("Location: member/index.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fashi | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
  <meta charset="UTF-8">
  <title>CodePen - Login form</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

<link href='https://fonts.googleapis.com/css?family=Raleway:300,200' rel='stylesheet' type='text/css'><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="./style.css">
<style>
body {
    background-image: url(img/mansion/stadihome.jpg);
}</style>
</head>
<body>
<!-- partial:index.partial.html -->
<!-- <div class="menu">
  <ul class="mainmenu clearfix">
    <li class="menuitem">Well</li>
    <li class="menuitem">how</li>
    <li class="menuitem">about</li>
    <li class="menuitem">that?</li>
  </ul>
</div> -->
<!-- s -->
<form action="index.php?chk=login" method="POST">
<div class="form">
  <div class="forceColor"></div>
  <div class="topbar">
    <div class="spanColor"></div>
    <input type="text" class="input" id="username" name="email_user" placeholder="Username or email address *"/>
    <input type="password" class="input" id="pass" name="pass" placeholder="Password"/>
  </div>
  <button type="submit" class="submit" id="submit">เข้าสู่ระบบ</button>
 
</div>
</form>
<article class="article">
</article>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>

</body>
</html>