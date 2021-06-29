<?php
include_once "../Models/DBs.php";
include_once "../Models/Student.php";
include_once "../Models/Class.php";
include_once "../Models/major.php";
class TotalController
{
    //home function
    static public function index(){
        try {
            //code...
            $list_student = Student::getList();
            $list_class = Classes::getList();
            $list_major= major::get_list();
            $list_subject=subject::get_list();
            if(!isset($key_student)){
                $key_student='';
            }
            if(!isset($key_class)){
                $key_class='';
            }
            include_once "../Views/student/list_view.php";
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    //search function
    static public function indexx($request){
        try {
            if(isset($request['search_key_student'])){
                $key_student=$request['search_key_student'];
            }
            if(isset($request['search_key_class'])){
                $key_class=$request['search_key_class'];
            }
            if(!isset($key_student)||$key_student==null){
                $key_student='';
            }
            if(!isset($key_class)||$key_class==null){
                $key_class='';
            }
            //check delete student
            if(isset($request['is_delete_student'])){
                
                $studentID = $request['studentID'];
                $check_exits_class =TotalController::count_number_class_of_student($studentID);
                if($check_exits_class['COUNT(*)']>0){
                    $num=$check_exits_class['COUNT(*)'];
                    $detele_student_result="Học sinh này đang tham gia $num Lớp học <br>
                    Không thể xóa học sinh đang tham gia lớp học";
                }
                $result= TotalController::delete_student($studentID);
            }//check delete class
                //bug....
            else if(isset($request['is_delete_class'])){
                
                $classID = $request['classID'];
                $check_exits_student =TotalController::count_number_student_of_class($classID);
                if($check_exits_student['COUNT(*)']>0){
                    $num=$check_exits_student['COUNT(*)'];
                    $delete_class_result="Lớp này đang có $num học sinh <br>
                    Không thể xóa lớp học đang có học sinh";
                }
                $result= TotalController::delete_class($classID);
            }
            else if(isset($request['is_delete_major'])){
                $id=$request['majorID'];
                $check_exits_in_student=major::count_student($id);
                if($check_exits_in_student['COUNT(*)']>0){
                    $num=$check_exits_in_student['COUNT(*)'];
                    $delete_major_result="Có $num sinh viên đang theo học chuyên ngành này
                    <br> không thể xóa";
                }
                $result=major::delete($id);
            }
            else if(isset($request['is_delete_subject'])){
                $id=$request['subjectID'];
                $check_exits_in_class=subject::count_class($id);
                if($check_exits_in_class['COUNT(*)']>0){
                    $num=$check_exits_in_class['COUNT(*)'];
                    $delete_subject_result="Có $num sinh viên đang theo học chuyên ngành này
                    <br> không thể xóa";
                }
                $result=subject::delete($id);
            }
            else if(isset($request[''])){
                
            }
            $list_student=TotalController::get_list_search_student($key_student);
            $list_class=TotalController::get_list_search_class($key_class);
            $list_major= major::get_list();
            $list_subject=subject::get_list();
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
    static public function add_subject($subject){
        try {
            //code...
            $result = subject::add($subject);
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
    static public function add_major($major){
        try {
            //code...
            $result = major::add($major);
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
            $result = Classes::add_student($classID,$studentID);
            return $result;
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    static public function get_list_search_student($key){
        try {
            //code...
            $result = Student::get_list_search($key);
            return $result;
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    static public function get_list_search_class($key){
        try {
            //code...
            $result = Classes::get_list_search($key);
            return $result;
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    static public function count_number_class_of_student($id){
        try {
            //code...
            $result = Student::count_class($id);
            return $result;
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    static public function count_number_student_of_class($id){
        try {
            //code...
            $result = Classes::count_student($id);
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
                if (!$request['name_student'] || !$request['age'] || !$request['major_id']) {
                    echo "Dữ liệu không hợp lệ";
                    return;
                }else{
                    $student = new Student(null, $request['name_student'], $request['age'], $request['major_id'],"");
                    $result= TotalController::add_student($student);
                }
            }
            //check form add class
            else if(isset($request['is_add_new_class'])){
                if(!$request['name_class'] || !$request['subject_id']){
                    echo "Dữ liệu không hợp lệ";
                    return;
                }else{
                    
                    $class = new Classes(null, $request['name_class'], $request['subject_id'],"");
                    $result= TotalController::add_class($class);
                }
            }
            //check update class
            else if(isset($request['is_update_class'])){
                $classID = $request['classID'];
                $nameClass = $request['name_class'];
                $subject_id = $request['subject_id'];
                $class = new Classes($classID,$nameClass,$subject_id,"");
                $result= TotalController::update_class($class);
            }
            //check update student
            else if(isset($request['is_update_student'])){
                $studentID = $request['studentID'];
                $name = $request['name'];
                $age = $request['age'];
                $major_id= $request['major_id'];
                echo $studentID;
                $student = new Student($studentID,$name,$age,$major_id,"");
                $result= TotalController::update_student($student);
            }
            //check student join class
            else if(isset($request['is_join_class'])){
                $studentID=$request['studentID'];
                foreach($request['classes'] as $class){
                    $classID = $class;
                    $result = TotalController::join_class($classID,$studentID);
                }
            }
            // check add student to class
            else if(isset($request['is_add_student_to_class'])){
                $classID=$request['classID'];
                foreach($request['student'] as $student){
                    $studentID = $student;
                    $result = TotalController::add_student_to_class($classID,$studentID);
                }
            }
            else if(isset($request['is_add_major'])){
                $major= new major("",$request['name_major']);
                $result=TotalController::add_major($major);
            }
            else if(isset($request['is_add_subject'])){
                $subject= new subject("",$request['name_subject']);
                $result=TotalController::add_subject($subject);
            }
            

            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}