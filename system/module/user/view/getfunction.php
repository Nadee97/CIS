<?php
include '../../../common/dbconnection.php';

$role_id=$_GET['q'];

$sql="SELECT * FROM module m, module_role mr WHERE m.module_id=mr.module_id AND mr.role_id='$role_id'";
$result=$con->query($sql);

?>

<div class="row">
    
    <?php while($row=$result->fetch_assoc()){ 
        $module_id=$row['module_id'];
        $sqlm="SELECT * FROM module WHERE module_id='$module_id'";
        $resultm=$con->query($sqlm);
        $rowm=$resultm->fetch_assoc();
        ?> 
    <div class="col-md-3" style="min-height: 150px">
        <h4>
        <?php echo $rowm['module_name']; ?>
        </h4>
        <?php
        $sqlf="SELECT * FROM function WHERE module_id='$module_id'";
        $resultf=$con->query($sqlf);
        while($rowf=$resultf->fetch_assoc()){  ?>
        
        <input type="checkbox" name="fun[]" 
               value="<?php echo $rowf['fun_id']; ?>" checked />           
                <?php echo $rowf['fun_name']."<br />"; 
        }
        
        ?>
        
    </div>
    <?php } ?>
    
</div>