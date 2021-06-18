<?php 
include_once "../Models/DBs.php";
include_once "../Models/Student.php";
include_once "../Models/Class.php";
class ClassDetailController{
    static public function index($request){
        try {
            if(isset($request['is_view_class_detail'])){
                $classID = $request['classID'];
                $class = Classes::getOne($classID);
                $students = Classes::list_student_of_class($classID);
                if($students==''){
                    $students = new Student(000,"null","null","null");
                }
            }else{
                echo "khong gui duoc du lieu";
                $class = new Classes(000,"null","null");
            }
            include_once "../public/class_detail.php";

        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
?>