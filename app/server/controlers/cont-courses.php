<?php
require_once 'app/server/controlers/controler.php';
require_once 'app/server/bl/bl-courses.php';

class coursesContruler extends IController{

    private $blc;

    function __construct(){
        $this->blc = new BusinessLogicCourses;
    }

    public function ActionGetCourses(){
        $courses = $this->blc->get();
        return $courses;
    }

    public function ActionGetOneCourses($id){
        $courses = $this->blc->getOne($id);
        return $courses;
    }

    public function ActionInsertCourses($params){
        return $this->blc->set($params);
    }
}

?>