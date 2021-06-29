<?php
include_once "DBs.php";
include_once "major.php";
include_once "subject.php";
class Student
{
    // Properties
    public $id;
    public $name;
    public $age;
    public $major_id;
    public $major_name;
    function __construct($id, $name, $age, $major_id,$major_name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->major_id = $major_id;
        $this->major_name=$major_name;
    }
    static function join_class($classID,$studentID){
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
    static function list_class_of_student($studentID){
        $conn = DB::connect();
        $sql="SELECT clasess.name,clasess.subject_id,clasess.id 
                FROM clasess 
                JOIN class_student 
                ON class_student.studentID='$studentID' 
                    AND clasess.id=class_student.classID";
        $result = $conn->query($sql);
        $ls=[];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $subject=subject::get_one($row['subject_id']);
                $ls[]= new Classes($row['id'], $row['name'], $row['subject_id'],$subject->name);
            }
        }
        if ($conn->error) {
            echo $conn->error;
            return null;
        }
        $conn->close();
        return $ls;
    }
    static function check_class_not_join($studentID){
        $conn = DB::connect();
        $sql1="SELECT clasess.name,clasess.subject_id,clasess.id 
                FROM clasess 
                WHERE id NOT IN 
                (SELECT class_student.classID 
                FROM class_student 
                WHERE class_student.studentID='$studentID')";
        $result = $conn->query($sql1);
        $ls=[];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $subject=subject::get_one($row['subject_id']);
                $ls[]= new Classes($row['id'], $row['name'], $row['subject_id'],$subject->name);
            }
        }
        if ($conn->error) {
            echo $conn->error;
            return null;
        }
        
        $conn->close();
        return $ls;
    }
    static function get_list_search($keyWord){
        $conn = DB::connect();
        if($keyWord==''||$keyWord==null||$keyWord==""){
            $sql = "SELECT * FROM students";
        }else{
            $keyWord ="%$keyWord%";
            $sql = "SELECT * FROM students
                    JOIN major
                    WHERE students.id LIKE '$keyWord'
                        OR students.name LIKE '$keyWord'
                        OR students.age LIKE '$keyWord'
                        OR major.major_name LIKE '$keyWord' AND students.major_id=major.majorID";
        }
        $result = $conn->query($sql);
        $ls = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $major= major::get_one($row['major_id']);
                $ls[] = new Student($row['id'], $row['name'], $row['age'], $row['major_id'],$major->name);
            }
        }
        
        $conn->close();
        return $ls;
    }       
    static function getList()
    {
        $conn = DB::connect();
        $sql = "SELECT * FROM students";
        $result = $conn->query($sql);
        $ls = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $major= major::get_one($row['major_id']);
                $ls[] = new Student($row['id'], $row['name'], $row['age'], $row['major_id'],$major->name);
            }
        }
        $conn->close();
        return $ls;
    }
    static function getOne($id)
    {
        $conn = db::connect();
        $sql = "SELECT * FROM students WHERE id='$id'";
        $result = $conn->query($sql);
        //$result->num_rows
        $row = $result->fetch_assoc();
        $major= major::get_one($row['major_id']);
        $ls= new Student($row['id'], $row['name'], $row['age'], $row['major_id'],$major->name);
        $conn->close();
        return $ls;
    }
    static function add($student)
    {
        $conn = DB::connect();
        $sql = "INSERT INTO `students` (`name`, `age`,`major_id`) 
                VALUES ('" . $student->name . "',
                        '" . $student->age . "',
                        '" . $student->major_id . "')";
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return null;
        }
        $conn->close();
        return $result;
    }
    static function update($student)
    {
        $conn = db::connect();
        $sql = "UPDATE  students SET
                name='$student->name',
                age='$student->age',
                major_id='$student->major_id'
                WHERE id=$student->id ";
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return null;
        }
        $conn->close();
        return $result;
    }
    static function delete_relative($id){
        $conn = DB::connect();
        $sql = "DELETE FROM students WHERE id=$id";
        $sql2="DELETE FROM class_student  WHERE studentID=$id";
        $result = $conn->query($sql);
        $result2=$conn->query($sql2);
        if ($conn->error) {
            echo $conn->error;
            return false;
        }
        $conn->close();
        return $result;
    }
    static function count_class($id){
        $conn = DB::connect();
        $sql="SELECT COUNT(*) FROM class_student WHERE studentID='$id'";
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
        $sql = "DELETE FROM students WHERE id=$id 
                and not exists 
                (SELECT * FROM class_student  WHERE studentID=$id)";
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return false;
        }
        $conn->close();
        return $result;
    }
}