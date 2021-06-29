<?php 
include_once "DBs.php";
    class major{
        //properties
        public $id;
        public $name;
        //method
        function __construct($id,$name)
        {
            $this->id=$id;
            $this->name=$name;
        }
        static function get_list(){
            $conn = DB::connect();
            $sql = "SELECT * FROM major";
            $result = $conn->query($sql);
            $ls = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $ls[] = new major($row['majorID'], $row['major_name']);
                }
            }
            $conn->close();
            return $ls;
        }
        static function get_one($id){
            $conn = db::connect();
            $sql = "SELECT * FROM major WHERE majorID='$id'";
            $result = $conn->query($sql);
            //$result->num_rows
            $row = $result->fetch_assoc();
            $ls= new major($row['majorID'], $row['major_name']);
            $conn->close();
            return $ls;
        }
        static function add($major){
            $conn = DB::connect();
            $sql = "INSERT INTO `major` (`major_name`) 
                    VALUES ('" . $major->name . "')";
            $result = $conn->query($sql);
            if ($conn->error) {
                echo $conn->error;
                return null;
            }
            $conn->close();
            return $result;
        }
        static function update($major){
            $conn = db::connect();
            $sql = "UPDATE  major SET
                    major_name='$major->name'
                    WHERE majorID=$major->id ";
            $result = $conn->query($sql);
            if ($conn->error) {
                echo $conn->error;
                return null;
            }
            $conn->close();
            return $result;
        }
        static function delete($id){
            $conn = DB::connect();
            $sql = "DELETE FROM major WHERE majorID=$id 
                    and not exists 
                    (SELECT * FROM students  WHERE major_id=$id)";
            $result = $conn->query($sql);
            if ($conn->error) {
                echo $conn->error;
                return false;
            }
            $conn->close();
            return $result;
        }
        static function count_student($id){
            $conn = DB::connect();
            $sql="SELECT COUNT(*) FROM students WHERE major_id='$id'";
            $result = $conn->query($sql);
            if ($conn->error) {
                echo $conn->error;
                return false;
            }
            $conn->close();
            $res= mysqli_fetch_assoc($result); 
            return $res;        
        }
    }

?>