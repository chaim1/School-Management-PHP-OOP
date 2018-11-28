<?php
require_once 'app/server/bl/bl-students.php';

class studentContruler{

    public function ActionGetStudent(){
        $bls =  new  BusinessLogicStudents;
        $students = $bls->get();
        return $students;
    }
    public function ActionGetOneStudent($id){
        $blc =  new  BusinessLogicStudents;
        $student = $blc->getOne($id);
        return $student;
    }
}

?>