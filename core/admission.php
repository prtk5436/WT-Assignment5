<?php
namespace Core\Data;
//include_once './def.php';

class admission {
    public $sname=null; 
    public $mobile=null; 
    public $email=null;
    public $standard=null;
    public $gender=null;
    public $hobby=null;

    private $table_name = null;
    private $conn = null;

    public function __construct($conn) {
        $this->conn = $conn;
        $this->table_name = TABLE;
    }

    public function insertRec()
    {
        try{
        $sql= "INSERT INTO 
                    {$this->table_name} 
               VALUES 
                    (
                        :sname,
                        :mobile,
                        :email, 
                        :standard,
                        :gender,
                        :hobby
                    )";
        
        $stmt=$this->conn->prepare($sql);
        $stmt->bindParam(':sname',$this->sname); 
        $stmt->bindParam(':mobile',$this->mobile);
        $stmt->bindParam(':email',$this->email); 
        $stmt->bindParam(':standard',$this->standard);
        $stmt->bindParam(':gender',$this->gender);
        $stmt->bindParam(':hobby',$this->hobby);
        $result=$stmt->execute();
        }
        catch(PDOException $pe){
            echo $pe->getMessage();
        }
        if ($result) {
            echo "Success";
        }
        else
        {
            echo "Failed";
        }
        return $stmt->rowCount();
    }
    public function getRecords() {
        $sql = "SELECT * FROM {$this->table_name}";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $student_array = array();

            while($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $student_array[] = $row;
            }

            return json_encode($student_array);

            //return $student_array;
        }
        //return $stmt;
    }

    public function update() {
         $sql = "UPDATE
                    {$this->table_name}
                SET
                    Studentname = :sname, 
                    Email = :email, 
                WHERE
                    Mobile = :mobile";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':sname',$this->sname); 
        $stmt->bindParam(':email',$this->email); 
        $stmt->bindParam(':mobile',$this->mobile);

        $stmt->execute();

        return $stmt->rowCount();
        
    }

    function delete() {

        $sql = "DELETE FROM {$this->table_name} WHERE Studentname = :sname";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':sname',$this->sname);
        $stmt->execute();

        return $stmt->rowCount();
    }
}
?>