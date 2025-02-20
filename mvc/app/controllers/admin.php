<?php 
  require_once '../app/controllers/signup.php';
  
class Admin 
{
    use Controller;
    public function index()
    {
        $this->view('admin', 'admin');
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

                    $signup = new Signup();               
                    $call = $signup->addUser(); 
                   
                }else{
                    $errorMessage = "Username already taken.";
                    $this->view('admin', 'admin', ['errorMessage' => $errorMessage]);
                }
            }else{
                $errorMessage = "Email already taken.";
                $this->view('admin', 'admin', ['errorMessage' => $errorMessage]);
            }
            
        }

        public function addOwner()
        {
            $_POST["access"] = "admin";
            $model = $this->model('signup', 'check_Email');
            $result = $model->check($_POST["email"]);
            
            if($result['found']=='no'){

                $model = $this->model('signup', 'check_Username');
                $result2 = $model->check($_POST["username"]);

                if($result2['found']=='no'){

                    $signup = new Signup();
                    $call = $signup->addOwner(); 
                   
                }else{
                    $errorMessage = "Username already taken.";
                    $this->view('admin', 'admin', ['errorMessage' => $errorMessage]);
                }
            }else{
                $errorMessage = "Email already taken.";
                $this->view('admin', 'admin', ['errorMessage' => $errorMessage]);
            }
            
        }

        public function addInstructor()
        {
            
            $access=$_POST["access"];
            $model = $this->model('signup', 'check_Email');
            $result = $model->check($_POST["email"]);
            
            if($result['found']=='no'){

                $model = $this->model('signup', 'check_Username');
                $result2 = $model->check($_POST["trainer_username"]);

                if($result2['found']=='no'){

                    $signup = new Signup();
                    $call = $signup->addInstructor(); 
                   
                }else{

                    $errorMessage = "Username already taken.";

                    if($access=='admin'){
                        $this->view('admin', 'admin', ['errorMessage' => $errorMessage]);
                    }else{
                        $this->view('owner', 'owner', ['errorMessage' => $errorMessage]);

                    }
                
                }
            }else{
                $errorMessage = "Email already taken.";
                
                if($access=='admin'){
                    $this->view('admin', 'admin', ['errorMessage' => $errorMessage]);
                }else{
                    $this->view('owner', 'owner', ['errorMessage' => $errorMessage]);

                }
            }
            
        }

        public function addAdmin()
        {
 
            
            $model = $this->model('signup', 'check_Email');
            $result = $model->check($_POST["email"]);
            
            if($result['found']=='no'){

                $model = $this->model('signup', 'check_Username');
                $result2 = $model->check($_POST["admin_username"]);

                if($result2['found']=='no'){

                    $signup = new Signup();
                    $call = $signup->addAdmin(); 
                   
                }else{
                    $errorMessage = "Username already taken.";
                    $this->view('admin', 'admin', ['errorMessage' => $errorMessage]);
                }
            }else{
                $errorMessage = "Email already taken.";
                $this->view('admin', 'admin', ['errorMessage' => $errorMessage]);
            }
            
        }

        public function banUser()
        {
            $username =$_GET["username"] ;
            $email=$_GET["email"] ;

                $model = $this->model('admin','ban'); 
                $result = $model->user($username,$email); 
                
                if ($result['found']=='yes') {

                    $this->view('admin', 'admin');
                    echo "<script>alert('User - $username  has been Banned !');</script>";
                 
                    
                   
    
                }
             else {
                $this->view('admin', 'admin');
    
                echo "<script>alert('Error while ban');</script>";
            }
    
        }
    
        public function banGym()
        {
            $username =$_GET["username"] ;
            $email=$_GET["email"] ;

                $model = $this->model('admin','ban'); 
                $result = $model->gym($username,$email); 
                
                if ($result['found']=='yes') {
                    $this->view('admin', 'admin');
    
                    echo "<script>alert('Gym - $username  has been Banned !');</script>";
    
                }
             else {
                $this->view('admin', 'admin');
    
                echo "<script>alert('Error while ban');</script>";
            }
    
        }
        public function banInstructor()
        {
            $username =$_GET["username"] ;
            $email=$_GET["email"] ;

                $model = $this->model('admin','ban'); 
                $result = $model->instructorr($username,$email); 
                
                if ($result['found']=='yes') {
    
                    $this->view('admin', 'admin');
                    echo "<script>alert('Instructor - $username has been Banned !');</script>";
    
                }
             else {
    
                $this->view('admin', 'admin');
                echo "<script>alert('Error while ban');</script>";
            }
    
        }
        public function banAdmin()
        {
            $username =$_GET["username"] ;
            $email=$_GET["email"] ;

                $model = $this->model('admin','ban'); 
                $result = $model->admin($username,$email); 
                
                if ($result['found']=='yes') {
    
                    $this->view('admin', 'admin');
                    echo "<script>alert('Admin -$username  has been Banned !');</script>";
    
                }
             else {
    
                $this->view('admin', 'admin');
                echo "<script>alert('Error while ban');</script>";
            }
    
        }
/////

        public function unbanUser()
        {
            $username =$_GET["username"] ;
            $email=$_GET["email"] ;

                $model = $this->model('admin','unban'); 
                $result = $model->user($username,$email); 
                
                if ($result['found']=='yes') {

                    echo "<script>alert('User -$username  has been UnBanned !');</script>";
                    $this->view('admin', 'admin');

                }
            else {

                $this->view('admin', 'admin');
                echo "<script>alert('Error while Unban');</script>";
            }

        }

        public function unbanGym()
        {
            $username =$_GET["username"] ;
            $email=$_GET["email"] ;

                $model = $this->model('admin','unban'); 
                $result = $model->gym($username,$email); 
                
                if ($result['found']=='yes') {

                    $this->view('admin', 'admin');
                    echo "<script>alert('Gym - $username  has been UnBanned !');</script>";

                }
            else {

                $this->view('admin', 'admin');
                echo "<script>alert('Error while unban');</script>";
            }

        }
        public function unbanInstructor()
        {
            $username =$_GET["username"] ;
            $email=$_GET["email"] ;

                $model = $this->model('admin','unban'); 
                $result = $model->instructorr($username,$email); 
                
                if ($result['found']=='yes') {

                    $this->view('admin', 'admin');
                    echo "<script>alert('Instructor - $username  has been UnBanned !');</script>";

                }
            else {

                $this->view('admin', 'admin');
                echo "<script>alert('Error while unban');</script>";
            }

        }
        public function unbanAdmin()
        {
            $username =$_GET["username"] ;
            $email=$_GET["email"] ;

                $model = $this->model('admin','unban'); 
                $result = $model->admin($username,$email); 
                
                if ($result['found']=='yes') {

                    $this->view('admin', 'admin');
                    echo "<script>alert('Admin - $username  has been UnBanned !');</script>";

                }
            else {

                $this->view('admin', 'admin');
                echo "<script>alert('Error while unban');</script>";
            }

        }

/////
    
    public function deleteUser()
    {
        $username =$_GET["username"] ;
        $email=$_GET["email"] ;
        $file_name=$_GET['file'];


            $model = $this->model('admin','delete'); 
            $result = $model->user($username,$email,$file_name); 
            
            if ($result['found']=='yes') {

                echo "<script>alert('User -$username  has been Deleted !');</script>";
                $this->view('admin', 'admin');

            }
        else {

            $this->view('admin', 'admin');
            echo "<script>alert('Error while Delete');</script>";
        }

    }

    public function deleteGym()
    {
        $username =$_GET["username"] ;
        $email=$_GET["email"] ;
        $file_name=$_GET['file'];


            $model = $this->model('admin','delete'); 
            $result = $model->gym($username,$email,$file_name); 
            
            if ($result['found']=='yes') {

                echo "<script>alert('User -$username  has been Deleted !');</script>";
                $this->view('admin', 'admin');

            }
        else {

            $this->view('admin', 'admin');
            echo "<script>alert('Error while Delete');</script>";
        }

    }

    public function deleteInstructor()
    {
        $username =$_GET["username"] ;
        $email=$_GET["email"] ;
        $file_name=$_GET['file'];
        $access= $_GET['access'];


            $model = $this->model('admin','delete'); 
            $result = $model->instructor($username,$email,$file_name); 
            
            if ($result['found']=='yes') {

                if($access=='admin'){
                    $this->view('admin', 'admin');
                }else{
                    $this->view('owner', 'owner');
                }

                echo "<script>alert('User -$username  has been Deleted !');</script>";
               

            }
        else {

            if($access=='admin'){
                $this->view('admin', 'admin');
            }else{
                $this->view('owner', 'owner');
            }
            echo "<script>alert('Error while Delete');</script>";
        }

    }

    public function deleteAdmin()
    {
        $username =$_GET["username"] ;
        $email=$_GET["email"] ;
        $file_name=$_GET['file'];


            $model = $this->model('admin','delete'); 
            $result = $model->admin($username,$email,$file_name); 
            
            if ($result['found']=='yes') {

                echo "<script>alert('User -$username  has been Deleted !');</script>";
                $this->view('admin', 'admin');

            }
        else {

            $this->view('admin', 'admin');
            echo "<script>alert('Error while Delete');</script>";
        }

    }

    public function deletePost()
    {
        $id = $_GET['id'];
        $file_name=$_GET['file'];
        $gym_username = $_GET['gym_username'];
        $access= $_GET['access'];


            $model = $this->model('admin','delete'); 
            $result = $model->post($id,$gym_username,$file_name,$access); 
            
            if ($result['found']=='yes') {

                if($access=='admin'){
                    $this->view('admin', 'admin');
                }else{
                    $this->view('owner', 'owner');
                }

                echo "<script>alert('The post -$id  has been Deleted !');</script>";

            }
        else {

            if($access=='admin'){
                $this->view('admin', 'admin');
            }else{
                $this->view('owner', 'owner');
            }

            echo "<script>alert('Error while Deleting');</script>";
        }

    }

    public function deleteMaterial()
    {
        $id = $_GET['id'];
        $file_name=$_GET['file'];
        $gym_username = $_GET['gym_username'];
        $access = $_GET['access'];


            $model = $this->model('admin','delete'); 
            $result = $model->material($id,$file_name,$gym_username,$access); 
            
            if ($result['found']=='yes') {

                if($access=='admin'){
                    $this->view('admin', 'admin');
                }else{
                    $this->view('owner', 'owner');
                }

                echo "<script>alert('The material -$id  has been Deleted !');</script>";

            }
        else {

            if($access=='admin'){
                $this->view('admin', 'admin');
            }else{
                $this->view('owner', 'owner');
            }

            echo "<script>alert('Error while Deleting');</script>";
        }

    }



    public function editUser()
    { 
        
        $old_email = $_POST['old_email'];
        $old_username = $_POST['old_username'];
    
    
        $new_username = $_POST['username'];
        $new_email = $_POST['email'];
        $name = $_POST['name'];
        $contact =(int) $_POST['contact'];
        $location = $_POST['location'];
        
        $model = $this->model('admin','edit'); 
        $result = $model->user($new_username, $new_email, $name, $location, $contact, $old_email, $old_username); 

        if ($result['found']=='yes') {

            echo "<script>alert('User -$old_username  has been Edited !');</script>";
            $this->view('admin', 'admin');

        }
    else {

        $this->view('admin', 'admin');
        echo "<script>alert('Error while Editing User');</script>";
    }
        
        
    }

    public function editOwner()
    { 
        $old_email = $_POST['old_email'];
        $old_username = $_POST['old_username'];
        
        $new_username = $_POST['gym_username']; 
        $new_gym_name = $_POST['gym_name'];  
        $new_owner_name = $_POST['owner_name'];
        $new_email = $_POST['email'];
        $new_age = $_POST['age'];  
        $new_gender = $_POST['gender'];
        $new_location = $_POST['location'];
        $new_gym_contact = (int)$_POST['gym_contact']; 
        $new_owner_contact = (int)$_POST['owner_contact']; 
        $new_start_year = $_POST['start_year']; 
        $new_experience = $_POST['experience'];
        $new_web = $_POST['web'];
        $new_social = $_POST['social'];

        $model = $this->model('admin','edit'); 
        $result = $model->owner($new_username,$new_gym_name,$new_owner_name,$new_email,$new_age,$new_gender,$new_location,$new_gym_contact,
        $new_owner_contact,$new_start_year,$new_experience,$new_web,$new_social,$old_email,$old_username); 

        if ($result['found']=='yes') {

            $this->view('admin', 'admin');
            echo "<script>alert('Gym -$old_username  has been Edited !');</script>";
      

        }
    else {

        $this->view('admin', 'admin');
        echo "<script>alert('Error while Editing Owner');</script>";
    }
        
        
    }

    public function editInstructor()
    { 
        
        $gym_username = htmlspecialchars($_POST['gym_username']);
        $old_trainer_username = htmlspecialchars($_POST['old_trainer_username']);
        $old_email = htmlspecialchars($_POST['old_email']);
    
        $trainer_username = htmlspecialchars($_POST['trainer_username']);
        $trainer_name = htmlspecialchars($_POST['trainer_name']);
        $email = htmlspecialchars($_POST['email']);
        $age = htmlspecialchars($_POST['age']);
        $gender = htmlspecialchars($_POST['gender']);
        $location = htmlspecialchars($_POST['location']);
        $social = htmlspecialchars($_POST['social']);
        $contact = htmlspecialchars($_POST['contact']);
        $availability = htmlspecialchars($_POST['availability']);
        $qualify = htmlspecialchars($_POST['qualify']);
        $experience = htmlspecialchars($_POST['experience']);
        $special = htmlspecialchars($_POST['special']);

        $access = $_POST['access'];

        
        $model = $this->model('admin','edit'); 
        $result = $model->instructor($gym_username, $old_trainer_username, $old_email, $trainer_username, $trainer_name, $email, $age, $gender, $location, $social, $contact, $availability, $qualify, $experience, $special); 

        if ($result['found']=='yes') {

        
            if($access=='admin'){
                $this->view('admin', 'admin');
            }else{
                $this->view('owner', 'owner');
            }
            echo "<script>alert('Instuctor -$old_trainer_username  has been Edited !');</script>";
       

        }
    else {

        if($access=='admin'){
            $this->view('admin', 'admin');
        }else{
            $this->view('owner', 'owner');
        }
        echo "<script>alert('Error while Editing User');</script>";
    }
        
        
    }

    public function editMaterial()
    {

        $gym_username =$_POST['gym_username'];
        $id =$_POST['id'];
         
         $type = $_POST['type'];
         $title = $_POST['title'];
         $details = $_POST['details'];
     
         $file = $_FILES['file']; 
         $file_name = $_POST['old_file_name'];
     
         $access = $_POST['access']; 


            $model = $this->model('admin','edit'); 
            $result = $model->material($gym_username,$id,$type,$title,$details,$file,$file_name,$access); 
            
            if ($result['found']=='yes') {
                if($access=='admin'){
                    $this->view('admin', 'admin');
                }else{
                    $this->view('owner', 'owner');
                }
                echo "<script>alert('Material has been Edited !');</script>";
               

            }
        else {

            if($access=='admin'){
                $this->view('admin', 'admin');
            }else{
                $this->view('owner', 'owner');
            }
            echo "<script>alert('Error while Delete');</script>";
        }

    }


    public function editPost()
    {

        $gym_username = $_POST['gym_username'];
        $id =  $_POST['id'];
        
        $title = $_POST['title'];
        $details = $_POST['details'];
    
        $file = $_FILES['file']; 
        $file_name = $_POST['old_file_name'];
        $access=$_POST['access'];

            $model = $this->model('admin','edit'); 
            $result = $model->post($gym_username,$id,$title,$details,$file,$file_name,$access); 
            
            if ($result['found']=='yes') {

                if($access=='admin'){
                    $this->view('admin', 'admin');
                }else{
                    $this->view('owner', 'owner');
                }
                echo "<script>alert('Post has been Edited !');</script>";
                
             }
        else {

                if($access=='admin'){
                    $this->view('admin', 'admin');
                }else{
                    $this->view('owner', 'owner');
                }

            echo "<script>alert('Error while Delete');</script>";
        }

    }

    
}
