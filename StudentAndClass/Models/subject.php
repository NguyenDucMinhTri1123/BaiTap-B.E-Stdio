<?php 
include_once "DBs.php";
    class subject{
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
            $sql = "SELECT * FROM subject";
            $result = $conn->query($sql);
            $ls = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $ls[] = new subject($row['id'], $row['name']);
                }
            }
            $conn->close();
            return $ls;
        }
        static function get_one($id){
            $conn = db::connect();
            $sql = "SELECT * FROM subject WHERE id='$id'";
            $result = $conn->query($sql);
            //$result->num_rows
            $row = $result->fetch_assoc();
            $ls= new subject($row['id'], $row['name']);
            $conn->close();
            return $ls;
        }
        static function add($subject){
            $conn = DB::connect();
            $sql = "INSERT INTO `subject` (`name`) 
                    VALUES ('" . $subject->name . "')";
            $result = $conn->query($sql);
            if ($conn->error) {
                echo $conn->error;
                return null;
            }
            $conn->close();
            return $result;
        }
        static function update($subject){
            $conn = db::connect();
            $sql = "UPDATE  subject SET
                    name='$subject->name'
                    WHERE id=$subject->id ";
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
            $sql = "DELETE FROM subject WHERE id=$id 
                    and not exists 
                    (SELECT * FROM clasess  WHERE subject_id=$id)";
            $result = $conn->query($sql);
            if ($conn->error) {
                echo $conn->error;
                return false;
            }
            $conn->close();
            return $result;
        }
        static function count_class($id){
            $conn = DB::connect();
            $sql="SELECT COUNT(*) FROM clasess WHERE subject_id='$id'";
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