<?php
if (isset($_POST['Equipment'])){

}else{
//SQL Connect Equipment
$sql = 'SELECT tItemListing.Priority
        From
        tItemListing
        Group By
        tItemListing.Priority';
$sqlargs = array();
require_once 'config/db_query.php'; 
$Eq =  sqlQuery($sql,$sqlargs);
?>

<!-- form start-->
<div class="card">
    <div class="card-header bg-success">
        Priority's
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="EquipmentType"> Priority's</label>
                <select type="text" class="form-control" id="Equipment" name="Equipment" required>
                    <option value="">Please Select</option>
                    <?php
                    foreach ($Eq[0] as $EqRec) {
                        $admin = "NO";
                        if ($EqRec['EmailRecipient'] == 1){
                            $admin = "YES";
                        }
                       echo '<option value="'.$EqRec['Priority'].'">'.$EqRec['Priority'].'</option>';
                    }
                    ?>
                    <option value="#ADD">Add New Priority</option>
                </select>
            </div>
        </div>
    </div>
</div>
<!-- form end -->
<?php }?>