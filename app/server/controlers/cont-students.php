<?php
require_once 'app/server/controlers/controler.php';
require_once 'app/server/bl/bl-students.php';

class studentContruler extends IController{

    private $blS;

    function __construct(){
        $this->blS = new BusinessLogicStudents;
    }

    public function ActionGetStudent(){
        return  $this->blS->get();
        
    }
    public function ActionGetOneStudent($id){
        return  $this->blS->getOne($id);
         
    }
    public function ActionInsertStudent($params,$paramsC=null){
 
        $idStident =  $this->blS->set($params);
        if($paramsC){
           
            for($i=0; $i<sizeof($paramsC); $i++){
                $this->blS->setStudentCurses($paramsC[$i],$idStident);
            }
        }
    }
    public function ActionUpdateStudent($params,$paramsC=null){

        if($paramsC){
            $this->blS->deleteSC($params->getId());
            for($i=0; $i<sizeof($paramsC); $i++){
                $this->blS->setStudentCurses($paramsC[$i],$params->getId());
            }
            
            return $this->blS->update($params);
        }

        return $this->blS->update($params);
    }
    public function ActionDeleteStudent($id){
        $_SESSION['hasErrors'] = false;
        $_SESSION['header'] = 'schoolHome';
        $_SESSION['main'] = '';
        $_SESSION['mainEdit'] = '';
        $_SESSION['coursId'] = '';
        $_SESSION['studentId'] = '';
        return $this->blS->delete($id);
    }
}

?>