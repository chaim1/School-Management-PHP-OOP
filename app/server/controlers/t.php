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
    public function ActionUpdateStudent($params,$paramsC=null){
        var_dump($params,$paramsC);
        die();
        if($paramsC!==null){
            if(sizeof($_SESSION['helperPrimery'])>0){
            for($i=0; $i<sizeof($_SESSION['helperPrimery']); $i++){
                $valid = false;
                for($j=0; $j<sizeof($paramsC); $j++){
                        if($_SESSION['helperPrimery'][$i]==$paramsC[$j]){
                            $valid = true;
                        }
                    }
                    if(!$valid){
                        return $this->blS->deleteCS($_SESSION['helperPrimery'][$i],$params->getId());
                }
                return $this->blS->update($params);
            }

            for($i=0; $i<sizeof($paramsC); $i++){
                $valid = false;
                for($j=0; $j<sizeof($_SESSION['helperPrimery']); $j++){
                        if($paramsC[$i]==$_SESSION['helperPrimery'][$j]){
                            $valid = true;
                        }
                    }
                    if(!$valid){
                        return $this->blS->setStudentCurses($paramsC[$i],$params->getId());
                }
            }
            $_SESSION['helperPrimery']=[];
        }else{
            for($i=0; $i<sizeof($paramsC); $i++){
                return $this->blS->setStudentCurses($paramsC[$i],$params->getId());

            }
            return $this->blS->update($params);
        }

        }elseif($paramsC==null&&!empty($_SESSION['helperPrimery'])){
            return $this->blS->deleteSC($params->getId());
            return $this->blS->update($params);
            $_SESSION['helperPrimery']=[];
        }
        return $this->blS->update($params);
        for($i = 0; $i< sizeof($paramsC); $i++){
            $this->blS->setStudentCurses($paramsC[$i],$params->getId());
        }
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