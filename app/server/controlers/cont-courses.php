<?php
require_once 'app/server/bl/bl-courses.php';

class coursesContruler{

    public function ActionGetCourses(){
        $blc =  new  BusinessLogicCourses;
        $courses = $blc->get();
        return $courses;
    }

    public function ActionGetOneCourses($id){
        $blc =  new  BusinessLogicCourses;
        $courses = $blc->getOne($id);
        return $courses;
    }

}

?>