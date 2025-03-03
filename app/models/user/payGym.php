<?php
class PayGym
{
  use Model;

  public function pay($gym_username, $username, $option)
  {
    $current_link = "";
    $package = "";
    $link_month = "https://sandbox.payhere.lk/pay/oc3b2955b";
    $link_3months = "https://sandbox.payhere.lk/pay/ob4b5a5cd";
    $link_year = "https://sandbox.payhere.lk/pay/o2ad1306e";
    $conn = $this->getConnection();
    $amount = 8000;
    if ($option == "1") {
      $amount = 8000;
      $current_link = $link_month;
      $package = "1_MONTH";
    } else if ($option == "2") {
      $amount = 22000;
      $current_link = $link_3months;
      $package = "3_MONTHS";
    } else if ($option == "3") {
      $amount = 84000;
      $current_link = $link_year;
      $package = "1_YEAR";
    }

    $sql = "INSERT INTO user_payments (username, gym_username, package, amount) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $username, $gym_username, $package, $amount);

    if ($stmt->execute()) {
      $stmt->close();
      header("Location: $current_link");
      return true;
    } else {
      $stmt->close();
      return false;
    }
  }
}
