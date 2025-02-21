<?php 
class Home
{
	use Controller;

	public function index()
	{

		$this->view('home','home');
	}

    public function features()
    {
        $this->view('home','features');
    }


    public function services()
    {
        $this->view('home','services');
    }


    public function about()
    {
        $this->view('home','about');
    }


    public function support()
    {
        $this->view('home','support');
    }

    public function getSupport()
    {

        $issue = htmlspecialchars($_POST['issue']);
        $message = htmlspecialchars($_POST['details']);
        $username = htmlspecialchars($_POST['username']);
        $role = 'home';
        $email= $_POST['email']; 

            $model = $this->model('support','support'); 
            $result = $model->submit($issue,$message,$username,$role,$email); 
            
            if ($result['found']=='yes') {

                $this->view('home', 'home');
                echo "<script>alert('Supoort ticket has been submitted !');</script>";

            }
            elseif($result['found']=='no'){

                $this->view('home', 'home');
                echo "<script>alert('Error while getting support');</script>";

            }
        }


}
