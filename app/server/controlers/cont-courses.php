<?php
require_once 'app/server/controlers/controler.php';
require_once 'app/server/bl/bl-courses.php';

class coursesContruler extends IController{

    private $arreyOfErrors=[]; 
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

    public function ActionUpdateCourse($params){
        return $this->blc->update($params);
    } 

    public function ActionDeleteCourse($id,$numStudent){
                
                if($_POST['numOfStoudents']==0){
                    $_SESSION['hasErrors'] = false;
                    $_SESSION['header'] = 'schoolHome';
                    $_SESSION['main'] = '';
                    $_SESSION['mainEdit'] = '';
                    $_SESSION['coursId'] = '';
                    $_SESSION['studentId'] = '';
                    return $this->blc->delete($id);
                }else{
                    $_SESSION['hasErrors']= true;
                    $_SESSION['mainEdit'] = '';
                    array_push($this->arreyOfErrors, 'You can not delete as long as there are students in the course!');
                     include_once 'index.php';
                }
        
    } 

    public function getErrors() {
        return $this->arreyOfErrors;
    }
}

?>