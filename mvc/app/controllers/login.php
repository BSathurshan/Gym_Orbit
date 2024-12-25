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

                // Load the model
                $model = $this->model('login', 'LoginModel');

                // Check if the model is loaded successfully
                if (!$model) {
                    die("Failed to load model."); // Handle the error gracefully
                }

                // Call the model method to check login details
                $result = $model->authenticateUser($username, $password);
                $errorMessage = null;

            if ($result['found']=='yes'&&$result['ban']=='no') {

                // Store user session
                $_SESSION["username"] = $username;
                $_SESSION["userDetails"] = $result['details'];
                $type = $result['type'];

                // Redirect based on user type
                $this->view($type,$type);
                exit();

            }elseif($result['found']=='yes'&&$result['ban']=='yes') {

                $errorMessage = "Client account has been banned.";
    
            }elseif($result['found']=='no'){

                $errorMessage = "Invalid username or password.";

            }
            
            $this->view('login', 'login', ['errorMessage' => $errorMessage]);
        }
    }

    
	public function logout()
	{

		$this->view('login','login');
	}

}