<?php 
include_once "../Models/DBs.php";
include_once "../Models/Student.php";
include_once "../Models/Class.php";
class UpdateClassController{
    static public function index($request){
        try {
            if(isset($request['is_update_class'])){
                $classID = $request['classID'];
                // $result= TotalController::delete_class($classID);
                $class = Classes::getOne($classID);

            }else{
                echo "khong gui duoc du lieu";
                $class = new Classes(000,"null","null");
            }
            include_once "../public/update-class.php";

        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
?>