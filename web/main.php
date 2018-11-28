

<?php if($_SESSION['header']== 'schoolHome'){?>

    <div class="aside col border rounded m-3">
        <?php include_once 'app/server/views/view-main-container-sales.php'; ?>
    </div>

<?php }elseif($_SESSION['header']== 'AdministratorHome'){?> 

    <div class="aside col border rounded m-3">
        <?php include_once 'app/server/views/view-main-container-admin.php'; ?>
    </div>

<?php }?>