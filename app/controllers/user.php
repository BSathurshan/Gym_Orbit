<?php
class User
{
  use Controller;

  public function index()
  {
    $this->view('user', 'user');
  }

  public function joinedGyms($username)
  {
    $model = $this->model('user', 'retrieveGyms');

    if (!$model) {
      die("Failed to load model.");
    }
    $result = $model->joined($username);

    if ($result['found'] == 'yes') {

      return ['found' => 'yes', 'result' => $result['result']];
    } elseif ($result['found'] == 'no') {
      return ['found' => 'no','message' => 'Please join a gym !.'];
    }
  }

  public function payGym()
  {
    if (isset($_GET['gym_username']) && isset($_GET['username']) && isset($_GET['option'])) {
      $gym_username = $_GET['gym_username'];
      $username = $_GET['username'];
      $option = $_GET['option'];

      $model = $this->model('user', 'payGym');
      $paymentForm = $model->pay($gym_username, $username, $option);

      if ($paymentForm) {
        $this->view('user', 'user');
      } else {
        $this->view('user', 'user');
      }
    } else {
      echo "<script>alert('Missing parameters (payGym).');</script>";
    }
  }

  public function leaveGym()
  {
    if (isset($_GET['gym_username']) && isset($_GET['username'])) {
      $gym_username = $_GET['gym_username'];
      $username = $_GET['username'];

      $model = $this->model('user', 'leave');
      $result = $model->leave($gym_username, $username);

      if ($result) {

        $this->view('user', 'user');
        echo "<script>alert('You have successfully left the gym.');</script>";
      } else {

        $this->view('user', 'user');
        echo "<script>alert('Failed to leave.');</script>";
      }
    } else {

      echo "<script>alert('Missing parameters (leaveGym).');</script>";
    }
  }

  public function instructor_Check($username)
  {
    if (!empty($username)) {

      $model = $this->model('user', 'instructor');
      $result = $model->instructor_Details($username);

      if ($result) {

        return ['found' => 'yes', 'result' => $result];
      } else {

        return ['found' => 'no'];
      }
    } else {

      echo "<script>alert('Missing username (instructors_Check).');</script>";
    }
  }

  public function request_Instructor($username)
  {
    if (!empty($username)) {

      $model = $this->model('user', 'instructor');
      $result = $model->request($username);

      if ($result) {

        return ['found' => 'yes', 'result' => $result];
      } else {

        return ['found' => 'no', 'message' => 'Please join a gym to request instructors'];
      }
    } else {

      echo "<script>alert('Missing username (request_Instructor).');</script>";
    }
  }


  public function sendRequest()
  {

    if (isset($_GET['gym_username'], $_GET['trainer_username'], $_GET['trainer_name'], $_GET['name'], $_GET['username'])) {

      $gym_username = $_GET['gym_username'];
      $trainer_username = $_GET['trainer_username'];
      $trainer_name = $_GET['trainer_name'];
      $name = $_GET['name'];
      $username = $_GET['username'];

      $model = $this->model('user', 'instructor');
      $result = $model->send($username, $name, $trainer_name, $trainer_username, $gym_username);

      if ($result) {

        $this->view('user', 'user');
        echo "<script>alert('Request send successfully');</script>";
      } else {

        $this->view('user', 'user');
        echo "<script>alert('Already request pending');</script>";
      }
    }
  }

  public function get_materials($username)
  {
    if (!empty($username)) {

      $model = $this->model('user', 'materials');
      $result = $model->get($username);


      if ($result['found'] == 'yes') {

        return ['found' => 'yes', 'result' => $result['result']];
      } elseif ($result['found'] == 'no') {

        return ['found' => 'no'];
      } elseif ($result['found'] == 'alert') {

        return ['found' => 'alert'];
      }
    } else {

      echo "<script>alert('Missing username (get_materials).');</script>";
    }
  }


  public function get_reminders($username)
  {
    if (!empty($username)) {

      $model = $this->model('user', 'reminders');
      $result = $model->get($username);

      if ($result) {

        return ['found' => 'yes', 'result' => $result];
      } else {
        return ['found' => 'no'];
      }
    } else {

      echo "<script>alert('Missing username (get_reminders).');</script>";
    }
  }

  public function get_posts($username)
  {
    if (!empty($username)) {

      $model = $this->model('user', 'posts');
      $result = $model->get($username);

      if ($result['found'] == 'yes') {

        return ['found' => 'yes', 'result' => $result['result']];
      } elseif ($result['found'] == 'no') {

        return ['found' => 'no'];
      } elseif ($result['found'] == 'alert') {

        return ['found' => 'alert'];
      }
    } else {

      echo "<script>alert('Missing username (get_posts).');</script>";
    }
  }


  public function joinGym()
  {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Get values from the form
      $gym_username = $_POST['gym_username'];
      $gym_name = $_POST['gym_name'];
      $name = $_POST['name'];
      $username = $_POST['username'];

      $model = $this->model('user', 'joinGym');
      $result = $model->join($gym_username, $gym_name, $username, $name);

      if (!isset($result['duplicate'])) {
        if ($result) {

          $this->view('user', 'user');
          echo "<script>alert('You have joined $gym_name the gym');</script>";
        } else {

          $this->view('user', 'user');
          echo "<script>alert('Failed to joined $gym_name the gym');</script>";
        }
      } else {

        $this->view('user', 'user');
        echo "<script>alert('You have already joined $gym_name the gym');</script>";
      }
    }
  }

  //auto runs this function and start from js
  public function searchGym()
  {


    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $username = isset($_GET['username']) ? $_GET['username'] : '';
    $name = isset($_GET['name']) ? $_GET['name'] : '';

    $model = $this->model('user', 'searchGym');
    $result = $model->search($username, $name, $search);


    if (!defined('PATH')) {
      define('PATH', $_SERVER['DOCUMENT_ROOT'] . '/mvc/app/views/user/');
    }
    include_once PATH . 'render.php';
  }

  public function getSupport()
  {

    $issue = htmlspecialchars($_POST['issue']);
    $message = htmlspecialchars($_POST['details']);
    $username = htmlspecialchars($_POST['username']);
    $role = 'user';
    $email = $_POST['email'];

    $model = $this->model('support', 'support');
    $result = $model->submit($issue, $message, $username, $role, $email);

    if ($result['found'] == 'yes') {

      $this->view('user', 'user');
      echo "<script>alert('Supoort ticket has been submitted !');</script>";
    } elseif ($result['found'] == 'no') {

      $this->view('user', 'user');
      echo "<script>alert('Error while getting support');</script>";
    }
  }

  public function editProfile()
  {

    $email = $_POST['email'];
    $username = $_POST['username'];
    $name = $_POST['name'];
    $contact = (int) $_POST['contact'];
    $location = $_POST['location'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];

    $model = $this->model('user', 'editProfile');
    $result = $model->edit($email, $username, $name, $contact, $location, $age,  $gender);

    if ($result['found'] == 'yes') {

      echo "<script>alert('Your details has been Edited !');</script>";
      $this->view('user', 'user');
    } else {

      $this->view('user', 'user');
      echo "<script>alert('Error while Editing the details');</script>";
    }
  }

/*calendar*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  public function getSavedColors() {
    $gym_username = $_GET['gym_username'] ?? '01'; // Default to '01'
    $model = $this->model('user', 'calendar');
    $colors = $model->getSavedColors($gym_username);
    header('Content-Type: application/json');
    echo json_encode($colors);
}

public function getNotes() {
    $gym_username = $_GET['gym_username'] ?? '01';
    $model = $this->model('user', 'calendar');
    $notes = $model->getNotes($gym_username);
    header('Content-Type: application/json');
    echo json_encode($notes);
}

public function getAvailability() {
    $gym_username = $_GET['gym_username'] ?? '01';
    $model = $this->model('user', 'calendar');
    $availability = $model->getAvailability($gym_username);
    header('Content-Type: application/json');
    echo json_encode($availability);
}


  
}
