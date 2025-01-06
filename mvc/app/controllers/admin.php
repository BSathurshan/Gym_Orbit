<?php 
class Admin 
{
    use Controller;
    private $signup;

    public function index()
    {
        $this->view('admin', 'admin');
    }

    public function __construct() 
    {
        $this->signup = new signup();    
    }


    public function get_messages()
    {


            $model = $this->model('admin','messages'); 
            $result = $model->get(); 
            
            if ($result['found']=='yes') {

                return ['found' => 'yes' ,'result' => $result['result']];

            }
            elseif($result['found']=='no'){

                return ['found' => 'no'];

            }
         else {

            echo "<script>alert('Missing gym's username (get_messages).');</script>";
        }

    }


    public function get_reminders($username)
    {


            $model = $this->model('admin','reminders'); 
            $result = $model->get($username); 
            
            if ($result['found']=='yes') {

                return ['found' => 'yes' ,'result' => $result['result']];

            }
            elseif($result['found']=='no'){

                return ['found' => 'no'];

            }
         else {

            echo "<script>alert('Missing gym's username (get_reminders).');</script>";
        }

    }

    public function get_materials($username)
    {


            $model = $this->model('admin','materials'); 
            $result = $model->get($username); 
            
            if ($result['found']=='yes') {

                return ['found' => 'yes' ,'result' => $result['result']];

            }
            elseif($result['found']=='no'){

                return ['found' => 'no'];

            }
         else {

            echo "<script>alert('Missing gym's username (get_materials).');</script>";
        }

    }

    public function get_posts()
    {


            $model = $this->model('admin','posts'); 
            $result = $model->get(); 
            
            if ($result['found']=='yes') {

                return ['found' => 'yes' ,'result' => $result['result']];

            }
            elseif($result['found']=='no'){

                return ['found' => 'no'];

            }
         else {

            echo "<script>alert('Missing gym's username (get_posts).');</script>";
        }

    }

        //auto runs this function and start from js
        public function searchUsers()
        {
        
               
                $search = isset($_GET['search']) ? $_GET['search'] : '';
                $model = $this->model('admin', 'search'); 
                $result = $model->getUsers($search); 
    
                
                if (!defined('PATH')) {
                    define('PATH', $_SERVER['DOCUMENT_ROOT'] . '/mvc/app/views/admin/');
                }
                include_once PATH . 'userRender.php';            
            
        }

        public function searchGyms()
        {
        
               
                $search = isset($_GET['search']) ? $_GET['search'] : '';
                $model = $this->model('admin', 'search'); 
                $result = $model->getGyms($search); 
    
                
                if (!defined('PATH')) {
                    define('PATH', $_SERVER['DOCUMENT_ROOT'] . '/mvc/app/views/admin/');
                }
                include_once PATH . 'gymRender.php';            
            
        }

        public function searchInstructors()
        {
        
               
                $search = isset($_GET['search']) ? $_GET['search'] : '';
                $model = $this->model('admin', 'search'); 
                $result = $model->getInstructors($search); 
    
                
                if (!defined('PATH')) {
                    define('PATH', $_SERVER['DOCUMENT_ROOT'] . '/mvc/app/views/admin/');
                }
                include_once PATH . 'instructorRender.php';            
            
        }

        public function searchAdmins()
        {
        
               
                $search = isset($_GET['search']) ? $_GET['search'] : '';
                $model = $this->model('admin', 'search'); 
                $result = $model->getAdmins($search); 
    
                
                if (!defined('PATH')) {
                    define('PATH', $_SERVER['DOCUMENT_ROOT'] . '/mvc/app/views/admin/');
                }
                include_once PATH . 'adminRender.php';            
            
        }


        public function addUser()
        {
        
            $_POST["access"] = "admin";
            $model = $this->model('signup', 'check_Email');
            $result = $model->check($_POST["email"]);
            
            if($result['found']=='no'){

                $model = $this->model('signup', 'check_Username');
                $result2 = $model->check($_POST["username"]);

                if($result2['found']=='no'){

                   $call=$signup->addUser();
                   
                }
            }
            
        }
    
    
}
