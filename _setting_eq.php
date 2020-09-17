<?php
if (isset($_POST['Equipment'])){

}else{
//SQL Connect Equipment
$sql = 'select top 1000 [PDP].[dbo].[tDelaysEquipment].* from [PDP].[dbo].[tDelaysEquipment]';
$sqlargs = array();
require_once 'config/db_query.php'; 
$Eq =  sqlQuery($sql,$sqlargs);
?>

<!-- form start-->
<div class="card">
    <div class="card-header bg-success">
        Equipment
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="EquipmentType"> Equipment</label>
                <select type="text" class="form-control" id="Equipment" name="Equipment" required>
                    <option value="">Please Select</option>
                    <?php
                    foreach ($Eq[0] as $EqRec) {
                       echo '<option value="'.$EqRec['EquipmentId'].'">'.$EqRec['EquipmentDescription'].'</option>';
                    }
                    ?>
                    <option value="#ADD">Add New Equipment</option>
                </select>
            </div>
        </div>
    </div>
</div>
<!-- form end -->
<?php }?>