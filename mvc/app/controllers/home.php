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

}
