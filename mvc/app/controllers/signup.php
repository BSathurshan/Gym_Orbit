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
					$achieveChoice
				);
				

            if ($result) {

    
            } else {
               
            }
        }

	}


}