<?php 


Trait Controller
{

	public function view($fname, $name, $data = [])
	{
		$filename = "../app/views/".$fname."/".$name.".php";
		
		if(file_exists($filename)) {
			
			if (!empty($data)) {
				extract($data);
			}
	
			require $filename;  
		} else {
			
			$filename = "../app/views/404.view.php";
			require $filename;
		}
	}
	

	public function model($fname,$model)
    {
        // Include the model file
        $modelFile = "../app/models/".$fname."/". $model . ".php";
        if (file_exists($modelFile)) {
            require_once $modelFile;
            return new $model; 
        } else {
            throw new Exception("Model $model not found.");
        }
    }
}