<?php
  require_once '../app/controllers/email.php';

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
  public function joinedGyms_premium($username)
  {
    $model = $this->model('user', 'retrieveGyms');

    if (!$model) {
      die("Failed to load model.");
    }
    $result = $model->joined_premium($username);

    if ($result['found'] == 'yes') {

      return ['found' => 'yes', 'result' => $result['result']];
    } elseif ($result['found'] == 'no') {
      return ['found' => 'no','message' => 'Please join a gym !.'];
    }
  }
  public function joinedGyms_normal($username)
  {
    $model = $this->model('user', 'retrieveGyms');

    if (!$model) {
      die("Failed to load model.");
    }
    $result = $model->joined_normal($username);

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

         $this->joinGymPremium($gym_username, $username );
      
        $this->view('user', 'user');
        echo "<script>alert('Payment is succesfull.');</script>";
        
      } else {
        $this->view('user', 'user');
        echo "<script>alert('Payment un successfull.');</script>";

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

  public function get_free_materials($username)
  {
    if (!empty($username)) {

      $model = $this->model('user', 'materials');
      $result = $model->getFreeMaterials($username);


      if ($result['found'] == 'yes') {

        return ['found' => 'yes', 'result' => $result['result']];
      } elseif ($result['found'] == 'no') {

        return ['found' => 'no'];
      } elseif ($result['found'] == 'alert') {

        return ['found' => 'alert'];
      }
    } else {

      echo "<script>alert('Missing username (get_free_materials).');</script>";
    }
  }

  public function get_premium_materials($username)
  {
    if (!empty($username)) {

      $model = $this->model('user', 'materials');
      $result = $model->getPremiumMaterials($username);


      if ($result['found'] == 'yes') {

        return ['found' => 'yes', 'result' => $result['result']];
      } elseif ($result['found'] == 'no') {

        return ['found' => 'no'];
      } elseif ($result['found'] == 'alert') {

        return ['found' => 'alert'];
      }
    } else {

      echo "<script>alert('Missing username (get_padi_materials).');</script>";
    }
  }

  public function get_workouts($username) {
    $model = $this->model('user', 'instructor');
    $result = $model->workout_details($username);
    
    if($result) {
        $workouts = [];
        foreach($result as $row) {
            $workouts[$row['day']][] = $row;
        }
        return ['found' => 'yes', 'workouts' => $workouts];
    }
    
    return ['found' => 'no'];
}
public function save_workout($username) {
  $model = $this->model('user', 'instructor');
  $delete = $model->workout_delete($username);

  $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
  $success = true;

  foreach ($days as $day) {
      // Fetch arrays of exercises, sets, and reps for each day
      $exercises = $_POST['exercises'][$day] ?? [];
      $sets = $_POST['sets'][$day] ?? [];
      $reps = $_POST['reps'][$day] ?? [];

      // Iterate through each exercise for that day
      for ($i = 0; $i < count($exercises); $i++) {
          $exercise = trim($exercises[$i]);
          $set = trim($sets[$i] ?? '');
          $rep = trim($reps[$i] ?? '');

          // Skip empty entries (safety check)
          if ($exercise === '' || $set === '' || $rep === '') {
              continue;
          }

          // Debug output
          // echo "Saving for $day: $exercise - $set sets x $rep reps<br>";
          
          $result = $model->workout_save($username, $day, $exercise, $set, $rep);

          if (!$result) {
              $success = false;
          }
      }
  }

  // Redirect or message
  if ($success) {
      $_SESSION['message'] = 'Workout plan saved successfully!';
  } else {
      $_SESSION['message'] = 'Failed to save some workouts. Please try again.';
  }

  header("Location: " . ROOT . "/instructor/workout_schedule/{$username}");
  exit();
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

  public function joinGymPremium($gym_username, $username )
  {
      $model = $this->model('user', 'joinGym');
      $result = $model->joinPremium($gym_username, $username);

        if ($result) {
                  return true;
        } else {

          return false;
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
  public function request_workoutplan($username)
  {
    if (!empty($username)) {

      $model = $this->model('user', 'instructor');
      $result = $model->workout_details($username);

      if ($result) {
        return ['found' => 'yes', 'result' => $result];
        
      } else {

        return ['found' => 'no', 'message' => 'Please join a gym to request instructors'];
      }
    } else {

      echo "<script>alert('Missing username (request_Instructor).');</script>";
    }
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

      $userEmail=$email ;
      $emailMessage="Dear $username,<br><br>Our support team will reply you soon!.";
      $subject='We got your Ticket';

      $emailService = new Email();
      $response = $emailService->send($userEmail, $emailMessage, $subject);

      $this->view('user', 'user');
      if($response){
        echo "<script>alert('Support ticket has been submitted !');</script>";
      }else{
        echo "<script>alert('Fail to send email message !');</script>";
      }
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

  public function get_notification()
  {
      // Only start session if not already active
      if (session_status() === PHP_SESSION_NONE) {
          session_start();
      }
  
      if (!isset($_SESSION['username'])) {
          error_log("Controller: Not logged in, returning 'Not logged in' response");
          echo json_encode(['found' => 'no', 'error' => 'Not logged in']);
          return;
      }
  
      $username = $_SESSION['username'];
      error_log("Controller: Username = $username");
  
      $model = $this->model('user', 'notification');
      $result = $model->get($username);
  
      if ($result['found'] == 'yes') {
          error_log("Controller: Found notifications for $username");
          $notifications = [];
          while ($row = $result['result']->fetch_assoc()) {
              $notifications[] = $row;
          }
          echo json_encode(['found' => 'yes', 'result' => $notifications]);
      } elseif ($result['found'] == 'no') {
          error_log("Controller: No notifications found for $username");
          echo json_encode(['found' => 'no']);
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
public function workoutplan($username) {

  $workouts = $this->get_workouts($username);
  $this->view('user', 'workoutPlan', ['username' => $username, 'workouts' => $workouts]);
}

public function updateDone() {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id = $_POST['id'] ?? null;
      $done = $_POST['done'] ?? null;

      if ($id !== null && $done !== null) {
          $model = $this->model('user','workoutModel');
          $result= $model->updateDoneStatus($id, $done);
          echo "OK";
      } else {
          echo "Invalid input";
      }
  } else {
      echo "Invalid method";
  }
}





// controllers/WorkoutController.php


  // Meal Plan Methods

  public function get_mealplans($username)
  {
    if (!empty($username)) {
      $model = $this->model('user', 'mealplan');
      $result = $model->get($username);

      if ($result['found'] == 'yes') {
        return ['found' => 'yes', 'result' => $result['result']];
      } elseif ($result['found'] == 'no') {
        return ['found' => 'no'];
      } elseif ($result['found'] == 'alert') {
        return ['found' => 'alert'];
      }
    } else {
      echo "<script>alert('Missing username (get_mealplans).');</script>";
    }
  }

  public function save_mealplan($username)
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $model = $this->model('user', 'mealplan');

      $meals = $_POST['meals'] ?? [];
      $success = true;

      foreach ($meals as $meal) {
        $meal_name = trim($meal['meal_name'] ?? '');
        $time = trim($meal['time'] ?? '');
        $description = trim($meal['description'] ?? '');

        if ($meal_name === '' || $time === '' || $description === '') {
          continue;
        }

        $result = $model->save($username, $meal_name, $time, $description);

        if (!$result) {
          $success = false;
        }
      }

      if ($success) {
        $_SESSION['message'] = 'Meal plan saved successfully!';
      } else {
        $_SESSION['message'] = 'Failed to save some meals. Please try again.';
      }

      header("Location: " . ROOT . "/user/mealplan/{$username}");
      exit();
    }
  }

  public function mealplan($username)
  {
    $meals = $this->get_mealplans($username);
    $this->view('user', 'mealPlan', ['username' => $username, 'meals' => $meals]);
  }


// controllers/WorkoutController.php


  // Meal Plan Methods




public function getGymTimes() {
  $gym_username = $_GET['gym_username'] ?? '01';
  $model = $this->model('user', 'calendar');
  $times = $model->getGymTimes($gym_username);
  header('Content-Type: application/json');
  echo json_encode($times);
}

public function getInstructorTimes() {
  $gym_username = $_GET['gym_username'] ?? '01';
  $model = $this->model('user', 'calendar');
  $times = $model->getInstructorTimes($gym_username);
  header('Content-Type: application/json');
  echo json_encode($times);
}

public function saveBooking() {
  $data = json_decode(file_get_contents("php://input"), true);
  
  // Fetch username from session
  $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
  $gym_username = $data['gym_username'] ?? '01';
  $trainer_username = $data['trainer_username'] ?? null;
  $date = $data['date'] ?? '';
  $time = $data['time'] ?? '';

  if (empty($username) || empty($gym_username) || empty($date) || empty($time)) {
      http_response_code(400);
      echo json_encode(['error' => 'Missing required fields']);
      return;
  }

  $model = $this->model('user', 'calendar');
  $result = $model->saveBooking($username, $gym_username, $trainer_username, $date, $time);

  header('Content-Type: application/json');
  if ($result) {
      echo json_encode(['success' => true]);
  } else {
      http_response_code(500);
      echo json_encode(['error' => 'Failed to save booking']);
  }
}

public function getAppointments()
{
  if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }
  if (!isset($_SESSION['username'])) {
      header('Content-Type: application/json');
      echo json_encode(["success" => false, "error" => "User not logged in"]);
      return;
  }
  $username=$_SESSION['username'];
  $model = $this->model('user', 'Appointments');
  $result = $model->get($username);

  if ($result['found'] == 'yes') {

    return ['found' => 'yes', 'result' => $result['result']];

  } elseif ($result['found'] == 'no') {

    return ['found' => 'no'];
  }
}
  

public function saveAddress() {
  if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }
  if (!isset($_SESSION['username'])) {
      header('Content-Type: application/json');
      echo json_encode(["success" => false, "error" => "User not logged in"]);
      return;
      
  }
  
  $address=$_POST['address'];
  $lat=$_POST['lat'];
  $lang=$_POST['lang'];
  $username = $_SESSION['username'];
  $role ='user';

  $model = $this->model('owner', 'address');
  $result = $model->updateAddress($username,$address,$lat,$lang,$role);

  if($result){
      $this->view('user', 'user');
      echo "<script>alert('Address changed !');</script>";
  }else{
      $this->view('user', 'user');
      echo "<script>alert('Failed to  change address !');</script>";
  }

}


public function getGymLocations() {
  $model = $this->model('owner', 'address');
  $gyms = $model->getGymLocations(); 

  echo json_encode($gyms); 
}



/*validaitons*/
public function changeName()
{
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  if (!isset($_SESSION['username'])) {
      header('Content-Type: application/json');
      echo json_encode(["success" => false, "error" => "User not logged in"]);
      return;
  }
  $username=$_SESSION['username'];
  $newName = $_GET['newName'];

    $model = $this->model('user', 'editDetails');
    $result = $model->name($username ,$newName);

      if ($result) {
        $this->view('user', 'user');
        echo "<script>alert('Name changed !');</script>";
      } else {
        $this->view('user', 'user');
        echo "<script>alert('Name changing failed !');</script>";
      }

}

public function changeAge()
{
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  if (!isset($_SESSION['username'])) {
      header('Content-Type: application/json');
      echo json_encode(["success" => false, "error" => "User not logged in"]);
      return;
  }
  $username=$_SESSION['username'];
  $newAge = $_GET['newAge'];

    $model = $this->model('user', 'editDetails');
    $result = $model->age($username ,$newAge);

      if ($result) {
        $this->view('user', 'user');
        echo "<script>alert('Age changed !');</script>";
      } else {
        $this->view('user', 'user');
        echo "<script>alert('Age changing failed !');</script>";
      }

}
}
