<?php
class Instructor
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
    
    
    

}
?>