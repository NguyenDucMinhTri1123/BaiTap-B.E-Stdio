<?php 
include_once "../Models/DBs.php";
include_once "../Models/Student.php";
include_once "../Models/Class.php";
class ClassDetailController{
    static public function index($request){
        try {
            if(isset($request['is_view_class_detail'])){
                $classID = $request['classID'];
                $classes = Classes::getOne($classID);
                $students = Classes::list_student_of_class($classID);
                
            }else{
                echo "khong gui duoc du lieu";
                
            }
            include_once "../Views/class/class_detail.php";

        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
?>