<<<<<<< HEAD
<?php
class Instructor
=======
<?php 
  require_once '../app/controllers/email.php';

class instructor
>>>>>>> cc1bc48e25abcae9bdc3c742f69bcba5d9ea3eab
{
    use Controller;
    use Database;

    public function index()
    {
        $this->view('instructor', 'instructor');
    }

    public function getContacts($username)
    {
        $model = $this->model('instructor', 'contacts');

        if (!$model) {
            die("Failed to load model.");
        }

        $result = $model->get_Contacts($username);

        if ($result) {
            return ['found' => 'yes', 'result' => $result];
        } else {
            return ['found' => 'no', 'message' => 'No members found for you.'];
        }
    }

    public function getReminders($username)
    {
        $model = $this->model('instructor', 'reminder');

        if (!$model) {
            die("Failed to load model.");
        }

        $result = $model->get_Reminders($username);

        if ($result) {
            return ['found' => 'yes', 'result' => $result];
        } else {
            return ['found' => 'no', 'message' => 'No reminders!.'];
        }
    }

    public function getMaterials($gym_username)
    {
        $model = $this->model('instructor', 'materials');

        if (!$model) {
            die("Failed to load model.");
        }

        $result = $model->get_Materials($gym_username);

        if ($result) {
            return ['found' => 'yes', 'result' => $result];
        } else {
            return ['found' => 'no', 'message' => 'No materials found!.'];
        }
    }

    public function showClients($instructor_id)
    {
        $model = $this->model('instructor', 'membership');
        $result = $model->getAcceptedClients($instructor_id);

        if ($result['found'] === 'yes') {
            return ['found' => 'yes', 'result' => $result['result']];
        } else {
            return ['found' => 'no', 'message' => $result['message']];
        }
    }

    public function getSupport()
    {
<<<<<<< HEAD
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (isset($_POST['trainer_username']) && isset($_POST['email'])) {
                $username = $_POST['trainer_username'];
                $email = $_POST['email'];
                $role = $_POST['role'];

                $issue = htmlspecialchars($_POST['issue']);
                $message = htmlspecialchars($_POST['details']);

                $model = $this->model('support', 'support');

                if (!$model) {
                    die("Failed to load model.");
                }

                $result = $model->submit($issue, $message, $username, $role);

                $this->view('instructor', 'instructor');

                if ($result) {
                    echo "<script>alert('Your issue has been sent !');</script>";
                } else {
                    echo "<script>alert('Failed to send the message!');</script>";
                }
            } else {
                $this->view('instructor', 'instructor');
                echo "<script>alert('Missing param (get_Support).');</script>";
            }
        }
=======
            $username = $_POST['trainer_username'];  
            $email= $_POST['email']; 
            $role = 'instructor';

            $issue = htmlspecialchars($_POST['issue']);
            $message = htmlspecialchars($_POST['details']);

            $model = $this->model('support', 'support');
            $result = $model->submit($issue, $message, $username, $role, $email);
        
            if ($result['found'] == 'yes') {
        
                $userEmail=$email ;
                $emailMessage="Dear $username,<br><br>Our support team will reply you soon!.";
                $subject='We got your Ticket';
        
                $emailService = new Email();
                $response = $emailService->send($userEmail, $emailMessage, $subject);
        
                $this->view('instructor', 'instructor');
                if($response){
                echo "<script>alert('Support ticket has been submitted !');</script>";
                }else{
                echo "<script>alert('Fail to send email message !');</script>";
                }
            } elseif ($result['found'] == 'no') {
        
                $this->view('instructor', 'instructor');
                echo "<script>alert('Error while getting support');</script>";
            }  
      
    
>>>>>>> cc1bc48e25abcae9bdc3c742f69bcba5d9ea3eab
    }

    public function get_requests($username)
    {
        if (!empty($username)) {
            $model = $this->model('instructor', 'Requests');
            $result = $model->get($username);

            if ($result['found'] === 'yes') {
                return ['found' => 'yes', 'result' => $result['result']];
            } else {
                return ['found' => 'no'];
            }
        }
    }

    public function acceptRequest($id)
    {
        $model = $this->model('instructor', 'Requests');
        $result = $model->accept($id);
        header("Location: " . ROOT . "/owner/owner");
        exit;
    }

    public function rejectRequest($id)
    {
        $model = $this->model('instructor', 'Requests');
        $result = $model->reject($id);
        header("Location: " . ROOT . "/owner/owner");
        exit;
    }

    public function processRequest($id, $action)
    {
        $model = $this->model('instructor', 'requests');
        $result = $model->processRequest($id, $action);

        if ($result) {
            echo "<script>alert('Request successfully {$action}ed.');</script>";
        } else {
            echo "<script>alert('Failed to process the request.');</script>";
        }

        $this->view('instructor', 'requests');
    }

    // public function assign_schedule($username) {
    //     $workouts = $this->get_workouts($username);
    //     $this->view('user', 'workoutPlan', ['username' => $username, 'workouts' => $workouts]);
    // }
    // public function get_workouts($username) {
        
    //     $query = "SELECT * FROM workout_schedule WHERE username = ? ORDER BY FIELD(day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'), id";
    //     $result = $this->read($query, [$username]); // ✅ Use trait method
        
    //     if($result) {
    //         $workouts = [];
    //         foreach($result as $row) {
    //             $workouts[$row->day][] = $row;
    //         }
    //         return ['found' => 'yes', 'workouts' => $workouts];
    //     }
    //     return ['found' => 'no'];
    // }

    public function getGyms($gym_username)
    {
        $model = $this->model('instructor', 'gyms');
    
        if (!$model) {
            die("Failed to load model.");
        }
    
        $result = $model->get_GymDetails($gym_username);
    
        if ( $result->num_rows > 0) {
            $gym_details = $result->fetch_assoc();
            return ['found' => 'yes', 'result' => $gym_details];
        } else {
            return ['found' => 'no', 'message' => 'No gym details found!'];
        }
    }

    public function get_machines($username)
    {
        if (!empty($username)) {

            $model = $this->model('owner','machines'); 
            $result = $model->get($username); 
            
            if ($result['found']=='yes') {

                return ['found' => 'yes' ,'result' => $result['result']];

            }
            elseif($result['found']=='no'){

                return ['found' => 'no'];

            }
        } else {

            echo "<script>alert('Missing gym's username (get_machines).');</script>";
        }

    }
    
    /*calendar*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function updateAvailability() {

        if (session_status() == PHP_SESSION_NONE) {
            session_start(); // Start session only if it's not already started
        }
    
        if (!isset($_SESSION['userDetails']['gym_username'])) {
            echo json_encode(["success" => false, "error" => "User not logged in"]);
            return;
        }

        // Get JSON data from the request body
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

       $username = $_SESSION['userDetails']['gym_username'];

        if (!isset($data['availability'])) {
            echo json_encode(["success" => false, "error" => "Invalid data"]);
            return;
        }

        $model = $this->model('owner','calendar'); 
        // Update the database and get the result
        $result = $model->updateMachineAvailability($data['availability'],$username);

        if ($result) {
            echo json_encode(["success" => true, "message" => "Availability updated"]);
        } else {
            echo json_encode(["success" => false, "error" => "Failed to update database"]);
        }
    }


    public function updateTodayColor() {

        if (session_status() == PHP_SESSION_NONE) {
            session_start(); // Start session only if it's not already started
        }
    
        if (!isset($_SESSION['userDetails']['gym_username'])) {
            echo json_encode(["success" => false, "error" => "User not logged in"]);
            return;
        }

        // Get JSON data from the request body
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        if (!isset($data['date']) || !isset($data['color'])) {
            echo json_encode(["status" => "error", "message" => "Date or color data is missing."]);
            exit;
        }
        
        // Extract date and color data
        $selectedDate = $data['date'];
        $selectedColor = $data['color'];
        $username = $_SESSION['userDetails']['gym_username'];


        if (!isset($data['date'])) {
            echo json_encode(["success" => false, "error" => "Date not setted"]);
            return;
        }

        $model = $this->model('owner','calendar'); 
        // Update the database and get the result
        $result = $model->updateTodayColor($data['date'],$data['color'],$username);

        if ($result) {
            echo json_encode(["success" => true, "message" => "Color updated"]);
        } else {
            echo json_encode(["success" => false, "error" => "Failed to update Color"]);
        }
    }

    
    public function getSavedColors() {
            if (session_status() == PHP_SESSION_NONE) {
                session_start(); // Start session only if it's not already started
            }
        
            if (!isset($_SESSION['userDetails']['gym_username'])) {
                header('Content-Type: application/json');
                echo json_encode(["success" => false, "error" => "User not logged in"]);
                return;
            }
        
            $username = $_SESSION['userDetails']['gym_username'];
            $model = $this->model('owner', 'calendar');
        
            // Get the result from the model and output it
            $colors = $model->getSavedColors($username);
        
            header('Content-Type: application/json');
            echo json_encode($colors);
    }


    public function saveNote() {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                if (!isset($_SESSION['userDetails']['gym_username'])) {
                    header('Content-Type: application/json');
                    echo json_encode(["success" => false, "error" => "User not logged in"]);
                    return;
                }
            
                $jsonData = file_get_contents("php://input");
                $data = json_decode($jsonData, true);
                if (!isset($data['id']) || !isset($data['content']) || !isset($data['date'])) {
                    header('Content-Type: application/json');
                    echo json_encode(["success" => false, "error" => "Missing note data"]);
                    return;
                }
            
                $username = $_SESSION['userDetails']['gym_username'];
                $model = $this->model('owner', 'calendar');
                $result = $model->saveNote($data['id'], $data['content'], $data['date'], $username);
            
                header('Content-Type: application/json');
                echo json_encode($result ? ["success" => true] : ["success" => false, "error" => "Failed to save note"]);
    }
    
    public function deleteNote() {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                if (!isset($_SESSION['userDetails']['gym_username'])) {
                    header('Content-Type: application/json');
                    echo json_encode(["success" => false, "error" => "User not logged in"]);
                    return;
                }
            
                $jsonData = file_get_contents("php://input");
                $data = json_decode($jsonData, true);
                if (!isset($data['id'])) {
                    header('Content-Type: application/json');
                    echo json_encode(["success" => false, "error" => "Missing note ID"]);
                    return;
                }
            
                $username = $_SESSION['userDetails']['gym_username'];
                $model = $this->model('owner', 'calendar');
                $result = $model->deleteNote($data['id'], $username);
            
                header('Content-Type: application/json');
                echo json_encode($result ? ["success" => true] : ["success" => false, "error" => "Failed to delete note"]);
    }
    
    public function getNotes() {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                if (!isset($_SESSION['userDetails']['gym_username'])) {
                    header('Content-Type: application/json');
                    echo json_encode(["success" => false, "error" => "User not logged in"]);
                    return;
                }
            
                $username = $_SESSION['userDetails']['gym_username'];
                $model = $this->model('owner', 'calendar');
                $notes = $model->getNotes($username);
            
                header('Content-Type: application/json');
                echo json_encode($notes);
    }
    

}
?>