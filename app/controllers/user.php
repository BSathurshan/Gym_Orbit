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
      return ['found' => 'no', 'message' => 'Please join a gym !.'];
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
      return ['found' => 'no', 'message' => 'Please join a gym !.'];
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
      return ['found' => 'no', 'message' => 'Please join a gym !.'];
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
        $this->joinGymPremium($gym_username, $username);
        $this->view('user', 'user');
      } else {
        $status = "error";
        $message = "Payment failed.";
        $this->view('user', 'paymentFailed', ['message' => $message, 'status' => $status]);
      }
    } else {
      $status = "error";
      $message = "Missing parameters (payGym).";
      $this->view('user', 'user', ['message' => $message, 'status' => $status]);
    }
  }

  public function paymentResult()
  {
    if (isset($_GET['order_id'])) {
      $order_id = $_GET['order_id'];
      $payment_id = null;
      if (preg_match('/ORDER_(\d+)_/', $order_id, $matches)) {
        $payment_id = $matches[1];

        $model = $this->model('user', 'paymentStatus');
        $updateStatus = $model->updateStatus($payment_id);

        if ($updateStatus) {
          $status = "success";
          $message = "Payment successful.";
          $this->view('user', 'paymentSuccess', ['message' => $message, 'status' => $status]);
          $_SESSION["subscriptionStatus"] = true;
        } else {
          $status = "error";
          $message = "Payment failed.";
          $this->view('user', 'paymentFailed', ['message' => $message, 'status' => $status]);
        }
      } else {
        $status = "error";
        $message = "Invalid order ID.";
        $this->view('user', 'paymentFailed', ['message' => $message, 'status' => $status]);
      }
    } else {
      $status = "error";
      $message = "Missing order ID.";
      $this->view('user', 'paymentFailed', ['message' => $message, 'status' => $status]);
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
        $status = "success";
        $message = "You have successfully left the gym.";
        $this->view('user', 'user', ['message' => $message, 'status' => $status]);
      } else {
        $status = "error";
        $message = "Failed to leave.";
        $this->view('user', 'user', ['message' => $message, 'status' => $status]);
      }
    } else {
      $status = "error";
      $message = "Missing parameters (leaveGym).";
      $this->view('user', 'user', ['message' => $message, 'status' => $status]);
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
      $status = "error";
      $message = "Missing username (instructors_Check).";
      $this->view('user', 'user', ['message' => $message, 'status' => $status]);
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
      $status = "error";
      $message = "Missing username (request_Instructor).";
      $this->view('user', 'user', ['message' => $message, 'status' => $status]);
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

      $model = $this->model('user', 'mealPlan');
      $result = $model->sendRequest($username, $name, $trainer_name, $trainer_username, $gym_username);

      if ($result) {
        $status = "success";
        $message = "Request sent successfully.";
        $this->view('user', 'user', ['message' => $message, 'status' => $status]);
      } else {
        $status = "error";
        $message = "Already request pending.";
        $this->view('user', 'user', ['message' => $message, 'status' => $status]);
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
      $status = "error";
      $message = "Missing username (get_free_materials).";
      $this->view('user', 'user', ['message' => $message, 'status' => $status]);
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
      $status = "error";
      $message = "Missing username (get_premium_materials).";
      $this->view('user', 'user', ['message' => $message, 'status' => $status]);
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
      $exercises = $_POST['exercises'][$day] ?? [];
      $sets = $_POST['sets'][$day] ?? [];
      $reps = $_POST['reps'][$day] ?? [];

      for ($i = 0; $i < count($exercises); $i++) {
          $exercise = trim($exercises[$i]);
          $set = trim($sets[$i] ?? '');
          $rep = trim($reps[$i] ?? '');

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

  if ($success) {
      $status = "success";
      $message = "Workout plan saved successfully!";
      $_SESSION['message'] = $message;
  } else {
      $status = "error";
      $message = "Failed to save some workouts. Please try again.";
      $_SESSION['message'] = $message;
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
      $status = "error";
      $message = "Missing username (get_reminders).";
      $this->view('user', 'user', ['message' => $message, 'status' => $status]);
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
      $status = "error";
      $message = "Missing username (get_posts).";
      $this->view('user', 'user', ['message' => $message, 'status' => $status]);
    }
  }

  public function joinGym()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $gym_username = $_POST['gym_username'];
      $gym_name = $_POST['gym_name'];
      $name = $_POST['name'];
      $username = $_POST['username'];

      $model = $this->model('user', 'joinGym');
      $result = $model->join($gym_username, $gym_name, $username, $name);

      if (!isset($result['duplicate'])) {
        if ($result) {
          $status = "success";
          $message = "You have joined $gym_name the gym.";
          $this->view('user', 'user', ['message' => $message, 'status' => $status]);
        } else {
          $status = "error";
          $message = "Failed to join $gym_name the gym.";
          $this->view('user', 'user', ['message' => $message, 'status' => $status]);
        }
      } else {
        $status = "error";
        $message = "You have already joined $gym_name the gym.";
        $this->view('user', 'user', ['message' => $message, 'status' => $status]);
      }
    }
  }

  public function joinGymPremium($gym_username, $username)
  {
    $model = $this->model('user', 'joinGym');
    $result = $model->joinPremium($gym_username, $username);

    if ($result) {
      $status = "success";
      $message = "You can access premium features for - $gym_username.";
      $this->view('user', 'user', ['message' => $message, 'status' => $status]);
    } else {
      $status = "error";
      $message = "Failed to add premium features.";
      $this->view('user', 'user', ['message' => $message, 'status' => $status]);
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
      $status = "error";
      $message = "Missing username (request_Instructor).";
      $this->view('user', 'user', ['message' => $message, 'status' => $status]);
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
      $userEmail = $email;
      $emailMessage = "Dear $username,<br><br>Our support team will reply you soon!.";
      $subject = 'We got your Ticket';

      $emailService = new Email();
      $response = $emailService->send($userEmail, $emailMessage, $subject);

      if ($response) {
        $status = "success";
        $message = "Support ticket has been submitted!";
      } else {
        $status = "error";
        $message = "Failed to send email message!";
      }
      $this->view('user', 'user', ['message' => $message, 'status' => $status]);
    } else {
      $status = "error";
      $message = "Error while getting support.";
      $this->view('user', 'user', ['message' => $message, 'status' => $status]);
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
    $result = $model->edit($email, $username, $name, $contact, $location, $age, $gender);

    if ($result['found'] == 'yes') {
      $status = "success";
      $message = "Your details have been edited!";
      $this->view('user', 'user', ['message' => $message, 'status' => $status]);
    } else {
      $status = "error";
      $message = "Error while editing the details.";
      $this->view('user', 'user', ['message' => $message, 'status' => $status]);
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
    $gym_username = $_GET['gym_username'] ?? '01';
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
      $status = "error";
      $message = "Missing username (get_mealplans).";
      $this->view('user', 'user', ['message' => $message, 'status' => $status]);
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
        $status = "success";
        $message = "Meal plan saved successfully!";
        $_SESSION['message'] = $message;
      } else {
        $status = "error";
        $message = "Failed to save some meals. Please try again.";
        $_SESSION['message'] = $message;
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
      $status = "success";
      $message = "Address changed!";
      $this->view('user', 'user', ['message' => $message, 'status' => $status]);
  }else{
      $status = "error";
      $message = "Failed to change address!";
      $this->view('user', 'user', ['message' => $message, 'status' => $status]);
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
        $status = "success";
        $message = "Name changed!";
        $this->view('user', 'user', ['message' => $message, 'status' => $status]);
      } else {
        $status = "error";
        $message = "Name changing failed!";
        $this->view('user', 'user', ['message' => $message, 'status' => $status]);
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
        $status = "success";
        $message = "Age changed!";
        $this->view('user', 'user', ['message' => $message, 'status' => $status]);
      } else {
        $status = "error";
        $message = "Age changing failed!";
        $this->view('user', 'user', ['message' => $message, 'status' => $status]);
      }
}


public function bookingDetails()
{
    $username = $_SESSION['username'];
    $model = $this->model('user', 'Booking');
    $result = $model->details($username);

    if($result['found'] == 'yes') {
        return ['found' => 'yes', 'result' => $result['result']];
    } else {
        return ['found' => 'no'];
    }
}

public function moreDetails($gym_username, $trainer_username)
{
    $model = $this->model('user', 'Booking');
    $result = $model->moreDetails($gym_username, $trainer_username);

    if($result['found'] == 'yes') {
        return [
            'found' => 'yes',
            'gym_fileimage' => $result['gym_fileimage'],
            'trainer_name' => $result['trainer_name'],
            'trainer_image' => $result['trainer_image']
        ];
    } else {
        return ['found' => 'no'];
    }
}


}