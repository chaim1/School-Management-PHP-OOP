<?php
 $course = $conC->ActionGetOneCourses($_SESSION['coursId']);
 ?>

<form action="<?php echo basename($_SERVER['PHP_SELF'])?>" method="get">

    <div class="form-group">
        <?php if($_SESSION['main'] =='showC' && $_SESSION['mainEdit'] == ''){?>
            <input name="idOfCourse" style="display:none" type="number" value="<?php echo $course->getId()?>">
            <button class="btn btn-secondary btn-lg btn-block" type="submit" name="editCourse">Edit</button>
        <?php }?>
        <?php if($_SESSION['main'] =='addC' || $_SESSION['mainEdit'] =='EditC'){?>
            <?php if($_SESSION['main'] =='showC'){?>
                <input name="idOfCourse" style="display:none" type="number" value="<?php echo $course->getId()?>">
            <?php }?>
            <button class="btn btn-secondary btn-lg btn-block" type="submit" name="SaveCourse">Save</button>
        <?php }?>
    </div> 

    <div class="form-group">
        <?php if($_SESSION['mainEdit'] == 'EditC'&& $_SESSION['rank'] < 3){?>
            <input name="idOfCourse" style="display:none" type="number" value="<?php echo $course->getId()?>">
            <button class="btn btn-secondary btn-lg btn-block" type="submit" name="DeleteCourse">Delete</button>
        <?php }?>
    </div> 

    
        <?php if($_SESSION['main'] =='addC' ){ ?>
            <div class="form-group">Name
                <input class="form-control" type="text" name="NameCourse">
            </div>
        <?php }elseif($_SESSION['main'] =='showC'){?>
            <div class="form-group">Name
                <input class="form-control" type="text" name="NameCourse" value="<?php  echo $course->getName() ?>">
             </div>
        <?php }elseif($_SESSION['main'] =='showC'   &&  $_SESSION['mainEdit'] == 'EditC'){?> 
            <div class="form-group">Name
                <input class="form-control" type="text" name="NameCourse" value="<?php  echo $course->getName()?>">
             </div>
        <?php }?>
    

    
        <?php if($_SESSION['main'] =='addC' ){ ?>
        Description<div class="form-group">
            <textarea class="form-control" name="DescriptionCourse" id="" cols="30" rows="10" ></textarea>
            </div> 
        <?php }elseif($_SESSION['main'] =='showC'){?>
        Description<div class="form-group">
            <textarea class="form-control" name="DescriptionCourse" id="" cols="30" rows="10" ><?php echo $course->getDescription()?></textarea>
            </div> 
        <?php }elseif($_SESSION['main'] =='showC'   &&  $_SESSION['mainEdit'] == 'EditC'){?>
        Description<div class="form-group"> 
            <textarea class="form-control" name="DescriptionCourse" id="" cols="30" rows="10" ><?php echo $course->getDescription()?></textarea>
            </div> 
        <?php }?>
    
 

</form>
<?php if($_SESSION['main'] == 'showC'){?>
<table class="table">
    <tr>
        <th>image</th>
        <th>Name</th>
    </tr>
    <tr>
        <td><img src="" alt=""></td>
        <td>name</td>
    </tr>
</table>
<?php }?>