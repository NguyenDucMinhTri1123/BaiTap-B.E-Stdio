<?php
include_once "Student.php";
include_once "DBs.php";
class Classes
{
    //properties
    public $id;
    public $name;
    public $subject;
    //method
    function __construct($id, $name, $subject)
    {   
        $this->id = $id;
        $this->name = $name;
        $this->subject = $subject;
    }
    static function add_class($classID,$studentID){
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
        $sql="SELECT students.id,students.name,students.age,students.major 
                FROM students 
                JOIN class_student 
                ON class_student.classID='$classID' 
                    AND students.id=class_student.studentID";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[]= new Student($row['id'], $row['name'], $row['age'],$row['major']);
            }
        }else{
            $ls[]= new Student(000,"null","null","null");
        }
        $conn->close();
        return $ls;
    }
    static function check_student_not_join($classID){
        $conn = DB::connect();
        $sql="SELECT students.id, students.name,students.age,students.major 
                FROM students 
                WHERE id NOT IN 
                (SELECT class_student.studentID 
                FROM class_student 
                WHERE class_student.classID='$classID')";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[]= new Student($row['id'], $row['name'], $row['age'],$row['major']);
            }
        }else{
            $ls[]= new Student(000,"null","null","null");
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
                $ls[] = new Classes($row['id'], $row['name'], $row['subject']);
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
        //$result->num_rows
        $row = $result->fetch_assoc();
        $ls= new Classes($row['id'], $row['name'], $row['subject']);
        $conn->close();
        return $ls;
    }
    static function add($class)
    {
        $conn = db::connect();
        $sql = "INSERT INTO `clasess` (`name`, `subject`) 
                VALUES ('" . $class->name . "',
                        '" . $class->subject . "')";
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
                subject='$class->subject'
                WHERE id=$class->id ";
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
}