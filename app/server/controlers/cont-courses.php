<?php
require_once 'app/server/bl/bl-courses.php';

class coursesContruler{

    public function ActionGetCourses(){
        $blc =  new  BusinessLogicCourses;
        $courses = $blc->get();
        return $courses;
    }
}

?>