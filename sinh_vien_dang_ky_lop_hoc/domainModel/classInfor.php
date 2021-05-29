<?php
class ClassInfor {
    //properties
    public $ClassID;
    public $ClassName;
    public $Subject;
    public $StudentList = array();
    //method
    function __construct($classId,$className,$subject,$studentId){
        $this->ClassID=$classId;
        $this->ClassName=$className;
        $this->Subject=$subject;
        array_push($this->StudentList,$studentId);
    }
    function get_classID() {
        return $this->ClassID;
    }
    function set_classID($classId) {
        $this->ClassID=$classId;
    }
    function get_className() {
        return $this->ClassName;
    }
    function set_className($className) {
        $this->ClassName=$className;
    }
    function get_subject() {
        return $this->Subject;
    }
    function set_subject($subject) {
        $this->Subject=$subject;
    }
    function get_studentList() {
        return $this->StudentList;
    }
    function set_studentList($studentList) {
        $this->StudentList=$studentList;
    }
    function add_student($studentId){
        array_push($this->StudentList,$studentId);
    }
}
?>