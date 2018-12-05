<?php
    abstract class IController {

//$this function accept  file and position and she put the tile
        public function ActionInsertImage($position,$tempFile){
            $fileName = $tempFile[key($tempFile)]['name'];

            $fileExt = explode('.',$fileName);

            $fileActualExt = strtolower(end($fileExt));

            $fileTmpName = $tempFile[key($tempFile)]['tmp_name'];

            $fileNewName = uniqid('', true).".". $fileActualExt;

            $fileDastntion = $position.$fileNewName;

            $fileSise = $tempFile[key($tempFile)]['size'];

            $fileEror = $tempFile[key($tempFile)]['error'];
        
            $fileType = $tempFile[key($tempFile)]['type'];
        
            $allowed = array('jpg','jpeg','png');
        
            if(in_array($fileActualExt,$allowed)){
        
                if($fileEror===0){
                
                    if($fileSise<2000000){
                        move_uploaded_file($fileTmpName,$fileDastntion);
                        return $fileNewName;
                    }else{}
                }else{}
            }else{}
        
            
        }
    }
?>