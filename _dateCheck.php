<?php
    $DATE = $_GET['DATE'];
    $SHIFT = $_GET['SHIFT'];
    $sql = "SELECT top 10 count(ItemNumber)as NumCount from [tHandoverResults]
            where ShiftCalendarDate = '$DATE'
            and ShiftType = '$SHIFT'";
    $sqlargs = array();
    require_once 'config/db_query.php'; 
    $Created =  sqlQuery($sql,$sqlargs);
    echo JSON_ENCODE(array('Count'=>$Created[0][0]['NumCount']));
?>