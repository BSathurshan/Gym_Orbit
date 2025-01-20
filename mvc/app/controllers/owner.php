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
    
    
}
?>