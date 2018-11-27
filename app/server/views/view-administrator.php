
<?php 
$arrayOfAdmins = $abl->ActionGetAdmin();

?>
<div class="col-6">
    
        <form class="pt-3" action="<?php echo basename($_SERVER['PHP_SELF'])?>" method="get">
            <h5><strong>Administrators</strong>
                <button class="" name="addCourse">+</button>
            </h5>
        </form>   
    
    <hr size="10" noshade width="170" align="left">
    <?php foreach($arrayOfAdmins as $Admin) {?>
        <form action="<?php echo basename($_SERVER['PHP_SELF'])?>" method="get">
        <input class="d-none" type="number" name="corseId" value="<?php echo $Admin->getId()?>">
            <button class="border-0" name="showCourse">
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