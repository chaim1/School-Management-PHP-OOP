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
            
            $this->getDal()->insert($query,$params);
            
    }

    public function delete($id)
    {
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

        return new ModelStudents($row);
    }

}

 
?>
