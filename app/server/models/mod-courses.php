<?php  
include_once 'model.php';
include_once 'app/server/bl/bl-courses.php';


    class ModelCourses  implements IModel
    {
        private $id;        
        private $name;     
        private $description;  
        private $image;        
        
        function __construct($arr) {

                if(!empty($arr['id'])){
                    $this->id = $arr['id'];
                } 

                $this->name = $arr['name'];

                $this->description = $arr['description']; 

                $this->image = $arr['image']; 
            
        }

        //get

        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }

        public function getDescription() {
            return $this->description;
        }

        public function getImage() {
            return $this->image;
        }

        //set


        public function setName($name) {
            $this->name =$name;
        }

        public function setDescription($description) {
            $this->description =$description;
        }

        public function setImage($image) {
            $this->image =$image;
        }


    }
?>