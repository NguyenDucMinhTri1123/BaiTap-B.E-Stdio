<?php 
include_once "../Models/DBs.php";
include_once "../Models/Student.php";
include_once "../Models/Class.php";
class UpdateClassController{
    static public function index($request){
        try {
            if(isset($request['is_update_class'])){
                $classID = $request['classID'];
                $class = Classes::getOne($classID);
                $list_subject=subject::get_list();
            }else{
                echo "khong gui duoc du lieu";
                
            }
            include_once "../Views/class/update-class.php";

        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
?>