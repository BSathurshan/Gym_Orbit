<div class="in-content">

  <div class="header">
    <div>
      <h2>User Payments</h2>
    </div>
  </div>

  <div class="fav" style="display: flex; flex-direction: column; gap: 1rem;">
    <?php
    $admin = new Admin();
    $messages = $admin->get_payments();

    if (isset($messages['found']) && $messages['found'] == 'yes') {
      while ($rowRequested = $messages['result']->fetch_assoc()) {
        $gym = $admin->get_specific_gym($rowRequested['gym_username'])->fetch_assoc();
        $profile = $admin->get_specific_user($rowRequested['username'])->fetch_assoc();
        echo "<div style='border: 2px solid gray; padding: 1rem; display: flex; flex-direction: column; gap: 5px; align-items: flex-start; border-radius: 8px;'>";
        echo "<h3 style='margin: 0; font-size: 2rem;'>User: {$profile['name']}<span style='margin-left: 8px; font-size: 20px; opacity: 50%;'>(ID - {$profile['username']})</span></h3>";
        echo "<div style='width: 100%; display: flex; flex-direction: row; justify-content: space-between;'>";
        if ($rowRequested['package'] == "1_MONTH") {
          echo "<h3 style='margin: 0; font-size: 1.5rem;'>1 Month for {$gym['gym_name']}</h3>";
        } elseif ($rowRequested['package'] == "3_MONTH") {
          echo "<h3 style='margin: 0; font-size: 1.5rem;'>3 Months for {$gym['gym_name']}</h3>";
        } elseif ($rowRequested['package'] == "1_YEAR") {
          echo "<h3 style='margin: 0; font-size: 1.5rem;'>1 Year for {$gym['gym_name']}</h3>";
        }
        echo "<h3 style='margin: 0; font-size: 1.5rem;'>Rs. {$rowRequested['amount']}</h4>";
        echo "</div>";
        echo "<h6 style='color: #9f9f9f;margin: 0;'>Payment Reference ID - ${rowRequested['payment_id']}</h6>";
        echo "</div>";
      }
    } elseif (isset($messages['found']) && $messages['found'] == 'no') {
      echo "<p>No Payments Found.</p>";
    }
    ?>
  </div>
</div>
