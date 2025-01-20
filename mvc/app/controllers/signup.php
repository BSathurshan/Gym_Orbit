<?php 
class Signup
{
	use Controller;

	public function index()
	{

		$this->view('signup','signup');
	}

    public function user()
	{

		$this->view('signup','signup_user');
	}

    public function owner()
	{

		$this->view('signup','signup_owner');
	}

	public function checkEmail()
	{
		if ($_SERVER["REQUEST_METHOD"] != "POST") {
			header('Content-Type: application/json');
			echo json_encode(["error" => "Invalid request method"]);
			exit;
		}
	
		// Decode incoming JSON data
		$data = json_decode(file_get_contents("php://input"), true);
		if (!$data || empty($data["email"])) {
			header('Content-Type: application/json');
			echo json_encode(["error" => "Email is required"]);
			exit;
		}
	
		// Load model and check email
		$model = $this->model('signup', 'check_Email');
		if (!$model) {
			header('Content-Type: application/json');
			echo json_encode(["error" => "Model load failure"]);
			exit;
		}
	
		// Perform email check
		$result = $model->check($data["email"]);
	
		// Respond with JSON
		header('Content-Type: application/json');
		echo json_encode($result['found'] == 'no');
		exit;
	}
	

	public function checkUsername()
	{
		if ($_SERVER["REQUEST_METHOD"] != "POST") {
			header('Content-Type: application/json');
			echo json_encode(["error" => "Invalid request method"]);
			exit;
		}
	
		// Decode incoming JSON data
		$data = json_decode(file_get_contents("php://input"), true);
		if (!$data || empty($data["username"])) {
			header('Content-Type: application/json');
			echo json_encode(["error" => "Username is required"]);
			exit;
		}
	
		// Load model and check email
		$model = $this->model('signup', 'check_Username');
		if (!$model) {
			header('Content-Type: application/json');
			echo json_encode(["error" => "Model load failure"]);
			exit;
		}
	
		// Perform email check
		$result = $model->check($data["username"]);
	
		// Respond with JSON
		header('Content-Type: application/json');
		echo json_encode($result['found'] == 'no');
		exit;
	}

	public function addUser()
	{

		if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $name = $_POST["name"];
			$email = $_POST["email"];
			$username = $_POST["username"];
			$password = $_POST["password"];
			$type = $_POST["type"];
			$file = $_FILES["file"];
			$age = $_POST["age"];
			$contact = $_POST["contact"];
			$location = $_POST["location"];
			$health = $_POST["health"];
			$gender = $_POST["gender"];
			$activeMode = $_POST["activeMode"];
			$goalChoice = $_POST["goalChoice"];
			$achieveChoice = $_POST["achieveChoice"];
			$access= $_POST["access"];

				$model = $this->model('signup', 'add_User');
                if (!$model) {
                    die("Failed to load model."); 
                }
				$result = $model->submit(
					$name,
					$email,
					$username,
					$password,
					$type,
					$file,
					$age,
					$contact,
					$location,
					$health,
					$gender,
					$activeMode,
					$goalChoice,
					$achieveChoice,
					$access
				);
				

			if($access=='normal'){
           
				if ($result) {

				$this->view('login','login');

				echo "<script>alert('Account created successfully , Login now !.');</script>";
    
            } else {
               
				echo "<script>alert('Failed to create the account , Try again !.');</script>";
            }
		   }
		   elseif($access=='admin'){

			if ($result) {

				$this->view('admin','admin');
				echo "<script>alert('User Account created successfully !.');</script>";
				
            } else {
               
				echo "<script>alert('Failed to create the account , Try again !.');</script>";
            }
		   }
        }

	}

	public function addOwner()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
			$access= $_POST["access"];
			// Slide 1: Basic Information
			$name = $_POST["owner_name"];
			$email = $_POST["email"];
			$username = $_POST["username"];
			$password = $_POST["password"];
			$type = $_POST["type"];
	
			// Slide 2: File Upload
			$file = $_FILES["file"];
	
			// Slide 3: Links
			$web = $_POST["web"];
			$social = $_POST["social"];
	
			// Slide 4: Other Information
			$gym_name = $_POST["gym_name"];
			$owner_contact = $_POST["owner_contact"];
			$gym_contact = $_POST["gym_contact"];
			$start_year = $_POST["start_year"];
			$experience = $_POST["experience"];
			$location = $_POST["location"];
			$age = $_POST["age"];
			$gender = $_POST["gender"];
	

			$model = $this->model('signup', 'add_Owner');
			if (!$model) {
				die("Failed to load model."); 
			}
	
			$result = $model->submit(
				$name,
				$email,
				$username,
				$password,
				$type,
				$file,
				$age,
				$gym_contact,
				$location,
				$gender,
				$web,
				$social,
				$gym_name,
				$owner_contact,
				$start_year,
				$experience
			);
	
			if($access=='normal'){
           
				if ($result) {

				$this->view('login','login');

				echo "<script>alert('Account created successfully , Login now !.');</script>";
    
            } else {
               
				echo "<script>alert('Failed to create the account , Try again !.');</script>";
            }
		   }
		   elseif($access=='admin'){

			if ($result) {

				$this->view('admin','admin');
				echo "<script>alert('Gym Account created successfully !.');</script>";
				
            } else {
               
				echo "<script>alert('Failed to create the account , Try again !.');</script>";
            }
		   }
		}
	}

	public function addInstructor()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
			$access= $_POST["access"];
			$gym_username = $_POST['gym_username'];
			$trainer_username = $_POST['trainer_username'];
			$trainer_name = $_POST['trainer_name'];
			$email = $_POST['email'];
			$age = $_POST['age'];

			$password = $_POST['password'];
			$gender = $_POST['gender'];
			$location = $_POST['location'];
			$social = $_POST['social'];

			$contact = $_POST['contact'];
			$availability = $_POST['availability'];
			$qualify = $_POST['qualify'];
			$experience = $_POST['experience'];
			$special = $_POST['special'];

			$file = $_FILES['file'];

			$model = $this->model('signup', 'add_Instructor');
			if (!$model) {
				die("Failed to load model."); 
			}
	
			$result = $model->submit(
				$access,
				$gym_username,
				$trainer_username,
				$trainer_name,
				$email,
				$age,
				$password,
				$gender,
				$location,
				$social,
				$contact,
				$availability,
				$qualify,
				$experience,
				$special,
				$file

			);
	
			if($access=='owner'){
           
				if ($result) {

				$this->view('owner','owner');

				echo "<script>alert('Instructor Account created successfully , Login now !.');</script>";
    
            } else {
               
				echo "<script>alert('Failed to create the account , Try again !.');</script>";
            }
		   }
		   elseif($access=='admin'){

			if ($result) {

				$this->view('admin','admin');
				echo "<script>alert('Instructor Account created successfully !.');</script>";
				
            } else {
               
				echo "<script>alert('Failed to create the account , Try again !.');</script>";
            }
		   }
		}
	}
	
	public function addAdmin()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			$admin_username = $_POST['admin_username'];
            $admin_name = $_POST['admin_name'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $password = $_POST['password'];
            $gender = $_POST['gender'];
            $location = $_POST['location'];
            $contact = $_POST['contact'];
            $type = $_POST['type'] ; 
            $file = $_FILES['file'];

			$model = $this->model('signup', 'add_Admin');
			if (!$model) {
				die("Failed to load model."); 
			}
	
			$result = $model->submit(
				$admin_username,
				$admin_name,
				$email,
				$age,
				$password,
				$gender,
				$location,
				$contact,
				$type,
				$file
			);
	
			if ($result) {

				$this->view('admin','admin');
				echo "<script>alert('Admin Account created successfully !.');</script>";
				
            } else {
               
				$this->view('admin','admin');
				echo "<script>alert('Failed to create the account , Try again !.');</script>";
            }
		   
		}
	}


}