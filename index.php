<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ShiftLeader Handover</title>

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
                <img src="img/icon.png" width="30" height="30" class="d-inline-block align-top  bg-white rounded"
                    alt="Logo">
                ShiftLeader Handover
            </a>
        </nav>
        <!-- NAV END -->

        <section>
            <div class="row bg-white">
                <div class="col-12 bg-white text-center">
                    <div class="bg-dark p-1 my-1 rounded" style="margin: auto;">
                        <img src="img/Logo.jpg" class="img-fluid rounded" style="max-height: 200px;" alt="Header">
                    </div>
                </div>
            </div>

            <div class="text-center d-flex flex-column justify-content-center text-light p-5">
                <button class="btn btn-outline-primary btn-lg my-2" onclick="document.location.href='new.php'">
                    New HandOver</button>
                <button class="btn btn-outline-primary btn-lg my-2" onclick="document.location.href='summary.php'">
                    Update HandOver</button>
                <button class="btn btn-outline-primary btn-lg my-2" onclick="document.location.href='#'">Admin
                    Settings</button>
            </div>
        </section>


    </div>
    <!-- Page End -->

    <!-- Start of Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- end of Bootstrap JS -->

</body>

</html>