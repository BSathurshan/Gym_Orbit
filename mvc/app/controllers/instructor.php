<?php 
class instructor
{
    use Controller;

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


}