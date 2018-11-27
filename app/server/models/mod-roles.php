<?php  
require_once 'app/server/bl/bl-roles.php';

    class ModelRoles 
    {
        private $role_id;        
        private $role_description;     
                
        
        function __construct($arr) {

            $this->role_id = $arr['role_id'];

            $this->role_description = $arr['role_description'];      
            
        }

        //get

        public function getRoleId() {
            return $this->role_id;
        }

        public function getDescription() {
            return $this->role_description;
        }

        // //set

        // public function setRole_description($role_description) {
        //     $this->role_description =$role_description;
        // }

    }
?>