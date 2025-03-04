<?php
class Payments
{
  use Model;

  public function get()
  {
    $conn = $this->getConnection();

    // Fetch all user payments
    $sql = "SELECT * FROM user_payments";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $stmt->close();
      return ['found' => 'yes', 'result' => $result];
    } else {
      $stmt->close();
      return ['found' => 'no'];
    }
  }
}
