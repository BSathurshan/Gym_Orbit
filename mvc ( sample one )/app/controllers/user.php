<?php 
class User
{
    use Controller;

    public function index()
    {
        $this->view('user', 'user');
    }

    public function joinedGyms($username)
    {
        $model = $this->model('user', 'display');

        if (!$model) {
            die("Failed to load model.");
        }
        $result = $model->joined($username);

        if ($result) {

            return ['found' => 'yes' ,'result' => $result];
          
        } else 
        {
            return ['message' => 'No gym connections found for this username.'];
        }
    }

    public function leaveGym()
    {
        if (isset($_GET['gym_username']) && isset($_GET['username'])) {
            $gym_username = $_GET['gym_username'];  
            $username = $_GET['username'];  
    
            $model = $this->model('user', 'leave'); 
            $result = $model->leave($gym_username, $username); 
            
            if ($result) {
        
                echo "<script>alert('You have successfully left the gym.');</script>";
                echo "<script>window.location.href ='<?= ROOT ?>/user';</script>"; 
            } else {
  
                echo "<script>alert('Failed to leave.');</script>";
            }
        } else {
   
            echo "<script>alert('Missing parameters (leaveGym).');</script>";
        }
    }

    public function instructor_Check($username)
    {
        if (!empty($username)) {

            $model = $this->model('user', 'instructor'); 
            $result = $model->instructor_Details($username); 
            
            if ($result) {
    
                return ['found' => 'yes' ,'result' => $result];

            } else {

                 return ['found' => 'no'];
            }
        } else {
   
            echo "<script>alert('Missing username (instructors_Check).');</script>";
        }
    }

    public function request_Instructor($username)
    {
        if (!empty($username)) {

            $model = $this->model('user', 'instructor'); 
            $result = $model->request($username); 
            
            if ($result) {
    
                return ['found' => 'yes' ,'result' => $result];

            } else {

                 return ['found' => 'no' ,'message' => 'Please join a gym to request instructors'];
            }
        } else {
   
            echo "<script>alert('Missing username (request_Instructor).');</script>";
        }
    }
    

    public function sendRequest()
    {
        
        if (isset($_GET['gym_username'],$_GET['trainer_username'], $_GET['trainer_name'] , $_GET['name'],$_GET['username'])) {
  
            $gym_username = $_GET['gym_username'];
            $trainer_username =$_GET['trainer_username'];
            $trainer_name = $_GET['trainer_name'] ;
            $name = $_GET['name'];
            $username =$_GET['username'];

            $model = $this->model('user', 'instructor'); 
            $result = $model->send($username,$name,$trainer_name, $trainer_username,$gym_username); 

            if($result){
                echo "<script>alert('Request send successfully');</script>";
            }else{
                echo "<script>alert('Already request pending');</script>";
            }

            echo "<script>window.location.href ='<?= ROOT ?>/user';</script>"; 
 
        }
    }
    
}
