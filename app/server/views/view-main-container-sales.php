
<?php 
if($_SESSION['main']==""){
?>
<div align="center"><h4>Number Courses</h4>
<hr size="10" noshade width="400" align="center">
<strong><?php echo  count($arrayOfCourses); ?></strong>
</div> 
<br>
<br>
<div align="center"><h4>Number Students</h4>
<hr size="10" noshade width="400" align="center">
<strong><?php echo  count($arrayOfStudents);?></strong>
</div>
<?php }elseif($_SESSION['main']=="addC"){
    include_once 'app/server/views/view-add-course.php';
 }elseif($_SESSION['main']=="addS"){
   //  include_once 'app/server/views/view-add-course.php';
 }elseif($_SESSION['main']=="showC"){
    include_once 'app/server/views/view-add-course.php';
 }elseif($_SESSION['main']=="showS"){
   //  include_once 'app/server/views/view-add-course.php';
 }?>