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
    public function ActionInsertStudent($params){
        return $this->blS->set($params);
    }
    public function ActionUpdateStudent($params){
        return $this->blS->update($params);
    }
}

?>