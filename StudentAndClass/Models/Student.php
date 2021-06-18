<?php
include_once "DBs.php";
class Student
{
    // Properties
    public $id;
    public $name;
    public $age;
    public $major;

    function __construct($id, $name, $age, $major)
    {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->major = $major;
    }
    //ok
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
    //ok
    static function list_class_of_student($studentID){
        $conn = DB::connect();
        $sql="SELECT clasess.name,clasess.subject,clasess.id 
                FROM clasess 
                JOIN class_student 
                ON class_student.studentID='$studentID' 
                    AND clasess.id=class_student.classID";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[]= new Classes($row['id'], $row['name'], $row['subject']);
            }
        }else{
            $ls[]= new Classes(000,"null","null");
        }
        if ($conn->error) {
            echo $conn->error;
            return null;
        }
        $conn->close();
        return $ls;
    }
    // ok
    static function check_class_not_join($studentID){
        $conn = DB::connect();
        $sql1="SELECT clasess.name,clasess.subject,clasess.id 
                FROM clasess 
                WHERE id NOT IN 
                (SELECT class_student.classID 
                FROM class_student 
                WHERE class_student.studentID='$studentID')";
        $result = $conn->query($sql1);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[]= new Classes($row['id'], $row['name'], $row['subject']);
            }
        }else{
            $ls[]= new Classes(000,"null","null");
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
        $conn = DB::connect();
        $sql = "SELECT * FROM students";
        $result = $conn->query($sql);
        $ls = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[] = new Student($row['id'], $row['name'], $row['age'], $row['major']);
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
        $ls= new Student($row['id'], $row['name'], $row['age'], $row['major']);
        $conn->close();
        return $ls;
    }
    static function add($student)
    {
        $conn = DB::connect();
        $sql = "INSERT INTO `students` (`name`, `age`,`major`) 
                VALUES ('" . $student->name . "',
                        '" . $student->age . "',
                        '" . $student->major . "')";
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
                major='$student->major'
                WHERE id=$student->id ";
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return null;
        }
        $conn->close();
        return $result;
    }
    static function delete($id)
    {
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
}