<?php 
include_once "../Models/DBs.php";
include_once "../Models/Student.php";
include_once "../Models/Class.php";
class UpdateStudentController{
    static public function index($request){
        try {
            if(isset($request['is_update_student'])){
                $studentID = $request['studentID'];
                
                $student = Student::getOne($studentID);
            }else{
                echo "khong gui duoc du lieu";
                $student = new Student(000,"null","null","null");
            }
            include_once "../public/update-student.php";

        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
?>