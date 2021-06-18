<?php 
include_once "../Models/DBs.php";
include_once "../Models/Student.php";
include_once "../Models/Class.php";
class JoinClassController{
    static public function index($request){
        try {
            if(isset($request['is_join_class'])){
                $studentID = $request['studentID'];
                // $result= TotalController::delete_class($classID);
                $class = Student::check_class_not_join($studentID);
                // $list_full= Student::list_class_of_student($studentID);
                if($class==null){
                    $class = new Classes(000,"null","null");
                }
            }else{
                echo "khong gui duoc du lieu";
                $class = new Classes(000,"null","null");
            }
            include_once "../public/join-class.php";

        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
?>