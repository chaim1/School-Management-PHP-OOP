<?php
include_once 'bl.php' ; 
include_once 'app/server/models/mod-roles.php' ; 

 class BusinessLogicRoles extends BusinessLogic {

    public function get()
    {
        $q = 'SELECT * FROM `roles`';
        
        $results = $this->getDal()->select($q);
        $resultsArray = [];

        while ($row = $results->fetch()) {
            array_push($resultsArray, new ModelRoles($row));
        }

        return $resultsArray;
        
    }

    public function getOne($id)
    {
        $query = 'SELECT * FROM `roles` WHERE `role_id`= :id';
        
        $results = $this->getDal()->selectOne($query, [
            'id' => $id
        ]);
        $row = $results->fetch();

        return new ModelRoles($row);
    }

    public function set($param){}
    public function delete($id){}
    public function update($id){}

    // public function set($param)
    // {
    //     $query = "INSERT INTO `roles` (`role_description`) VALUES (:rd)";
    //         $params = array(
    //             "rd" => $param->getDescription()
    //         );
            
    //         $this->getDal()->insert($query,$params);
            
    // }

}

 
?>
