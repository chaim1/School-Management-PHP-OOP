<?php
if($_SESSION['main'] !=='addC'){
 $course = $conC->ActionGetOneCourses($_SESSION['coursId']);
}
 ?>

<form action="<?php echo basename($_SERVER['PHP_SELF'])?>" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <?php if($_SESSION['main'] =='showC' && $_SESSION['mainEdit'] == ''){?>
            <div class="d-flex">
                <div class="mr-auto p-2">student</div>
                <input  name="idOfCourse" style="display:none" type="number" value="<?php echo $course->getId()?>">
                <button class="p-2 btn btn-secondary" type="submit" name="editCourse">Edit</button>
            </div>
            <hr>
        <?php }?>
        <?php if($_SESSION['main'] =='addC' || $_SESSION['mainEdit'] =='EditC'){?>
            <?php if($_SESSION['main'] =='showC'){?>
                <input name="idOfCourse" style="display:none" type="number" value="<?php echo $course->getId()?>">
            <?php }?>
            <button class="mb-5 float-left btn btn-secondary" type="submit" name="SaveCourse">Save</button>
        <?php }?>
    </div> 

    <div class="form-group">
        <?php if($_SESSION['mainEdit'] == 'EditC'&& $_SESSION['rank'] < 3){?>
            <input name="idOfCourse" style="display:none" type="number" value="<?php echo $course->getId()?>">
            <button class="float-right btn btn-secondary" type="submit" name="DeleteCourse">Delete</button>
        <?php }?>
    </div> 

    
        <?php if($_SESSION['main'] =='addC' ){ ?>
        <br>
        <br>
            <h3 class="text-center">Add course</h3>
            <div class="form-group">name
                <input class="form-control" type="text" name="NameCourse">
            </div>
        <?php }elseif($_SESSION['main'] =='showC' &&  $_SESSION['mainEdit'] == ''){?>
        <div class="row">
        <div class="col-3"><img src="images/courses/<?php  echo $course->getImage() ?>" alt="" height="100" width="152"></div>
            <div class="col-9 form-group"><strong>Course:</strong>
                <input class="border-0" class="form-control" type="text" name="NameCourse" value="<?php  echo $course->getName() ?>">
             </div>
             
        <?php }elseif($_SESSION['main'] =='showC'   &&  $_SESSION['mainEdit'] == 'EditC'){?> 
            <div class="form-group">
                <input  class="form-control" type="text" name="NameCourse" value="<?php  echo $course->getName()?>">
             </div>
        <?php }?>
    

    
        <?php if($_SESSION['main'] =='addC' ){ ?>
            <div class="form-group">Description
                <textarea class="form-control" name="DescriptionCourse" id="" cols="30" rows="10" ></textarea>
            </div> 
            <div>
                <input name="AddimageCourse" type="file" >
            </div>

        <?php }elseif($_SESSION['main'] =='showC' &&  $_SESSION['mainEdit'] == ''){?>
            <div class="col-9 offset-md-3  form-group">
                <textarea class="border-0" class="form-control" name="DescriptionCourse" id="" cols="30" rows="10" ><?php echo $course->getDescription()?></textarea>
            </div> 
            </div>
        <?php }elseif($_SESSION['main'] =='showC'   &&  $_SESSION['mainEdit'] == 'EditC'){?>
            <div class="form-group"> 
            <textarea class="form-control" name="DescriptionCourse" id="" cols="30" rows="10" ><?php echo $course->getDescription()?></textarea>
            </div> 
            <div class="row">
                <div class="col-3">
                    <img src="images/courses/<?php  echo $course->getImage() ?>" alt="" height="100" width="152">
                </div>
                <div class="col-5">
                    <input name="imageCourse" type="file" >
                </div>
                <br>
                <div class="pt-4 col-12">
                    <?php $numStudent = count($course->getModelCoureStudents());
                    echo 'Total '.$numStudent.' students taking this coutse';
                    ?>
                </div>
            </div>
        <?php }?>
    
 

</form>
<?php if($_SESSION['main'] == 'showC'&&  $_SESSION['mainEdit'] == ''){?>
<table class="table">
    <tr>
        <th>image</th>
        <th>name</th>
    </tr>
    
    <?php foreach($course->getModelCoureStudents() as $student) {?>
        <tr>
            <td><img src="images/students/<?php   echo $student->getImage()?>" alt="" height="100" width="152"></td>
            <td><?php   echo $student->getName()?></td>
        </tr>
    <?php }?>
    
</table>
<?php }?>