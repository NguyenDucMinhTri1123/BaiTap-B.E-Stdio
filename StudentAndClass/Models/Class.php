<?php
include_once "Student.php";
include_once "DBs.php";
class Classes
{
    //properties
    public $id;
    public $name;
    public $subject_id;
    public $subject_name;
    //method
    function __construct($id, $name, $subject_id,$subject_name)
    {   
        $this->id = $id;
        $this->name = $name;
        $this->subject_id = $subject_id;
        $this->subject_name=$subject_name;
    }
    static function add_student($classID,$studentID){
        $conn = DB::connect();
        $sql="INSERT INTO `class_student` (`studentID`, `classID`)
                VALUE ('$studentID','$classID') ";
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return null;
        }
        $conn->close();
        return $result;
    }
    static function list_student_of_class($classID){
        $conn = DB::connect();
        $sql="SELECT students.id,students.name,students.age,students.major_id 
                FROM students 
                JOIN class_student 
                ON class_student.classID='$classID' 
                    AND students.id=class_student.studentID";
        $result = $conn->query($sql);
        $ls=[];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $major= major::get_one($row['major_id']);
                $ls[]= new Student($row['id'], $row['name'], $row['age'],$row['major_id'],$major->name);
            }
        }
        $conn->close();
        return $ls;
    }
    static function check_student_not_join($classID){
        $conn = DB::connect();
        $sql="SELECT students.id, students.name,students.age,students.major_id 
                FROM students 
                WHERE id NOT IN 
                (SELECT class_student.studentID 
                FROM class_student 
                WHERE class_student.classID='$classID')";
        $result = $conn->query($sql);
        $ls=[];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $major= major::get_one($row['major_id']);
                $ls[]= new Student($row['id'], $row['name'], $row['age'],$row['major_id'],$major->name);
            }
        }
        if ($conn->error) {
            echo $conn->error;
            return null;
        }
        $conn->close();
        return $ls;
    }
    static function getList()
    {
        $conn = db::connect();
        $sql = "SELECT * FROM clasess";
        $result = $conn->query($sql);
        //$result->num_rows
        $ls = [];
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $subject= subject::get_one($row['subject_id']);
                $ls[] = new Classes($row['id'], $row['name'], $row['subject_id'],$subject->name);
            }
        }
        $conn->close();
        return $ls;
    }
    static function get_list_search($key_word){
        $conn = db::connect();
        if($key_word==''||$key_word==null||$key_word==""){
            $sql = "SELECT * FROM clasess";
        }else{
            $sql = "SELECT * FROM clasess 
                WHERE id LIKE '$key_word'
                    OR name LIKE '$key_word'";
        }
        $result = $conn->query($sql);
        $ls = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $subject= subject::get_one($row['subject_id']);
                $ls[] = new Classes($row['id'], $row['name'], $row['subject_id'],$subject->name);
            }
        }
        $conn->close();
        return $ls;
    }
    static function getOne($classID)
    {
        $conn = db::connect();
        $sql = "SELECT * FROM clasess WHERE id='$classID'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $subject= subject::get_one($row['subject_id']);
        $class = new Classes($row['id'], $row['name'], $row['subject_id'],$subject->name);
        $conn->close();
        return $class;
    }
    static function add($class)
    {
        $conn = db::connect();
        $sql = "INSERT INTO `clasess` (`name`, `subject_id`) 
                VALUES ('" . $class->name . "',
                        '" . $class->subject_id . "')";
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return null;
        }
        $conn->close();
        return $result;
    }
    static function update($class)
    {
        $conn = db::connect();
        $sql = "UPDATE  clasess SET
                name='$class->name',
                subject_id='$class->subject_id'
                WHERE id=$class->id ";
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return null;
        }
        $conn->close();
        return $result;
    }
    static function delete_relative($id){
        $conn = db::connect();
        $sql = "DELETE FROM clasess WHERE id = $id";
        $sql2="DELETE FROM class_student WHERE classID=$id";
        $result = $conn->query($sql);
        $result2=$conn->query($sql2);
        if ($conn->error) {
            echo $conn->error;
            return false;
        }
        $conn->close();
        return $result;
    }
    static function count_student($id){
        $conn = DB::connect();
        $sql="SELECT COUNT(*) FROM class_student WHERE classID='$id'";
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return false;
        }
        $conn->close();
        $res= mysqli_fetch_assoc($result); 
        return $res;        
    }
    static function delete($id)
    {
        $conn = DB::connect();
        $sql = "DELETE FROM clasess WHERE id=$id 
                and not exists 
                (SELECT * FROM class_student  WHERE classID=$id)";
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return false;
        }
        $conn->close();
        return $result;
    }
}