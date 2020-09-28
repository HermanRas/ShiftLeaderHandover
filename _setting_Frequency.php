<?php
if (isset($_POST['Equipment'])){

}else{
//SQL Connect Equipment
$sql = 'SELECT
        tItemListing.Frequency
        From
        tItemListing
        Group By
        tItemListing.Frequency';
$sqlargs = array();
require_once 'config/db_query.php'; 
$Eq =  sqlQuery($sql,$sqlargs);
?>

<!-- form start-->
<div class="card">
    <div class="card-header bg-success">
        Frequency's
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="EquipmentType"> Frequency's</label>
                <select type="text" class="form-control" id="Equipment" name="Equipment" required>
                    <option value="">Please Select</option>
                    <?php
                    foreach ($Eq[0] as $EqRec) {
                        $admin = "NO";
                        if ($EqRec['EmailRecipient'] == 1){
                            $admin = "YES";
                        }
                       echo '<option value="'.$EqRec['Frequency'].'">'.$EqRec['Frequency'].'</option>';
                    }
                    ?>
                    <option value="#ADD">Add New Frequency</option>
                </select>
            </div>
        </div>
    </div>
</div>
<!-- form end -->
<?php }?>