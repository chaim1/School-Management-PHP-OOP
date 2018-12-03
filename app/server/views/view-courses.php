
<?php 

$arrayOfCourses = $conC->ActionGetCourses();

?>
<div class="col-6">
    
        <form class="pt-3" action="<?php echo basename($_SERVER['PHP_SELF'])?>" method="get">
            <h5><strong>Courses</strong>
                <button  class="ml-5" name="addCourse">+</button>
            </h5>
        </form>   
    
    <hr  size="10" noshade width="100%" align="left">
    <?php foreach($arrayOfCourses as $courses) {?>
        <form action="<?php echo basename($_SERVER['PHP_SELF'])?>" method="get">
        <input class="d-none" type="number" name="corseId" value="<?php echo $courses->getId()?>">
            <button class="border-0" name="showCourse">
                <div class="row">
                    <div class="col-4">
                        <img class="img-nav" src="images/courses/<?php echo $courses->getImage() ?>" alt="">
                    </div>
                    <div class="pb-2 col-8 ">
                        <div><p class=""><?php echo $courses->getName() ?></p></div>
                        <!-- <div  class="scroll"><p><?php echo $courses->getDescription() ?></p></div> -->
                    </div>
                </div>
            </button>
        </form>
    <?php } ?>

</div>