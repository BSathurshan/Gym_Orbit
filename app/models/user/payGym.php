<?php
class PayGym
{
  use Model;

  // public function pay($gym_username, $username, $option)
  // {
  //   $current_link = "";
  //   $package = "";
  //   $link_month = "https://sandbox.payhere.lk/pay/oc3b2955b";
  //   $link_3months = "https://sandbox.payhere.lk/pay/ob4b5a5cd";
  //   $link_year = "https://sandbox.payhere.lk/pay/o2ad1306e";
  //   $conn = $this->getConnection();
  //   $amount = 8000;
  //   if ($option == "1") {
  //     $amount = 8000;
  //     $current_link = $link_month;
  //     $package = "1_MONTH";
  //   } else if ($option == "2") {
  //     $amount = 22000;
  //     $current_link = $link_3months;
  //     $package = "3_MONTHS";
  //   } else if ($option == "3") {
  //     $amount = 84000;
  //     $current_link = $link_year;
  //     $package = "1_YEAR";
  //   }

  //   $sql = "INSERT INTO user_payments (username, gym_username, package, amount) VALUES (?, ?, ?, ?)";
  //   $stmt = $conn->prepare($sql);
  //   $stmt->bind_param("sssi", $username, $gym_username, $package, $amount);

  //   if ($stmt->execute()) {
  //     $stmt->close();
  //     header("Location: $current_link");
  //     return true;
  //   } else {
  //     $stmt->close();
  //     return false;
  //   }
  // }



  public function pay($gym_username, $username, $option)
  {
    $current_link = "";
    $package = "";
    $link_month = "https://sandbox.payhere.lk/pay/oc3b2955b";
    $link_3months = "https://sandbox.payhere.lk/pay/ob4b5a5cd";
    $link_year = "https://sandbox.payhere.lk/pay/o2ad1306e";

    $conn = $this->getConnection();

    $amount = 8000;
    $months_to_add = 1;
    if ($option == "1") {
      $amount = 8000;
      $current_link = $link_month;
      $package = "1_MONTH";
      $months_to_add = 1;
    } else if ($option == "2") {
      $amount = 22000;
      $current_link = $link_3months;
      $package = "3_MONTHS";
      $months_to_add = 3;
    } else if ($option == "3") {
      $amount = 84000;
      $current_link = $link_year;
      $package = "1_YEAR";
      $months_to_add = 12;
    }

    // Get current date and calculate end date
    $start_date = new DateTime();
    $end_date = (clone $start_date)->modify("+$months_to_add months");

    $start = $start_date->format("Y-m-d H:i:s");
    $end = $end_date->format("Y-m-d H:i:s");

    $sql = "INSERT INTO user_payments (username, gym_username, package, amount, start, end) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssiss", $username, $gym_username, $package, $amount, $start, $end);

    if ($stmt->execute()) {
      $stmt->close();
      header("Location: $current_link");
      exit;
    } else {
      $stmt->close();
      return false;
    }
  }
}
