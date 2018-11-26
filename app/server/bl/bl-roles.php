<?php
include_once 'bl.php' ; 
include_once '../models/mod-roles.php' ; 

 class BusinessLogicCourses extends BusinessLogic {

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
