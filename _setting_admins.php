<?php
if (isset($_POST['Equipment'])){

}else{
//SQL Connect Equipment
$sql = 'select * from [SecSLH].[dbo].[tEmailRecipient]';
$sqlargs = array();
require_once 'config/db_query.php'; 
$Eq =  sqlQuery($sql,$sqlargs);
?>

<!-- form start-->
<div class="card">
    <div class="card-header bg-success">
        Emails & Admins
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="EquipmentType"> Emails & Admins</label>
                <select type="text" class="form-control" id="Equipment" name="Equipment" required>
                    <option value="">Please Select</option>
                    <?php
                    foreach ($Eq[0] as $EqRec) {
                        $admin = "NO";
                        if ($EqRec['EmailRecipient'] == 1){
                            $admin = "YES";
                        }
                       echo '<option value="'.$EqRec['EmailRecipient'].'">'.$EqRec['EmailRecipient']." ADMIN[ $admin ]".'</option>';
                    }
                    ?>
                    <option value="#ADD">Add New Email or Admin</option>
                </select>
            </div>
        </div>
    </div>
</div>
<!-- form end -->
<?php }?>