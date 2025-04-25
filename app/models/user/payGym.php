<?php
class PayGym
{
  use Model;




  public function pay($gym_username, $username, $option)
  {
    $package = "";

    $conn = $this->getConnection();

    $amount = 8000;
    $months_to_add = 1;
    if ($option == "1") {
      $amount = 8000;
      $package = "1_MONTH";
      $months_to_add = 1;
    } else if ($option == "2") {
      $amount = 22000;
      $package = "3_MONTHS";
      $months_to_add = 3;
    } else if ($option == "3") {
      $amount = 84000;
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
      $payment_id = $conn->insert_id;
      $stmt->close();

      $order_id = "ORDER_" . $payment_id . "_" . uniqid();
      $merchant_id = "1229442"; // PayHere sandbox merchant ID
      $merchant_secret = "MjcwMDI4NDYxMjE2MjIyMjAwNzgzODk0NDk2NzY1Mzc4NTI2NjM3Ng=="; // PayHere sandbox secret
      $currency = "LKR";

      // Generate hash
      $hash = strtoupper(
        md5(
          $merchant_id .
            $order_id .
            number_format($amount, 2, '.', '') .
            $currency .
            strtoupper(md5($merchant_secret))
        )
      );

      // Sandbox return/cancel/notify URLs
      $baseUrl = ROOT."/user"; // Adjust to your local path
      $return_url = "$baseUrl/paymentResult";
      $cancel_url = "$baseUrl";
      $notify_url = "$baseUrl/notify.php";

      // Output PayHere form (or redirect)
      echo '
      <form method="post" action="https://sandbox.payhere.lk/pay/checkout" id="payhere_form">
          <input type="hidden" name="merchant_id" value="' . $merchant_id . '">
          <input type="hidden" name="return_url" value="' . $return_url . '">
          <input type="hidden" name="cancel_url" value="' . $cancel_url . '">
          <input type="hidden" name="notify_url" value="' . $notify_url . '">
          <input type="hidden" name="order_id" value="' . $order_id . '">
          <input type="hidden" name="items" value="' . $package . '">
          <input type="hidden" name="currency" value="' . $currency . '">
          <input type="hidden" name="amount" value="' . number_format($amount, 2, '.', '') . '">

          <!-- Dummy customer info (can pull from DB or session) -->
          <input type="hidden" name="first_name" value="' . htmlspecialchars($username) . '">
          <input type="hidden" name="last_name" value="' . htmlspecialchars($gym_username) . '">
          <input type="hidden" name="email" value="test@example.com">
          <input type="hidden" name="phone" value="0771234567">
          <input type="hidden" name="address" value="123, Test Street">
          <input type="hidden" name="city" value="Colombo">
          <input type="hidden" name="country" value="Sri Lanka">

          <input type="hidden" name="hash" value="' . $hash . '">
      </form>
      <script>document.getElementById("payhere_form").submit();</script>
    ';
    return true;
    } else {
      $stmt->close();
      return false;
    }
  }
}
