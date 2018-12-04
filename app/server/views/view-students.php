<?php 
$arrayOfStudents = $conS->ActionGetStudent();

?>
<div class="col-6">
    <form class="pt-3" action="<?php echo basename($_SERVER['PHP_SELF'])?>" method="get">
            <h5><strong>Students</strong>
                <button class="ml-5" name="addStudent">+</button>
            </h5>
            <hr  size="10" noshade width="100%" align="left">
        </form>
    
    <?php foreach($arrayOfStudents as $student) {?>
        <form action="<?php echo basename($_SERVER['PHP_SELF'])?>" method="get">
        <input class="d-none" type="number" name="studentId" value="<?php echo $student->getId()?>">
            <button class="border-0" name="showStudent">
                <div class="row">
                    <div class="col-4">
                        <img class="img-nav" src="images/students/<?php echo $student->getImage() ?>" alt="">
                    </div>
                    <div class="col-8 ">
                        <p><?php echo $student->getName() ?><br>
                        0<?php echo $student->getPhone() ?></p>
                    </div>
                </div>
            </button>
        </form>
    <?php } ?>

</div>