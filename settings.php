<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    <!-- Chrome/android APP settings -->
    <meta name="theme-color" content="#4287f5">
    <link rel="icon" href="img/icon.png" sizes="192x192">
    <!-- end of Chrome/Android App Settings  -->

    <!-- Bootstrap // you can use hosted CDN here-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">
    <!-- end of bootstrap -->

</head>

<body class="bg-primary">
    <!-- Page Start -->
    <div class="pt-5 container bg-white rounded">

        <!-- NAV START -->
        <nav class="navbar navbar-dark bg-dark rounded">
            <a class="navbar-brand" href="index.php">
                <img src="img/icon.png" width="30" height="30" class="d-inline-block align-top bg-white rounded" alt="">
                
            </a>
        </nav>
        <!-- NAV END -->

        <!-- Main Content Start-->
        <br>
        <?php require_once("_setting_eqt.php");?>
        <br>
        <?php require_once("_setting_eq.php");?>
        <br>
        <?php require_once("_setting_com.php");?>
        <br>
        <?php require_once("_setting_dis.php");?>
        <br>
        <?php require_once("_setting_fail.php");?>
        <br>

        <div class="row my-3">
            <div class="col-12">
                <button class="btn btn-outline-primary btn-lg form-control"
                    onclick="document.location.href='index.php'">Home</button>
            </div>
        </div>
        <br><br>
        <!-- Main Content Start-->

    </div>
    <!-- Page End -->

    <!-- Start of Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- end of Bootstrap JS -->

    <!-- Page Level Scripts -->

</body>

</html>