<?php 
class instructor
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

            return  ['found'=>'yes','result'=>$result];
          
        } else 
        {
            return ['found' => 'no' , 'message' => 'No members found for you.'];

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

            return  ['found'=>'yes','result'=>$result];
          
        } else 
        {
            return ['found' => 'no' , 'message' => 'No reminders !.'];

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

            return  ['found'=>'yes','result'=>$result];
          
        } else 
        {
            return ['found' => 'no' , 'message' => 'No materials found !.'];

        }
    }
    public function showClients($instructor_id) {
        $model = $this->model('instructor', 'membership');
        $result = $model->getAcceptedClients($instructor_id);

        
        if ($result) {

            return  ['found'=>'yes','result'=>$result];
          
        } else 
        {
            return ['found' => 'no' , 'message' => 'No accepted Users Yet!'];

        }
    }

    public function getSupport()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {  
            
            if (isset($_POST['trainer_username']) && isset($_POST['email'])) {
                $username = $_POST['trainer_username'];  
                $email= $_POST['email']; 
                $role = $_POST['role'];

                $issue = htmlspecialchars($_POST['issue']);
                $message = htmlspecialchars($_POST['details']);
                    
                $model = $this->model('support','support'); 
          

                    if (!$model) {
                        die("Failed to load model.");
                    }

                    $result = $model->submit($issue,$message,$username,$role); 

                    if ($result) {

                        $this->view('instructor','instructor');
                        echo "<script>alert('Your issue has been sent !');</script>";

                    
                    } else 
                    {
                        $this->view('instructor','instructor');
                        echo "<script>alert('Failed to sent the message!');</script>";
                    }
                }
                else{
                    $this->view('instructor','instructor');
                    echo "<script>alert('Missing param (get_Support).');</script>";
                }   
      }
    
    }
    public function assign_schedule($username) {
        $workouts = $this->get_workouts($username);
        $this->view('user', 'workoutPlan', ['username' => $username, 'workouts' => $workouts]);
    }
    public function get_workouts($username) {
        
        $query = "SELECT * FROM workout_schedule WHERE username = ? ORDER BY FIELD(day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'), id";
        $result = $this->read($query, [$username]); // ✅ Use trait method
        
        if($result) {
            $workouts = [];
            foreach($result as $row) {
                $workouts[$row->day][] = $row;
            }
            return ['found' => 'yes', 'workouts' => $workouts];
        }
        return ['found' => 'no'];
    }
    
    
    

}