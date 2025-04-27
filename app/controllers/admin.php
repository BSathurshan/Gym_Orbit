<?php 
  require_once '../app/controllers/signup.php';
  require_once '../app/controllers/email.php';
  
class Admin 
{
    use Controller;
    public function index()
    {
        $this->view('admin', 'admin');
    }

    public function get_dashboard_data()
    {
        $model = $this->model('admin', 'dashboard');
        $result = $model->get();

        if ($result['found'] == 'yes') {
            return ['found' => 'yes', 'result' => $result['result']];
        } elseif ($result['found'] == 'no') {
            return ['found' => 'no'];
        }
    }

    public function get_report_data(){
        $model = $this->model('admin', 'report');
        $reportData = [];

        $reportData['expiredMemberCount'] = $model->getExpiredMemberCount();
        $reportData['activeMemberGenderCounts'] = $model->getActiveMemberGenderCounts();
        $reportData['totalInstructorCount'] = $model->getTotalInstructorCount();
        $reportData['activeInstructorCount'] = $model->getActiveInstructorCount();
        $reportData['revenueByGym'] = $model->getRevenueByGym();
        $reportData['monthlyIncome'] = $model->getMonthlyIncome();

        return $reportData;
    }

    public function get_payment_records(){
        $model = $this->model('admin', 'paymentRecords');
        $result = $model->get();

        if ($result['found'] == 'yes') {
            return ['found' => 'yes', 'result' => $result['result']];
        } elseif ($result['found'] == 'no') {
            return ['found' => 'no'];
        }
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
            $status = "error";
            $message = "Missing gym's username (get_messages).";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
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
            $status = "error";
            $message = "Missing gym's username (get_reminders).";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
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
            $status = "error";
            $message = "Missing gym's username (get_materials).";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
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
            $status = "error";
            $message = "Missing gym's username (get_posts).";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
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
                $status = "error";
                $message = "Username already taken.";
                $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
            }
        }else{
            $status = "error";
            $message = "Email already taken.";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
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
                $status = "error";
                $message = "Username already taken.";
                $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
            }
        }else{
            $status = "error";
            $message = "Email already taken.";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
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
                $status = "error";
                $message = "Username already taken.";
                if($access=='admin'){
                    $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
                }else{
                    $this->view('owner', 'owner', ['message' => $message, 'status' => $status]);
                }
            }
        }else{
            $status = "error";
            $message = "Email already taken.";
            if($access=='admin'){
                $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
            }else{
                $this->view('owner', 'owner', ['message' => $message, 'status' => $status]);
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
                $status = "error";
                $message = "Username already taken.";
                $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
            }
        }else{
            $status = "error";
            $message = "Email already taken.";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
        }
    }

    public function banUser()
    {
        $username =$_GET["username"] ;
        $email=$_GET["email"] ;

        $model = $this->model('admin','ban'); 
        $result = $model->user($username,$email); 
        
        if ($result['found']=='yes') {
            $status = "success";
            $message = "User - $username has been banned!";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
        }
        else {
            $status = "error";
            $message = "Error while banning user.";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
        }
    }

    public function banGym()
    {
        $username =$_GET["username"] ;
        $email=$_GET["email"] ;

        $model = $this->model('admin','ban'); 
        $result = $model->gym($username,$email); 
        
        if ($result['found']=='yes') {
            $status = "success";
            $message = "Gym - $username has been banned!";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
        }
        else {
            $status = "error";
            $message = "Error while banning gym.";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
        }
    }

    public function banInstructor()
    {
        $username =$_GET["username"] ;
        $email=$_GET["email"] ;

        $model = $this->model('admin','ban'); 
        $result = $model->instructor($username,$email); 
        
        if ($result['found']=='yes') {
            $status = "success";
            $message = "Instructor - $username has been banned!";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
        }
        else {
            $status = "error";
            $message = "Error while banning instructor.";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
        }
    }

    public function banAdmin()
    {
        $username =$_GET["username"] ;
        $email=$_GET["email"] ;

        $model = $this->model('admin','ban'); 
        $result = $model->admin($username,$email); 
        
        if ($result['found']=='yes') {
            $status = "success";
            $message = "Admin - $username has been banned!";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
        }
        else {
            $status = "error";
            $message = "Error while banning admin.";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
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
            $status = "success";
            $message = "User - $username has been unbanned!";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
        }
        else {
            $status = "error";
            $message = "Error while unbanning user.";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
        }
    }

    public function unbanGym()
    {
        $username =$_GET["username"] ;
        $email=$_GET["email"] ;

        $model = $this->model('admin','unban'); 
        $result = $model->gym($username,$email); 
        
        if ($result['found']=='yes') {
            $status = "success";
            $message = "Gym - $username has been unbanned!";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
        }
        else {
            $status = "error";
            $message = "Error while unbanning gym.";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
        }
    }

    public function unbanInstructor()
    {
        $username =$_GET["username"] ;
        $email=$_GET["email"] ;

        $model = $this->model('admin','unban'); 
        $result = $model->instructor($username,$email); 
        
        if ($result['found']=='yes') {
            $status = "success";
            $message = "Instructor - $username has been unbanned!";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
        }
        else {
            $status = "error";
            $message = "Error while unbanning instructor.";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
        }
    }

    public function unbanAdmin()
    {
        $username =$_GET["username"] ;
        $email=$_GET["email"] ;

        $model = $this->model('admin','unban'); 
        $result = $model->admin($username,$email); 
        
        if ($result['found']=='yes') {
            $status = "success";
            $message = "Admin - $username has been unbanned!";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
        }
        else {
            $status = "error";
            $message = "Error while unbanning admin.";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
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
            $status = "success";
            $message = "User - $username has been deleted!";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
        }
        else {
            $status = "error";
            $message = "Error while deleting user.";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
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
            $status = "success";
            $message = "User - $username has been deleted!";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
        }
        else {
            $status = "error";
            $message = "Error while deleting gym.";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
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
            $status = "success";
            $message = "User - $username has been deleted!";
            if($access=='admin'){
                $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
            }else{
                $this->view('owner', 'owner', ['message' => $message, 'status' => $status]);
            }
        }
        else {
            $status = "error";
            $message = "Error while deleting instructor.";
            if($access=='admin'){
                $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
            }else{
                $this->view('owner', 'owner', ['message' => $message, 'status' => $status]);
            }
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
            $status = "success";
            $message = "User - $username has been deleted!";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
        }
        else {
            $status = "error";
            $message = "Error while deleting admin.";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
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
            $status = "success";
            $message = "The post - $id has been deleted!";
            if($access=='admin'){
                $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
            }else{
                $this->view('owner', 'owner', ['message' => $message, 'status' => $status]);
            }
        }
        else {
            $status = "error";
            $message = "Error while deleting post.";
            if($access=='admin'){
                $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
            }else{
                $this->view('owner', 'owner', ['message' => $message, 'status' => $status]);
            }
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
            $status = "success";
            $message = "The material - $id has been deleted!";
            if($access=='admin'){
                $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
            }else{
                $this->view('owner', 'owner', ['message' => $message, 'status' => $status]);
            }
        }
        else {
            $status = "error";
            $message = "Error while deleting material.";
            if($access=='admin'){
                $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
            }else{
                $this->view('owner', 'owner', ['message' => $message, 'status' => $status]);
            }
        }
    }

    public function deleteMessage()
    {
        $username = $_GET['username'];
        $issue = $_GET['issue'];
        $message = $_GET['message'];
        $time = $_GET['time'];

        $model = $this->model('admin', 'delete'); 
        $result = $model->message($username, $issue, $message, $time); 
        
        $access = $_SESSION['access'] ?? 'admin';

        if ($result['found'] == 'yes') {
            $status = "success";
            $message = "The message has been deleted!";
            $this->view($access, $access, ['message' => $message, 'status' => $status]);
        } else {
            $status = "error";
            $message = "Error while deleting message.";
            $this->view($access, $access, ['message' => $message, 'status' => $status]);
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
            $status = "success";
            $message = "User - $old_username has been edited!";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
        }
        else {
            $status = "error";
            $message = "Error while editing user.";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
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
            $status = "success";
            $message = "Gym - $old_username has been edited!";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
        }
        else {
            $status = "error";
            $message = "Error while editing owner.";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
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
            $status = "success";
            $message = "Instructor - $old_trainer_username has been edited!";
            if($access=='admin'){
                $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
            }else{
                $this->view('owner', 'owner', ['message' => $message, 'status' => $status]);
            }
        }
        else {
            $status = "error";
            $message = "Error while editing instructor.";
            if($access=='admin'){
                $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
            }else{
                $this->view('owner', 'owner', ['message' => $message, 'status' => $status]);
            }
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
            $status = "success";
            $message = "Material has been edited!";
            if($access=='admin'){
                $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
            }else{
                $this->view('owner', 'owner', ['message' => $message, 'status' => $status]);
            }
        }
        else {
            $status = "error";
            $message = "Error while editing material.";
            if($access=='admin'){
                $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
            }else{
                $this->view('owner', 'owner', ['message' => $message, 'status' => $status]);
            }
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
            $status = "success";
            $message = "Post has been edited!";
            if($access=='admin'){
                $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
            }else{
                $this->view('owner', 'owner', ['message' => $message, 'status' => $status]);
            }
        }
        else {
            $status = "error";
            $message = "Error while editing post.";
            if($access=='admin'){
                $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
            }else{
                $this->view('owner', 'owner', ['message' => $message, 'status' => $status]);
            }
        }
    }

    public function getNof_Users(){
        $model = $this->model('admin','nof');
        $nof = $model->nofUsers();
        if($nof['found']=='yes'){
            return['found'=>'yes','result'=>$nof['result']];
        }
        elseif($nof['found']=='no'){
            return['found'=>'no'];
        }
    }

    public function getNof_Owners(){
        $model = $this->model('admin','nof');
        $nof = $model->nofOwners();
        if($nof['found']=='yes'){
            return['found'=>'yes','result'=>$nof['result']];
        }
        elseif($nof['found']=='no'){
            return['found'=>'no'];
        }
    }

    public function getNof_Instructors(){
        $model = $this->model('admin','nof');
        $nof = $model->nofInstructors();
        if($nof['found']=='yes'){
            return['found'=>'yes','result'=>$nof['result']];
        }
        elseif($nof['found']=='no'){
            return['found'=>'no'];
        }
    }

    public function replyMessage()
    {
        $email = htmlspecialchars($_POST['email']);
        $username = htmlspecialchars($_POST['username']);

        $issue = htmlspecialchars($_POST['issue']);
        $message = htmlspecialchars($_POST['message']);
        $reply = htmlspecialchars($_POST['replyMessage']);
        $role = 'admin';
    
        // Load model from admin/messages.php
        $model = $this->model('admin', 'messages');
        $result = $model->reply($username, $email ,$issue,$message ,$reply ,$role);
    
        if ($result['found'] == 'yes') {
            $userEmail=$email;
            $subject='Your ticket has been updated';
            $message = "Hi $username,<br><br>$reply";
            $files = [ ];           
            foreach ($files as $f) {
                if (!file_exists($f)) {
                    $jsLog = "console.log('File not found: " . addslashes($f) . "');";
                    echo "<script>$jsLog</script>";
                }
            }
            $emailService = new Email();
            $response = $emailService->send($userEmail, $message, $subject,$files);

            if ($response) {
                $status = "success";
                $message = "Reply sent to $userEmail.";
            } else {
                $status = "error";
                $message = "Mailer Error: Failed to send email.";
            }
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
        } elseif($result['found'] == 'alert') {
            $status = "error";
            $message = "Support status update failed.";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
        } else {
            $status = "error";
            $message = "Error while sending reply.";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
        }
    }

    public function closeSupport()
    {
        $username = $_GET['username'];        
        $time = $_GET['time']; 
    
        $model = $this->model('admin', 'messages'); 
        $result = $model->closeSupport($username,$time); 
        
        if ($result) {
            $status = "success";
            $message = "The support has been closed!";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
        } else {
            $status = "error";
            $message = "Error while closing support.";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
        }
    }

    public function getRecent_Users(){
        $model = $this->model('admin','nof');
        $users = $model->recentUsers();
        return $users;
    }

    public function reminderUpdate(){
        $username = $_POST['username'];
        $category=$_POST['category'];
        $title = $_POST['title'];
        $start = $_POST['start'];
        $end = $_POST['end'];

        $model = $this->model('admin','reminders');
        $result = $model->update( $username ,$category,$title,$start,$end);
        
        if ($result) {
            $status = "success";
            $message = "Reminder updated!";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
        }else{
            $status = "error";
            $message = "Reminder addition failed!";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
        }
    }

    public function dbBackup(){
        $username = $_POST['username'];
        $password=$_POST['password'];

        if (!isset($_SESSION['userDetails']['password'])) {
            header('Content-Type: application/json');
            echo json_encode(["success" => false, "error" => "User not logged in"]);
            return;
        }

        $correctPassword=$_SESSION['userDetails']['password'];
        
        if($correctPassword==$password){
            $model = $this->model('backup','backup');
            $result = $model->getBackup();
            
            if ($result) {
                $status = "success";
                $message = "Database backup success!";
                $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
            }else{
                $status = "error";
                $message = "Database backup failed!";
                $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
            }
        }else{
            $status = "error";
            $message = "Password mismatch!";
            $this->view('admin', 'admin', ['message' => $message, 'status' => $status]);
        }
    }
}
    
    // public function getPending_Gyms(){
    //     $model = $this->model('admin','nof');
    //     $pending = $model->pendingGyms();
    //     return $pending;
    // }

    // public function getGenderDistribution($gym_username) {
    //     $model = $this->model('admin', 'nof');
    //     $genderData = $model->getGenderDistribution($gym_username);
    //     return $genderData;
    // }