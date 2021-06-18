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
                if($class==''){
                    $class = new Classes(000,"null","null");
                }
            }else{
                echo "khong gui duoc du lieu";
                $class = new Classes(000,"null","null");
            }
            include_once "../public/student-detail.php";

        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
?>