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
        $ShiftCalendarDate = '';
        $ShiftType = '';
        $ItemNumber = '';
        $ShiftLeaderName = '';
        $DoneIndicator =  '';
        $Comments = '';
    }
########################################################################
## SAVE OR UPDATE
########################################################################
if (isset($_POST['Save'])){
    ########################################################################
    ## SAVE NEW
    ########################################################################
    if(isset($_POST['Save'])){
        $ShiftCalendarDate = $_POST["StartDate"];
        $ShiftType = $_POST["ShiftType"];
        $ShiftLeaderName = $_POST["ShiftLeaderName"];
        $ItemNumbers = $_POST["ItemNumber"];
        $DoneIndicators = $_POST["Done"];
        $Comments = $_POST["Comment"];

        for ($i=0; $i < count($ItemNumbers); $i++) { 
                $ItemNumber = $ItemNumbers[$i];
                $DoneIndicator = $DoneIndicators[$i];
                $Comment = $Comments[$i];
                $sql = "INSERT INTO tHandoverResults 
                        (ShiftCalendarDate, ShiftType ,ItemNumber ,ShiftLeaderName ,DoneIndicator ,Comments ,LogonUser)
                        VALUES('$ShiftCalendarDate', '$ShiftType' ,'$ItemNumber' ,'$ShiftLeaderName' ,'$DoneIndicator' ,'$Comment' ,'$LogonUser');";
        $sqlargs = array();
        require_once 'config/db_query.php';
        $DBIns =  sqlQuery($sql,$sqlargs);
        }

        echo "<script> document.location.href='index.php' </script>";
        die;
    }
    ########################################################################
    ## UPDATE
    ########################################################################
    if(isset($_POST['Save']) && isset($_GET['DATE']) && isset($_GET['SHIFT'])){
        echo "Save & Close<br>";
        var_dump($_POST);
        die;
    }
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
        <?php
        
        //Item Type
        $sql = "SELECT [SecSLH].[dbo].[tItemListing].* from [SecSLH].[dbo].[tItemListing]";
        $sqlargs = array();
        require_once 'config/db_query.php'; 
        $Items =  sqlQuery($sql,$sqlargs);
        
?>

        <!-- form start-->
        <div class="card">
            <div class="card-header bg-success">
                New Handover
            </div>
            <div class="card-body">
                <form method="POST" id="frmMain">

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="StartDate">Shift Date</label>
                            <input type="date" class="form-control" id="StartDate" name="StartDate" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ShiftType">Shift Type</label>
                            <select type="text" class="form-control" id="ShiftType" name="ShiftType" required>
                                <option value="">Please Select</option>
                                <option value="DAY">Day</option>
                                <option value="AFTERNOON">Afternoon</option>
                                <option value="NIGHT">Night</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Equipment">ShiftLeader Name</label>
                            <input class="form-control" type="text" name="ShiftLeaderName" placeholder="your Name..."
                                required>
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
                    foreach ($Items[0] as $Item) {
                    ?>
                    <div class="form-row">
                        <div class="form-group col-md-1">
                            <label for="ItemNumber">Number</label>
                            <input type="text" class="form-control" name="ItemNumber[<?=$i?>]"
                                value="<?=$Item["ItemNumber"]?>" readonly>
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
                            <select class="form-control" id="Done" name="Done[<?=$i?>]">
                                <option value="">Please Select</option>
                                <option value="-1">YES</option>
                                <option value="0">NO</option>
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="Comment">Comment</label>
                            <input type="text" class="form-control" name="Comment[<?=$i?>]" value="">
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
                        <div class="col-4">
                            <button class="btn btn-outline-danger btn-lg form-control"
                                onclick="document.location.href='index.php'">Cancel</button>
                        </div>
                        <div class="col-4">
                            <button class="btn btn-outline-info btn-lg form-control" id="Save" name="Save">Save</button>
                        </div>
                        <div class="col-4">
                            <a class="btn btn-outline-success btn-lg form-control"
                                onclick="checkCompleted()">Finalize</a>
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

    <!-- Page Specific JS -->
    <script>
    function checkCompleted() {
        let requiredFields = document.querySelectorAll("#Done");
        requiredFields.forEach(item => {
            if (item.value === '') {
                item.classList.add("is-invalid");
            } else {
                item.classList.remove("is-invalid");
            }
        });
        let faults = document.querySelectorAll(".is-invalid");
        if (faults.length === 0) {
            document.getElementById("completed").value = 1;
            document.getElementById("Save").click();
        } else {
            faults[0].focus();
        }
    }

    function setYes() {
        let requiredFields = document.querySelectorAll("#Done");
        requiredFields.forEach(item => {
            item.value = "-1";
        })
    };
    </script>
</body>

</html>