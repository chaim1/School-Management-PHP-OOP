<?php
include_once 'bl.php' ; 
include_once 'app/server/models/mod-students.php' ; 

 class BusinessLogicStudents extends BusinessLogic {

    public function get()
    {
        $q = 'SELECT * FROM `Students`';
        
        $results = $this->getDal()->select($q);
        $resultsArray = [];

        while ($row = $results->fetch()) {
            array_push($resultsArray, new ModelStudents($row));
        }

        return $resultsArray;
        
    }


    public function set($param)
    {
        $query = "INSERT INTO `Students` (`name`, `phone`, `email`, `image`) VALUES (:na, :pn, :em, :mg )";
            $params = array(
                "na" => $param->getName(),
                "pn" => $param->getPhone(),
                "em" => $param->getEmail(),
                "mg" => $param->getImage()
            );
            
            return $idStudent = $this->getDal()->insert($query,$params);
            
    }
    public function deleteSC($id)
    {
        $query = "DELETE FROM `studentCurses` WHERE `stdent_id`=$id";
        $this->getDal()->delete($query);

    }
    public function delete($id)
    {
        $this->deleteSC($id);

        $query = "DELETE FROM `Students` WHERE `id`=$id";
        $this->getDal()->delete($query);
    }

    public function update($param)
    {
        $query = "UPDATE `Students` SET  `name`=:na, `phone`=:pn, `email`=:em, `image`=:mg   WHERE `id`=:id";
        $params = array(
            "id" => $param->getId(),
            "na" => $param->getName(),
            "pn" => $param->getPhone(),
            "em" => $param->getEmail(),
            "mg" => $param->getImage()
        );
        $this->getDal()->update($query,$params);
    }

    public function getOne($id)
    {
        $query = 'SELECT * FROM `Students` WHERE `id`= :id';
        
        $results = $this->getDal()->selectOne($query, [
            'id' => $id
        ]);
        $row = $results->fetch();

        $student =  new ModelStudents($row);

        $query= 'SELECT * FROM `studentCurses` WHERE `stdent_id`= '.$id.'';

        $results = $this->getDal()->select($query);
        while ($row = $results->fetch()) {
            array_push($student->modelCourses , $row);
        }
       return $student;
    }

    public function setStudentCurses($idc,$idS)
    {
        $query = "INSERT INTO `studentCurses` (`stdent_id`,`course_id`) VALUES (:Si, :Ci)";
            $params = array(
                "Si" => $idS,
                "Ci" => $idc
            );
            
            $this->getDal()->insert($query,$params);
            
    }
    public function deleteCS($idC,$idS)
    {
        $query = "DELETE FROM `studentCurses` WHERE `stdent_id`=$idS AND `course_id`=$idC";
        
        $this->getDal()->delete($query);

    }

}

 
?>
