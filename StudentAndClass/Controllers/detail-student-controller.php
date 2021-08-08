<?php 
include_once "../Models/DBs.php";
include_once "../Models/Student.php";
include_once "../Models/Class.php";
class StudentDetailController{
    static public function index($request){
        try {
            if(isset($request['is_view_detail_student'])){
                $studentID = $request['studentID'];
                // $result= TotalController::delete_class($classID);
                $student = Student::getOne($studentID);
                $class = Student::list_class_of_student($studentID);
                // $list_full= Student::list_class_of_student($studentID);
                
            }else{
                echo "khong gui duoc du lieu";
                
            }
            include_once "../Views/student/student-detail.php";

        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
?>