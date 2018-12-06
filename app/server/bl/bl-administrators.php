<?php
include_once 'bl.php' ; 
include_once 'app/server/models/mod-administrator.php' ; 

 class BusinessLogicAdministrator extends BusinessLogic {

    public function get()
    {
        $q = 'SELECT * FROM `Administrator`';
        
        $results = $this->getDal()->select($q);
        $resultsArray = [];

        while ($row = $results->fetch()) {
            array_push($resultsArray, new ModelAdministrator($row));
        }

        return $resultsArray;
        
    }

    public function set($param)
    {
        $query = "INSERT INTO `Administrator` ( `role_id`, `name`, `phone`, `email`, `pwd`, `Image`,`Username`) VALUES (:ri, :na, :pn, :em, :pw, :mg, :un )";
            $params = array(
                "ri" => $param->getRole_id(),
                "na" => $param->getName(),
                "pn" => $param->getPhone(),
                "em" => $param->getEmail(),
                "pw" => $param->getPwd(),
                "mg" => $param->getImage(),
                "un" => $param->getUsername()

            );
            
            $this->getDal()->insert($query,$params);
            
    }

    public function delete($id)
    {
        $query = "DELETE FROM `Administrator` WHERE `id`=$id";
        $this->getDal()->delete($query);
    }

    public function update($param)
    {
        $query = "UPDATE `Administrator` SET `role_id`=:ri, `name`=:na, `phone`=:pn, `email`=:em, `pwd`=:pw   WHERE `id`=:id";
        $params = array(
            "id" => $param->getId(),
            "ri" => $param->getRole_id(),
            "na" => $param->getName(),
            "pn" => $param->getPhone(),
            "em" => $param->getEmail(),
            "pw" => $param->getPwd()
        );
        $this->getDal()->update($query,$params);
    }

    public function getOne($id)
    {
        $query = 'SELECT * FROM `Administrator` WHERE `id`= :id';
        
        $results = $this->getDal()->selectOne($query, [
            'id' => $id
        ]);
        $row = $results->fetch();

        return new ModelAdministrator($row);
    }

    public function getOneByUserName($un)
    {
        $query = 'SELECT * FROM `Administrator` WHERE 	`name` = :un';
        
        $results = $this->getDal()->selectOne($query, [
            'un' => $un
        ]);
        $row = $results->fetch();
        return new ModelAdministrator($row);
    }

}

 
?>
