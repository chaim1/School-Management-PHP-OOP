
<?php 
$arrayOfAdmins = $abl->ActionGetAdmin();

?>
<div class="col-12">
    
        <form class="pt-3" action="<?php echo basename($_SERVER['PHP_SELF'])?>" method="post">
            <h5><strong>Administrators</strong>
                <button class="ml-5" name="addAdministator">+</button>
            </h5>
        </form>
    <hr size="10" noshade width="100%" align="left">
    <?php foreach($arrayOfAdmins as $Admin) {?>   
        <form class="pt-3" action="<?php echo basename($_SERVER['PHP_SELF'])?>" method="post">
            <input class="d-none" type="number" name="adminId" value="<?php echo $Admin->getId()?>">
            <button class="border-0" name="showAdministrator">
                <div class="row">
                    <div class="col-4">
                        <img class="img-nav" src="images/rols/<?php echo $Admin->getImage() ?>" alt="">
                    </div>
                    <div class="col-8 ">
                        <p><?php echo $Admin->getName() ?><br>
                        0<?php echo $Admin->getPhone() ?><br>
                        <?php echo $Admin->getEmail() ?></p>
                    </div>
                </div>
            </button>
        </form>
    <?php } ?>

</div>