<?php
include_once 'bl.php' ; 
include_once 'app/server/models/mod-courses.php' ; 
include_once 'app/server/models/mod-sumStCr.php' ; 
include_once 'app/server/models/mod-students.php';


 class BusinessLogicCourses extends BusinessLogic {

    public function get()
    {
        $q = 'SELECT * FROM `Course`';
        
        $results = $this->getDal()->select($q);
        $resultsArray = [];

        while ($row = $results->fetch()) {
            array_push($resultsArray, new ModelCourses($row));
        }

        return $resultsArray;
        
    }


    public function set($param)
    {
        $query = "INSERT INTO `Course` (`name`, `description`,  `image`) VALUES (:na, :de, :mg )";
            $params = array(
                "na" => $param->getName(),
                "de" => $param->getDescription(),
                "mg" => $param->getImage()
            );
            
            $this->getDal()->insert($query,$params);
            
    }

    public function delete($id)
    {
        $query = "DELETE FROM `Course` WHERE `id`=$id";
        $this->getDal()->delete($query);
    }

    public function update($param)
    {
        $query = "UPDATE `Course` SET  `name`=:na, `description`=:de,  `image`=:mg   WHERE `id`=:id";
        $params = array(
            "id" => $param->getId(),
            "na" => $param->getName(),
            "de" => $param->getDescription(),
            "mg" => $param->getImage()
        );
        // var_dump($params);
        // die();
        $this->getDal()->update($query,$params);
    }

    public function getOne($id)
    {
        $query = 'SELECT * FROM `Course` WHERE `id`= :id';
        
        $results = $this->getDal()->selectOne($query, [
            'id' => $id
        ]);
        $row = $results->fetch();
        $course = new ModelCourses($row);

        $bls = new BusinessLogicStudents;

        $q= 'SELECT * FROM `studentCurses` WHERE `course_id`= '.$id.'';
        
        $resultsStudentCurses = $this->getDal()->select($q);

        while ($row = $resultsStudentCurses->fetch()) {
            array_push($course->studentModelArray , $bls->getOne($row['stdent_id']));
        }
       return $course;
    }


}

 
?>
