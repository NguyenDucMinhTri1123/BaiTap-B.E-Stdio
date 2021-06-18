<?php 
include_once "../Models/DBs.php";
include_once "../Models/Student.php";
include_once "../Models/Class.php";
class AddStudentToClassController{
    static public function index($request){
        try {
            if(isset($request['is_add_student'])){
                $classID = $request['classID'];
                // $result= TotalController::delete_class($classID);
                $students = Classes::check_student_not_join($classID);
                // $list_full= Student::list_class_of_student($studentID);
            }else{
                echo "khong gui duoc du lieu";
                $class = new Classes(000,"null","null");
            }
            include_once "../public/add-student-to-class.php";

        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
?>