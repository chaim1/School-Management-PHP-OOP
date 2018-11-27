
<?php 
$conC = new coursesContruler;
$arrayOfCourses = $conC->ActionGetCourses();

?>
<div class="col-6">
    
        <form action="<?php echo basename($_SERVER['PHP_SELF'])?>" method="get">
            <h5><strong>Courses</strong>
                <button class="" name="addCourse">+</button>
            </h5>
        </form>   
    
    <hr>
    <?php foreach($arrayOfCourses as $courses) {?>
        <form action="<?php echo basename($_SERVER['PHP_SELF'])?>" method="get">
        <input class="d-none" type="number" name="corseId" value="<?php echo $courses->getId()?>">
            <button class="border-0" name="showCourse">
                <div class="row">
                    <div class="col-4">
                        <img class="img-nav" src="images/rols/<?php echo $courses->getImage() ?>" alt="">
                    </div>
                    <div class="col-8 ">
                        <p><?php echo $courses->getName() ?><br>
                        <?php echo $courses->getDescription() ?></p>
                    </div>
                </div>
            </button>
        </form>
    <?php } ?>

</div>