<?php
 $course = $conC->ActionGetOneCourses($_SESSION['coursId']);

 ?>

<form action="<?php echo basename($_SERVER['PHP_SELF'])?>" method="get">

    <div class="form-group">
        <?php if($_SESSION['main'] =='showC' && $_SESSION['mainEdit'] == ''){?>
            <div class="d-flex">
                <div class="mr-auto p-2">student</div>
            <!-- <div class="float-left"></div> -->
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
            <div class="form-group">
                <input class="form-control" type="text" name="NameCourse">
            </div>
        <?php }elseif($_SESSION['main'] =='showC' &&  $_SESSION['mainEdit'] == ''){?>
            <div class="form-group">
                <input class="border-0" class="form-control" type="text" name="NameCourse" value="<?php  echo $course->getName() ?>">
             </div>
        <?php }elseif($_SESSION['main'] =='showC'   &&  $_SESSION['mainEdit'] == 'EditC'){?> 
            <div class="form-group">
                <input  class="form-control" type="text" name="NameCourse" value="<?php  echo $course->getName()?>">
             </div>
        <?php }?>
    

    
        <?php if($_SESSION['main'] =='addC' ){ ?>
            <div class="form-group">
            <textarea class="form-control" name="DescriptionCourse" id="" cols="30" rows="10" ></textarea>
            </div> 
        <?php }elseif($_SESSION['main'] =='showC' &&  $_SESSION['mainEdit'] == ''){?>
            <div class="form-group">
            <textarea class="border-0" class="form-control" name="DescriptionCourse" id="" cols="30" rows="10" ><?php echo $course->getDescription()?></textarea>
            </div> 
        <?php }elseif($_SESSION['main'] =='showC'   &&  $_SESSION['mainEdit'] == 'EditC'){?>
            <div class="form-group"> 
            <textarea class="form-control" name="DescriptionCourse" id="" cols="30" rows="10" ><?php echo $course->getDescription()?></textarea>
            </div> 
        <?php }?>
    
 

</form>
<?php if($_SESSION['main'] == 'showC'){?>
<table class="table">
    <tr>
        <th>image</th>
        <th>name</th>
    </tr>
    
    <?php foreach($course->getModelCoureStudents() as $student) {?>
        <tr>
            <td><img src="images/students/<?php   echo $student->getImage()?>" alt=""></td>
            <td><?php   echo $student->getName()?></td>
        </tr>
    <?php }?>
    
</table>
<?php }?>