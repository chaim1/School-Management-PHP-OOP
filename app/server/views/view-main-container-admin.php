<?php 
$arrayOfAdmins = $abl->ActionGetAdmin();
?>
<?php 
if($_SESSION['main']==""){
?>
<div align="center"><h4>All Admins</h4>
    <hr size="10" noshade width="400" align="center">
    <strong><?php echo  count($arrayOfAdmins); ?></strong>
</div> 
<?php }?>
<?php 
if($_SESSION['main']=="addA"){
    include_once 'app/server/views/view-add&Shoe-admin.php';
}elseif($_SESSION['main']=="showA"){
    include_once 'app/server/views/view-add&Shoe-admin.php';
}?>