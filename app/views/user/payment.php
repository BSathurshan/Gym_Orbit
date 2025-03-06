<div class="in-content">

  <div class="header">
    <div>
      <h2>Payment</h2>
    </div>
  </div>

  <div class="in-in-content">
    <?php
    $user = new User();
    $gymDetails = $user->joinedGyms($username);
    ?>
    <div class='table-container'>
      <?php if ($gymDetails['found'] == 'yes'): ?>
        <?php while ($rowRequested = $gymDetails['result']->fetch_assoc()): ?>
          <div class='row' style='display: flex; align-items: center; gap: 1rem; padding: 1rem; border-bottom: 1px solid #ccc;'>
            <div class='cell' style='flex: 1; min-width: 150px;'>
              <img src='<?= ROOT ?>/assets/images/owner/profile/images/<?= htmlspecialchars($rowRequested['file']) ?>' alt='Gym Image' style='width: 150px; height: 150px; object-fit: cover;'>
            </div>
            <div class='cell' style='flex: 2;'>
              <p style='font-size: 16px; font-weight: bold;'>Pay for <?= htmlspecialchars($rowRequested['gym_name']) ?></p>
            </div>
            <div class='cell' style='flex: 3;'>
              <h4 style='margin: 0; padding-bottom: 0.5rem; font-size: 14px; color: white;'>Payment Options</h4>
              <div style='display: flex; gap: 0.5rem;'>
                <button style='padding: 0.5rem 1rem; flex: 1; background-color: #4CAF50; color: white; border: none; cursor: pointer; border-radius: 5px;' onclick='payGym("<?= $rowRequested['gym_username'] ?>", "<?= $username ?>", 1)'>1 Month <br> Rs. 8000</button>
                <button style='padding: 0.5rem 1rem; flex: 1; background-color: #2196F3; color: white; border: none; cursor: pointer; border-radius: 5px;' onclick='payGym("<?= $rowRequested['gym_username'] ?>", "<?= $username ?>", 2)'>3 Months <br> Rs. 22000</button>
                <button style='padding: 0.5rem 1rem; flex: 1; background-color: #f44336; color: white; border: none; cursor: pointer; border-radius: 5px;' onclick='payGym("<?= $rowRequested['gym_username'] ?>", "<?= $username ?>", 3)'>1 Year <br> Rs 84000</button>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p style='text-align: center; font-size: 16px; color: #555;'><?= htmlspecialchars($gymDetails['message']) ?>!</p>
      <?php endif; ?>
    </div>
  </div>
</div>
