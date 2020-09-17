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
    <link href="css/dataTables.bootstrap4.min.css" rel="stylesheet">
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
        $SelectDate = date('Y-m-d');
        
        if(isset($_GET['SelectDate'])){
            $SelectDate = $_GET['SelectDate'];
        }

        #SQL Connect
        $sql = "SELECT top 100 * 
                FROM vItemsPerShiftOutstanding
                WHERE Count_DoneIndicator > 0";
        $sqlargs = array();
        require_once 'config/db_query.php'; 
        $Delays =  sqlQuery($sql,$sqlargs);
        ?>


        <!-- Form Summary -->
        <div class="card my-3">
            <div class="card-header bg-dark text-white">
                Open HandOvers Reports
            </div>
            <div class="card-body bg-light">
                <!-- Table Start -->
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Shift Date</th>
                            <th>Shift Type</th>
                            <th>Shift Leader</th>
                            <th>Outstanding Items</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $i = 0;
                    foreach ($Delays[0] as $Rec) {
                    ?>
                        <tr>
                            <td><?php echo $Rec['ShiftCalendarDate'] ?></td>
                            <td><?php echo $Rec['ShiftType']?></td>
                            <td><?php echo $Rec['ShiftLeaderName']?></td>
                            <td><?php echo $Rec['Count_DoneIndicator']?></td>
                            <td><a class="btn btn-info"
                                    href="handover.php?DATE=<?= $Rec['ShiftCalendarDate']?>&SHIFT=<?=$Rec['ShiftType']?>">UPDATE</a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Shift Date</th>
                            <th>Shift Type</th>
                            <th>Shift Leader</th>
                            <th>Outstanding Items</th>
                            <th>Update</th>
                        </tr>
                    </tfoot>
                </table>
                <!-- Table End -->
            </div>
        </div>
        <button class="btn btn-outline-info btn-lg form-control" onclick="document.location.href='completed.php'">
            Completed ShiftLeader Handovers</button><br>
        <button class="btn btn-outline-primary btn-lg form-control"
            onclick="document.location.href='index.php'">Home</button><br><br>
        <!-- Form Summary -->
        <br><br>
        <!-- Main Content Start-->

    </div>
    <!-- Page End -->

    <!-- Start of Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>
    <!-- end of Bootstrap JS -->

    <!-- Page Level JS -->
    <script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            "scrollX": true,
            "order": [
                [0, "desc"]
            ]
        });

        $('a.toggle-vis').on('click', function(e) {
            e.preventDefault();

            // Get the column API object
            var column = table.column($(this).attr('data-column'));

            // Toggle the visibility
            column.visible(!column.visible());
        });
    });
    </script>

</body>

</html>