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
        $ls = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[] = new Classes($row['id'], $row['name'], $row['subject']);
            }
        }
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
        $sql = "UPDATE  `clasess` (`name`, `subject`) 
                VALUES ('" . $class->name . "',
                        '" . $class->subject . "')
                WHERE id='$class->id' ";
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
        $sql = "DELETE FROM `clasess` WHERE `id` = " . $id;
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return false;
        }
        $conn->close();
        return $result;
    }
}