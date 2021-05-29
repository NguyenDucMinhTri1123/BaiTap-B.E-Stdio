<?php
class Student {
  // Properties
  public $StudentID;
  public $FullName;
  public $Age;
  public $Major;
  public $ClassList = array();
  //method
  function Join_Class($classId){
    array_push($this->ClassList,$classId);
  }
  function Update_Student($fullName,$age,$major,$classList){
    $this->FullName =$fullName;
    $this->Age =$age;
    $this->Major =$major;
    $this->ClassList =$classList;
  }
  function Add_Student($studentId,$fullName,$age,$major,$classList){
    $this->StudentID=$studentId;
    $this->FullName =$fullName;
    $this->Age =$age;
    $this->Major =$major;
    $this->ClassList =$classList;
  }
  function __construct($studentId,$fullName,$age,$major,$classList){
    $this->StudentID=$studentId;
    $this->FullName =$fullName;
    $this->Age =$age;
    $this->Major =$major;
    $this->ClassList =$classList;
  }
  function get_StudentID() {
    return $this->StudentID;
  }
  function set_StudentID($studentId) {
    $this->StudentID=$studentId;
  }
  function get_FullName() {
    return $this->FullName;
  }
  function set_FullName($fullName) {
    $this->FullName=$fullName;
  }
  function get_Age() {
    return $this->Age;
  }
  function set_Age($age) {
    $this->Age=$age;
  }
  function get_Major() {
    return $this->Major;
  }
  function set_Major($major) {
    $this->Major=$major;
  }
  function get_ClassList() {
    return $this->ClassList;
  }
  function set_ClassList($classList) {
    $this->ClassList=$classList;
  }
}
//hàm echo có khả năng xuất tên biến ngay trong phần ngoặc kép.
function familyName($fname, $year) {
    echo "$fname Refsnes. Born in $year <br>";
  }
?>