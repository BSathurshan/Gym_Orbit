
<?php
class Nof {
    use Model;

    public function nofUsers(){
        $conn = $this->getConnection();
        $sql = "SELECT COUNT(*) AS user_count FROM user";
        $stmt = $conn->prepare($sql);

        if($stmt->execute()){
            $result = $stmt->get_result();
            $number = $result->fetch_assoc();
            $nofUsers = $number['user_count'];

            $stmt->close();
            return ['found' => 'yes', 'result' => $nofUsers];
        } else {
            $stmt->close();
            return ['found' => 'no'];
        }
    }

    public function nofOwners(){
        $conn = $this->getConnection();
        $sql = "SELECT COUNT(*) AS user_count FROM gym";
        $stmt = $conn->prepare($sql);

        if($stmt->execute()){
            $result = $stmt->get_result();
            $number = $result->fetch_assoc();
            $nofOwners = $number['user_count'];

            $stmt->close();
            return ['found' => 'yes', 'result' => $nofOwners];
        } else {
            $stmt->close();
            return ['found' => 'no'];
        }
    }

    public function nofInstructors(){
        $conn = $this->getConnection();
        $sql = "SELECT COUNT(*) AS user_count FROM instructors";
        $stmt = $conn->prepare($sql);

        if($stmt->execute()){
            $result = $stmt->get_result();
            $number = $result->fetch_assoc();
            $nofInstructors = $number['user_count'];

            $stmt->close();
            return ['found' => 'yes', 'result' => $nofInstructors];
        } else {
            $stmt->close();
            return ['found' => 'no'];
        }
    }

    // ✅ GET RECENT USERS
    public function recentUsers($limit = 5){
        $conn = $this->getConnection();
        $sql = "SELECT username, created_at FROM user ORDER BY created_at DESC LIMIT ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $limit);

        if($stmt->execute()){
            $result = $stmt->get_result();
            $users = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            return ['found' => 'yes', 'result' => $users];
        } else {
            $stmt->close();
            return ['found' => 'no'];
        }
    }

    // ✅ GET PENDING GYMS
    public function pendingGyms(){
        $conn = $this->getConnection();
        $sql = "SELECT * FROM gym WHERE status = 'pending'";
        $stmt = $conn->prepare($sql);

        if($stmt->execute()){
            $result = $stmt->get_result();
            $gyms = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            return ['found' => 'yes', 'result' => $gyms];
        } else {
            $stmt->close();
            return ['found' => 'no'];
        }
    }

    // Fetch gender distribution from database
public function getGenderDistribution($gym_username) {
    $query = "SELECT gender, COUNT(*) AS count
              FROM user
              JOIN connects_gym ON user.username = connects_gym.username
              WHERE connects_gym.gym_username = :gym_username
              GROUP BY gender";

    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':gym_username', $gym_username);
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $data;
}


    public function index($gym_username) {
        // Fetch data for users, owners, and instructors
        $nofUsers = $this->getNof_Users();
        $nofOwners = $this->getNof_Owners();
        $nofInstructors = $this->getNof_Instructors();
    
        // Fetch recent users and pending gyms
        $recentUsers = $this->getRecent_Users();
        $pendingGyms = $this->getPending_Gyms();
    
        // Fetch gender distribution
        $genderData = $this->getGenderDistribution($gym_username);
    
        // Pass all data to the view
        require_once 'path_to_dashboard_view.php';
    }
    
}
?>


