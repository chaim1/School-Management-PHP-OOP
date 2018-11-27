<?php if($_SESSION['header']== 'schoolHome'){?>

    <aside class="col-5">
        <div class="aside row">
            
                <?php include_once 'app/server/views/view-courses.php'; ?>
            
                <?php include_once 'app/server/views/view-students.php'; ?>
        </div>

    </aside>
<?php }elseif($_SESSION['header']== 'AdministratorHome'){?>

    <aside class="col-4">

        <div class="aside row">
            <?php
             include_once 'app/server/views/view-administrator.php';
            ?>
        </div>

    </aside>
<?php }?>
