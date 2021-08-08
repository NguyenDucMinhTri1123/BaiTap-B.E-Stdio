<?php 
    class StudentController{
        static public function index(){
            try {
                include_once "../Views/student/index.php";
            } catch (\Throwable $th) {
                echo $th->getMessage();
            }
        }
    }

?>