<?php
class Nof{
    use Model;

    public function nofUsers(){
        $conn = $this->getConnection();

        $sql="SELECT COUNT(*) AS user_count FROM user";
        $stmt = $conn->prepare($sql);

        if($stmt->execute() ){
            $result = $stmt->get_result();
            $number=$result->fetch_assoc();
            $nofUsers=$number['user_count'];

            $stmt->close();
            return['found'=>'yes', 'result'=>$nofUsers];
        }else
        {
            $stmt->close();
            return['found'=>'no'];
        }
    }

    public function nofOwners(){
        $conn = $this->getConnection();

        $sql="SELECT COUNT(*) AS user_count FROM gym";
        $stmt = $conn->prepare($sql);

        if($stmt->execute() ){
            $result = $stmt->get_result();
            $number=$result->fetch_assoc();
            $nofOwners=$number['user_count'];

            $stmt->close();
            return['found'=>'yes', 'result'=>$nofOwners];
        }else
        {
            $stmt->close();
            return['found'=>'no'];
        }
    }

    public function nofInstructors(){
        $conn = $this->getConnection();

        $sql="SELECT COUNT(*) AS user_count FROM instructors";
        $stmt = $conn->prepare($sql);

        if($stmt->execute() ){
            $result = $stmt->get_result();
            $number=$result->fetch_assoc();
            $nofInstructors=$number['user_count'];

            $stmt->close();
            return['found'=>'yes', 'result'=>$nofInstructors];
        }else
        {
            $stmt->close();
            return['found'=>'no'];
        }
    }
    
}
?>