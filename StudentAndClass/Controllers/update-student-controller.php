<?php 
include_once "../Models/DBs.php";
include_once "../Models/Student.php";
include_once "../Models/Class.php";
class UpdateStudentController{
    static public function index(){
        try {
            //code...
            $student = Student::getList();
            include_once "../Views/student/list_view.php";

        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
?>