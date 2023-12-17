<?php
include './inc/db.php';
$errmsg = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['panel'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT * FROM `admin` WHERE username = '$username'");
    $stmt->execute();
    $sql = $stmt-> fetch();
    if($sql == false){
        $errmsg = "Username xato kiritildi";
    }else if($sql['password'] != $password){
        $errmsg = "Parol xato kiritildi";
    }else{
        $_SESSION['admin'] = 1;
        header('Location: index.php');
    }

}

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <!-- meta data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!--font-family-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet">

    <!-- title of site -->
    <title>CarSpare</title>

    <!-- For favicon png -->
    <link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png" />

    <!--font-awesome.min.css-->
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">

    <!--linear icon css-->
    <link rel="stylesheet" href="../assets/css/linearicons.css">

    <!--flaticon.css-->
    <link rel="stylesheet" href="../assets/css/flaticon.css">

    <!--animate.css-->
    <link rel="stylesheet" href="../assets/css/animate.css">

    <!--owl.carousel.css-->
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/owl.theme.default.min.css">

    <!--bootstrap.min.css-->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <!-- bootsnav -->
    <link rel="stylesheet" href="../assets/css/bootsnav.css">

    <!--style.css-->
    <link rel="stylesheet" href="../assets/css/style.css">

    <!--responsive.css-->
    <link rel="stylesheet" href="../assets/css/responsive.css">

</head>

<body>

<div class="container" style="width: 100%; height: 100vh; display: flex; justify-content: center; align-items: center; flex-direction: column;">
<h5 style="float: left; margin-bottom: 50px;">Admin panelga hush kelibsiz!</h5>
    <form style="width: 80%;" action="" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" style="padding: 25px 20px;" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username kiriting..." name="username">
            <small id="emailHelp" class="form-text text-muted" style="color: red;"><?=$errmsg;?></small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Parol</label>
            <input type="password" class="form-control" style="padding: 25px 20px;" id="exampleInputPassword1" placeholder="Parolni kiriting" name="password">
        </div>
        <button type="submit" class="btn btn-primary" style="padding: 15px 20px;" name="panel">Kirish</button>
    </form>
</div>

</body>
</html