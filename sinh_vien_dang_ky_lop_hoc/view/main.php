<?php
    include '<domainModel>student.php';
    include '<domainModel>classInfor.php';
    // add new students
    $student1 = new Student("001","Minh Tri",18,"IT",$class1);
    $student2 = new Student("002","Hoang Nam",18,"IT",$class2);
    $student3 = new Student("003","Nguyen Lam",18,"IT",$class3);
    //add new class
    $class1 = new ClassInfor(001,"toan 12","toan","001");
    $class2 = new ClassInfor(002,"ly 12","ly","002");
    $class3 = new ClassInfor(003,"hoa 12","hoa","003");
    //join class function
    $student1->Join_Class($class2);
    //Update information function
    $student1->Update_Student("Minh Nam",17,"Math",$class3);
    //Student List in class
    echo $class3->get_studentList();
    //class of one student
    echo $student1->get_ClassList();

?>