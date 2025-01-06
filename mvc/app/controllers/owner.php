<?php 
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
}
?>