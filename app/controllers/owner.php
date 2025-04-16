<?php 
  require_once '../app/controllers/admin.php';

class Owner
{
    use Controller;

    public function index()
    {
        $this->view('owner', 'owner');
    }



    public function get_posts($username)
    {
        if (!empty($username)) {

            $model = $this->model('owner','posts'); 
            $result = $model->get($username); 
            
            if ($result['found']=='yes') {

                return ['found' => 'yes' ,'result' => $result['result']];

            }
            elseif($result['found']=='no'){

                return ['found' => 'no'];

            }
        } else {

            echo "<script>alert('Missing gym's username (get_posts).');</script>";
        }
    }

    public function get_instructors($username)
    {
        if (!empty($username)) {

            $model = $this->model('owner','instructor'); 
            $result = $model->get($username); 
            
            if ($result['found']=='yes') {

                return ['found' => 'yes' ,'result' => $result['result']];

            }
            elseif($result['found']=='no'){

                return ['found' => 'no'];

            }
        } else {

            echo "<script>alert('Missing gym's username (get_instructors).');</script>";
        }

    }

    public function get_reminders($username)
    {
        if (!empty($username)) {

            $model = $this->model('owner','reminders'); 
            $result = $model->get($username); 
            
            if ($result['found']=='yes') {

                return ['found' => 'yes' ,'result' => $result['result']];

            }
            elseif($result['found']=='no'){

                return ['found' => 'no'];

            }
        } else {

            echo "<script>alert('Missing gym's username (get_instructors).');</script>";
        }

    }

    public function get_materials($username)
    {
        if (!empty($username)) {

            $model = $this->model('owner','materials'); 
            $result = $model->get($username); 
            
            if ($result['found']=='yes') {

                return ['found' => 'yes' ,'result' => $result['result']];

            }
            elseif($result['found']=='no'){

                return ['found' => 'no'];

            }
        } else {

            echo "<script>alert('Missing gym's username (get_materials).');</script>";
        }

    }

    public function get_requests($username)
    {
        if (!empty($username)) {

            $model = $this->model('owner','requests'); 
            $result = $model->get($username); 
            
            if ($result['found']=='yes') {

                return ['found' => 'yes' ,'result' => $result['result']];

            }
            elseif($result['found']=='no'){

                return ['found' => 'no'];

            }
        } else {

            echo "<script>alert('Missing gym's username (get_requests).');</script>";
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


    public function get_members($username)
    {
        if (!empty($username)) {

            $model = $this->model('owner','members'); 
            $result = $model->get($username); 
            
            if ($result['found']=='yes') {

                return ['found' => 'yes' ,'result' => $result['result']];

            }
            elseif($result['found']=='no'){

                return ['found' => 'no'];

            }
        } else {

            echo "<script>alert('Missing gym's username (get_members).');</script>";
        }

    }

    public function addPost()
    {
            $gym_username = $_POST['gym_username'];
            $id=uniqid();
            $title = $_POST['title'];
            $file = $_FILES['file'];
            $details = $_POST['details'];
            $gym_name=$_POST['gym_name'];
            $file_name=NULL;
        

            $model = $this->model('owner','posts'); 
            $result = $model->add($gym_username,$id,$title,$file,$details,$gym_name,$file_name); 
            
            if ($result['found']=='yes') {

                $this->view('owner', 'owner');
                echo "<script>alert('Post has been Added !');</script>";

            }
            elseif($result['found']=='no'){

                $this->view('owner', 'owner');
                echo "<script>alert('Error while Adding');</script>";

            }
        }

        public function deletePost()
        {

            $reuse = new Admin();               
            $call = $reuse->deletePost(); 

        }
        public function editPost()
        {

            $reuse = new Admin();               
            $call = $reuse->editPost(); 

        }

        public function addMaterials()
        {

            $gym_username = $_POST['gym_username'];
            $id=uniqid();
            $type= $_POST['type'];
            $title = $_POST['title'];
            $file = $_FILES['file'];
            $details = $_POST['details'];
            $gym_name=$_POST['gym_name'];
            $file_name=NULL;
    
                $model = $this->model('owner','materials'); 
                $result = $model->add($gym_username,$id,$type,$title,$file,$details,$gym_name,$file_name); 
                
                if ($result['found']=='yes') {
    
                    $this->view('owner', 'owner');
                    echo "<script>alert('Material has been Added !');</script>";
    
                }
                elseif($result['found']=='no'){
    
                    $this->view('owner', 'owner');
                    echo "<script>alert('Error while Adding');</script>";
    
                }
            }
            public function deleteMaterial()
            {
    
                $reuse = new Admin();               
                $call = $reuse->deleteMaterial(); 
    
            }
            public function editMaterial()
            {
    
                $reuse = new Admin();               
                $call = $reuse->editMaterial(); 
    
            }

            public function addMachine()
            {
    
                $gym_username = $_POST['gym_username'];
                $name = $_POST['name'];
                $file = $_FILES['file'];
                $file_name=NULL;
        
                    $model = $this->model('owner','machines'); 
                    $result = $model->add($gym_username,$name,$file,$file_name); 
                    
                    if ($result['found']=='yes') {
        
                        $this->view('owner', 'owner');
                        echo "<script>alert('Machine has been Added !');</script>";
        
                    }
                    elseif($result['found']=='no'){
        
                        $this->view('owner', 'owner');
                        echo "<script>alert('Error while Adding !');</script>";
        
                    }elseif($result['found']=='alert'){
        
                        $this->view('owner', 'owner');
                        echo "<script>alert('Machine name already in use !');</script>";
        
                    }
            }
        public function deleteMachine()
        {

            $name = $_GET['name'];
            $file = $_GET['file'];
            $gym_username = $_GET['gym_username'];
    
                $model = $this->model('owner','machines'); 
                $result = $model->delete($name ,$file ,$gym_username); 
                
                if ($result['found']=='yes') {
    
                    $this->view('owner', 'owner');
                    echo "<script>alert('Material has been deleted !');</script>";
    
                }
                elseif($result['found']=='no'){
    
                    $this->view('owner', 'owner');
                    echo "<script>alert('Error while Deleting');</script>";
    
                }
        }

        public function editMachine()
        {

            $gym_username = $_POST['gym_username'];
            $old_name = $_POST['old_name'];
            $old_file = $_POST['old_file'];
            $new_name = $_POST['name'];
            $file = $_FILES['file'];

    
                $model = $this->model('owner','machines'); 
                $result = $model->edit($gym_username,$old_name,$old_file,$new_name,$file); 
                
                if ($result['found']=='yes') {
    
                    $this->view('owner', 'owner');
                    echo "<script>alert('Machine has been edited !');</script>";
    
                }
                elseif($result['found']=='no'){
    
                    $this->view('owner', 'owner');
                    echo "<script>alert('Error while Editing ');</script>";
    
                }
        }

        public function addInstructor()
        {

            $reuse = new Admin();               
            $call = $reuse->addInstructor(); 

        }

        public function deleteInstructor()
        {

            $reuse = new Admin();               
            $call = $reuse->deleteInstructor(); 

        }

        public function editInstructor()
        {

            $reuse = new Admin();               
            $call = $reuse->editInstructor(); 

        }

        
    public function removeMember()
    {

        $gym_username = $_GET['gym_username'];
        $username = $_GET['username'];

            $model = $this->model('owner','members'); 
            $result = $model->remove( $gym_username,$username ); 
            
            if ($result['found']=='yes') {

                $this->view('owner', 'owner');
                echo "<script>alert('Member has been Removed !');</script>";

            }
            elseif($result['found']=='no'){

                $this->view('owner', 'owner');
                echo "<script>alert('Error while Removing');</script>";

            }
        }

        public function processRequest()
        {
            $state=$_GET['state'];
            $trainer_username = $_GET['trainer_username'];
            $trainer_name=$_GET['trainer_name'];
            $name=$_GET['name'];
            $username =$_GET['username'];
            $gym_username =$_GET['gym_username'];

    
            if($state=='accept'){
                $model = $this->model('owner','requests'); 
                $result = $model->accept( $trainer_username,$trainer_name,$name,$username,$gym_username); 
            }
            elseif($state=='reject'){

                $model = $this->model('owner','requests'); 
                $result = $model->reject( $trainer_username,$trainer_name,$username,$gym_username); 

            }                
                if ($result['found']=='yes1') {
    
                    $this->view('owner', 'owner');
                    echo "<script>alert('The request has been made by -$username Aceepted !');</script>";
    
                }
                elseif($result['found']=='no1'){
    
                    $this->view('owner', 'owner');
                    echo "<script>alert('Error while Accepting');</script>";
    
                }

                elseif ($result['found']=='yes2') {
    
                    $this->view('owner', 'owner');
                    echo "<script>alert('The request has been made by -$username Rejected !');</script>";
    
                }
                elseif($result['found']=='no2'){
    
                    $this->view('owner', 'owner');
                    echo "<script>alert('Error while Rejecting');</script>";
    
                }
            }

            public function getSupport()
            {
        
                $issue = htmlspecialchars($_POST['issue']);
                $message = htmlspecialchars($_POST['details']);
                $username = htmlspecialchars($_POST['username']);
                $role = 'owner';
                $email= $_POST['email']; 

                    $model = $this->model('support','support'); 
                    $result = $model->submit($issue,$message,$username,$role,$email); 
                    
                    if ($result['found']=='yes') {
        
                        $this->view('owner', 'owner');
                        echo "<script>alert('Supoort ticket has been submitted !');</script>";
        
                    }
                    elseif($result['found']=='no'){
        
                        $this->view('owner', 'owner');
                        echo "<script>alert('Error while getting support');</script>";
        
                    }
                }
                
            public function editInstructorSchedule()
            {

                
                if (session_status() == PHP_SESSION_NONE) {
                    session_start(); // Start session only if it's not already started
                }
            
                if (!isset($_SESSION['username'])) {
                    echo json_encode(["success" => false, "error" => "User not logged in"]);
                    return;
                }
                $gym_username = $_SESSION['username'];
                $trainer_username=$_POST['trainer_username'];
                $email=$_POST['email'];
                $trainer_name=$_POST['trainer_name'];
                $instructorScheduleJson = $_POST['instructor-schedule-data'];
                $instructorScheduleArray = json_decode($instructorScheduleJson, true);

                $model = $this->model('owner','instructorSchedule'); 
                $result = $model->set($gym_username,$trainer_username,$instructorScheduleArray); 
                
                if ($result['found']=='yes') {
    
                    $this->view('owner', 'owner');
                    echo "<script>alert('$trainer_name's schedule has been updated !');</script>";
    
                }
                elseif($result['found']=='no'){
    
                    $this->view('owner', 'owner');
                    echo "<script>alert('Error while updating schedule');</script>";
    
                }

            
            }


            public function editGymSchedule()
            {
    
                if (session_status() == PHP_SESSION_NONE) {
                    session_start(); // Start session only if it's not already started
                }
            
                if (!isset($_SESSION['username'])) {
                    echo json_encode(["success" => false, "error" => "User not logged in"]);
                    return;
                }
                $gym_username = $_SESSION['username'];

                $scheduleJson = $_POST['schedule_data'];
                $scheduleArray = json_decode($scheduleJson, true);
    
                $model = $this->model('owner','gymSchedule'); 
                $result = $model->set($gym_username,$scheduleArray); 
                
                if ($result['found']=='yes') {
    
                    $this->view('owner', 'owner');
                    echo "<script>alert('Your schedule has been updated !');</script>";
    
                }
                elseif($result['found']=='no'){
    
                    $this->view('owner', 'owner');
                    echo "<script>alert('Error while updating schedule');</script>";
    
                }

            
            }

/*calendar*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            public function updateAvailability() {

                if (session_status() == PHP_SESSION_NONE) {
                    session_start(); // Start session only if it's not already started
                }
            
                if (!isset($_SESSION['username'])) {
                    echo json_encode(["success" => false, "error" => "User not logged in"]);
                    return;
                }

                // Get JSON data from the request body
                $jsonData = file_get_contents("php://input");
                $data = json_decode($jsonData, true);
        
               $username = $_SESSION['username'];

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
            
                if (!isset($_SESSION['username'])) {
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
               // $username = $_SESSION['username'];
               $username='01';

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

            public function reports() {
                $nofModel = $this->model('Nof');
            
                // Assuming you store the logged-in gym's username in session
                $gymUsername = $_SESSION['gym_username'] ?? null;
            
                if ($gymUsername === null) {
                    $this->view('owner', 'reports', [
                        'membershipReport' => ['found' => 'no']
                    ]);
                    return;
                }
            
                $membershipReport = $nofModel->getMembershipReport($gymUsername);
            
                $this->view('owner', 'reports', [
                    'membershipReport' => $membershipReport
                ]);
            }
            
            
            
            
            
            
            public function getSavedColors() {
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start(); // Start session only if it's not already started
                    }
                
                    if (!isset($_SESSION['username'])) {
                        header('Content-Type: application/json');
                        echo json_encode(["success" => false, "error" => "User not logged in"]);
                        return;
                    }
                
                    $username = $_SESSION['username'];
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
                        if (!isset($_SESSION['username'])) {
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
                    
                        $username = $_SESSION['username'];
                        $model = $this->model('owner', 'calendar');
                        $result = $model->saveNote($data['id'], $data['content'], $data['date'], $username);
                    
                        header('Content-Type: application/json');
                        echo json_encode($result ? ["success" => true] : ["success" => false, "error" => "Failed to save note"]);
            }
            
            public function deleteNote() {
                        if (session_status() == PHP_SESSION_NONE) {
                            session_start();
                        }
                        if (!isset($_SESSION['username'])) {
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
                    
                        $username = $_SESSION['username'];
                        $model = $this->model('owner', 'calendar');
                        $result = $model->deleteNote($data['id'], $username);
                    
                        header('Content-Type: application/json');
                        echo json_encode($result ? ["success" => true] : ["success" => false, "error" => "Failed to delete note"]);
            }
            
            public function getNotes() {
                        if (session_status() == PHP_SESSION_NONE) {
                            session_start();
                        }
                        if (!isset($_SESSION['username'])) {
                            header('Content-Type: application/json');
                            echo json_encode(["success" => false, "error" => "User not logged in"]);
                            return;
                        }
                    
                        $username = $_SESSION['username'];
                        $model = $this->model('owner', 'calendar');
                        $notes = $model->getNotes($username);
                    
                        header('Content-Type: application/json');
                        echo json_encode($notes);
            }
}
?>