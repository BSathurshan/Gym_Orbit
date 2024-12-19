<?php 
class Login
{
	use Controller;

	public function index()
	{

		$this->view('login','login');
	}

	
	public function authenticate()
	{

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve POST data
            $username = $_POST["username"];
            $password = $_POST["password"];
            $type = $_POST["type"];

                // Load the model
                $model = $this->model('login', 'LoginModel');

                // Check if the model is loaded successfully
                if (!$model) {
                    die("Failed to load model."); // Handle the error gracefully
                }

                // Call the model method to check login details
                $result = $model->authenticateUser($username, $password, $type);

            if ($result) {
                // Store user session
                $_SESSION["username"] = $username;
                $_SESSION["userDetails"] = $result;

                // Redirect based on user type
                header("Location: " . ROOT . "/$type");
                exit();
            } else {
                echo "Invalid username or password";
            }
        }
    }

    
	public function logout()
	{

		$this->view('login','login');
	}

}