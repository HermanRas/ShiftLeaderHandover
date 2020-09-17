<?php
########################################################################
## New Load Blank
########################################################################
    $ShiftCalendarDate = '';
    $ShiftType = '';
    $ItemNumber = '';
    $ShiftLeaderName = '';
    $DoneIndicator =  '';
    $Comments = '';
    $LogonUser = $_SERVER['AUTH_USER'];

########################################################################
## Edit Load Data
########################################################################
    if (isset($_GET['DATE']) && isset($_GET['SHIFT']) ){
        $DATE = $_GET['DATE'];
        $SHIFT = $_GET['SHIFT'];

        $sql = "SELECT
                    tHandoverResults.ShiftCalendarDate,
                    tHandoverResults.ShiftType,
                    tHandoverResults.ItemNumber,
                    tHandoverResults.ShiftLeaderName,
                    tHandoverResults.DoneIndicator,
                    tHandoverResults.Comments,
                    tHandoverResults.LogonUser,
                    tHandoverResults.datetimestamp,
                    tItemListing.TaskDeterminations,
                    tItemListing.ItemDescription,
                    tItemListing.Occurance,
                    tItemListing.Frequency,
                    tItemListing.Priority,
                    tItemListing.ActiveIndicator
                From
                    tHandoverResults 
                Inner Join tItemListing On tItemListing.ItemNumber = tHandoverResults.ItemNumber
                Where
                    tHandoverResults.ShiftCalendarDate = '$DATE' 
                And
                    tHandoverResults.ShiftType = '$SHIFT';";
        
        $sqlargs = array();
        require_once 'config/db_query.php';
        $Items =  sqlQuery($sql,$sqlargs);
        $Items = $Items[0];
    }
?>

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
                <img src="img/icon.png" width="30" height="30" class="d-inline-block align-top bg-white rounded" alt="">
                ShiftLeader Handover
            </a>
        </nav>
        <!-- NAV END -->

        <!-- Main Content Start-->
        <!-- form start-->
        <div class="card">
            <div class="card-header bg-success">
                New Handover
            </div>
            <div class="card-body">
                <form method="POST" id="frmMain">

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <?php 
                                if (isset($Items[0]['ShiftCalendarDate'])) {
                                    $ShiftCalendarDate = $Items[0]['ShiftCalendarDate'];
                                }
                            ?>
                            <label for="StartDate">Shift Date</label>
                            <input type="date" class="form-control" id="StartDate" name="StartDate"
                                value="<?=$ShiftCalendarDate?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ShiftType">Shift Type</label>
                            <select type="text" class="form-control" id="ShiftType" name="ShiftType" disabled>
                                <?php 
                                    if (isset($Items[0]['ShiftType'])) {
                                        echo'<option value="'.$Items[0]['ShiftType'].'">'.$Items[0]['ShiftType'].'</option>';
                                    }
                                 ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <?php 
                                if (isset($Items[0]['ShiftLeaderName'])) {
                                    $ShiftLeaderName = $Items[0]['ShiftLeaderName'];
                                }
                            ?>
                            <label for="Equipment">ShiftLeader Name</label>
                            <input class="form-control" type="text" name="ShiftLeaderName" placeholder="your Name..."
                                value="<?=$ShiftLeaderName?>" disabled>
                        </div>
                    </div>
                    <hr>
                    <!-- ------------------------------------------------------------------- 
                        tItemListing.ItemNumber,
                        tItemListing.TaskDeterminations,
                        tItemListing.ItemDescription,
                        tItemListing.Responsibility,
                        tItemListing.Occurance,
                        tItemListing.Frequency,
                        tItemListing.Priority,
                        tItemListing.ActiveIndicator
                    -->
                    <?php
                    $i = 0;
                    foreach ($Items as $Item) {
                    ?>
                    <div class="form-row">
                        <div class="form-group col-md-1">
                            <label for="ItemNumber">Number</label>
                            <input type="text" class="form-control" name="ItemNumber[<?=$i?>]"
                                value="<?=$Item["ItemNumber"]?>" disabled>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="TaskDeterminations">Task Determinations</label>
                            <input type="text" class="form-control" name="TaskDeterminations"
                                value="<?=$Item["TaskDeterminations"]?>" disabled>
                        </div>
                        <div class="form-group col-md-9">
                            <label for="ItemDescription">Item Description</label>
                            <input type="text" class="form-control" style="color: blue" name="ItemDescription"
                                value="<?=$Item["ItemDescription"]?>" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="Occurance">Occurance</label>
                            <input type="text" class="form-control" name="Occurance" value="<?=$Item["Occurance"]?>"
                                disabled>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="Frequency">Frequency</label>
                            <input type="text" class="form-control" name="Frequency" value="<?=$Item["Frequency"]?>"
                                disabled>
                        </div>
                        <div class="form-group col-md-1">
                            <label for="Priority">Priority</label>
                            <input type="text" class="form-control" name="Priority" value="<?=$Item["Priority"]?>"
                                disabled>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="Done">Done ?</label>
                            <select class="form-control" id="Done" name="Done[<?=$i?>]" disabled>
                                <?php 
                                    if (isset($Item['DoneIndicator'])) {
                                        if ($Item['DoneIndicator']=== "-1"){
                                        echo'<option value="-1">YES</option>';
                                        }
                                        if ($Item['DoneIndicator']=== "0"){
                                        echo'<option value="0">NO</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <?php 
                                if (isset($Item['Comments'])) {
                                    $Comment = $Item['Comments'];
                                }
                            ?>
                            <label for="Comment">Comment</label>
                            <input type="text" class="form-control" name="Comment[<?=$i?>]" value="<?=$Comment?>"
                                disabled>
                        </div>
                    </div>
                    <hr>
                    <?php
                        $i++;
                    }
                    ?>
                    <!-- ------------------------------------------------------------------- -->
                    <input type="hidden" class="form-control" name="completed" id="completed" value="0">
                    <hr>
                    <div class="row my-3">
                        <div class="col-12">
                            <a class="btn btn-outline-primary btn-lg form-control" href="index.php">Home</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- form end -->
        <br><br>
        <!-- Main Content Start-->


    </div>
    <!-- Page End -->

    <!-- Start of Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- end of Bootstrap JS -->
</body>

</html>