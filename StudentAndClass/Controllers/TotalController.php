<?php
include_once "../Models/DBs.php";
include_once "../Models/Student.php";
include_once "../Models/Class.php";
class TotalController
{

    static public function index(){
        try {
            //code...
            $list_student = Student::getList();
            $list_class = Classes::getList();
            include_once "../Views/student/list_view.php";
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    static public function add_student($student){
        try {
            //code...
            $result = Student::add($student);
            return $result;
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    static public function delete_student($studentID){
        try {
            //code...
            $result = Student::delete($studentID);
            return $result;
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    static public function update_student($student){
        try {
            //code...
            $result = Student::update($student);
            return $result;
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    static public function add_class($class){
        try {
            //code...
            $result = Classes::add($class);
            return $result;
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    static public function delete_class($classID){
        try {
            //code...
            $result = Classes::delete($classID);
            return $result;
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    static public function update_class($class){
        try {
            //code...
            $result = Classes::update($class);
            return $result;
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    static public function join_class($classID,$studentID){
        try {
            //code...
            $result = Student::join_class($classID,$studentID);
            return $result;
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    static public function add_student_to_class($classID,$studentID){
        try {
            //code...
            $result = Classes::add_class($classID,$studentID);
            return $result;
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    static public function check($request)
    {
        try {
            //check form add student
            if(isset($request['is_add_new_student'])){
                if (!$request['name_student'] || !$request['age'] || !$request['major']) {
                    echo "Dữ liệu không hợp lệ";
                    return;
                }else{
                    $student = new Student(null, $request['name_student'], $request['age'], $request['major']);
                    $result= TotalController::add_student($student);
                }
            }
            //check form add class
            if(isset($request['is_add_new_class'])){
                if(!$request['name_class'] || !$request['subject']){
                    echo "Dữ liệu không hợp lệ";
                    return;
                }else{
                    $class = new Classes(null, $request['name_class'], $request['subject']);
                    $result= TotalController::add_class($class);
                }
            }
            //check delete student
            if(isset($request['is_delete_student'])){
                
                    $studentID = $request['studentID'];
                    $result= TotalController::delete_student($studentID);
            }
            //check delete class
            if(isset($request['is_delete_class'])){
                
                $classID = $request['classID'];
                $result= TotalController::delete_class($classID);
            }
            //check update class
            if(isset($request['is_update_class'])){
                $classID = $request['classID'];
                $nameClass = $request['name_class'];
                $subject = $request['subject'];
                $class = new Classes($classID,$nameClass,$subject);
                $result= TotalController::update_class($class);
            }
            //check update student
            if(isset($request['is_update_student'])){
                $studentID = $request['studentID'];
                $name = $request['name'];
                $age = $request['age'];
                $major= $request['major'];
                echo $studentID;
                $student = new Student($studentID,$name,$age,$major);
                $result= TotalController::update_student($student);
            }
            if(isset($request['is_join_class'])){
                $studentID=$request['studentID'];
                foreach($request['classes'] as $class){
                    $classID = $class;
                    $result = TotalController::join_class($classID,$studentID);
                }
            }
            if(isset($request['is_add_student_to_class'])){
                $classID=$request['classID'];
                foreach($request['student'] as $student){
                    $studentID = $student;
                    $result = TotalController::add_student_to_class($classID,$studentID);
                }
            }
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}