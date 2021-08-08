<?php
include_once "DBs.php";
class ClassStudent{
    public $classID;
    public $studentID;
    function __construct($classID,$studentID)
    {
        $this->classID = $classID;
        $this->studentID = $studentID;
    }
    // bug
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
    // ok
    static function list_class_of_student($studentID){
        $conn = DB::connect();
        $sql="SELECT clasess.name,clasess.subject,clasess.id 
                FROM clasess 
                JOIN class_student 
                ON class_student.studentID='$studentID' 
                    AND clasess.id=class_student.classID";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[]= new Classes($row['clasess.id'], $row['clasess.name'], $row['clasess.subject']);
            }
        }
        if ($conn->error) {
            echo $conn->error;
            return null;
        }
        $conn->close();
        return $ls;
    }
}
?>