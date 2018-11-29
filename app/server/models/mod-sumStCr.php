<?php  
require_once 'app/server/bl/bl-students.php';
require_once 'app/server/bl/bl-courses.php';


    class ModelStAndCr 
    {
        private $stdent_id;        
        private $course_id; 
                
        
        function __construct($arr) {

            $this->stdent_id = $arr['stdent_id'];

            $this->course_id = $arr['course_id'];      
            
        }

        //get

        public function getStdent_id() {
            return $this->stdent_id;
        }

        public function getCourse_id() {
            return $this->course_id;
        }

    }
?>