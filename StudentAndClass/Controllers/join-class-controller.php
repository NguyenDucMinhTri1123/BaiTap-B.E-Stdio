<?php 
include_once "../Models/DBs.php";
include_once "../Models/Student.php";
include_once "../Models/Class.php";
class JoinClassController{
    static public function index($request){
        try {
            if(isset($request['is_join_class'])){
                $studentID = $request['studentID'];
                
                $class = Student::check_class_not_join($studentID);
                
                
            }else{
                echo "khong gui duoc du lieu";
            }
            include_once "../Views/student/join-class.php";

        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
?>