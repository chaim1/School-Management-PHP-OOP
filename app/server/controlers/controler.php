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
            move_uploaded_file($fileTmpName,$fileDastntion);
            return $fileNewName;
        }
    }
?>