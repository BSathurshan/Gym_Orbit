<div class="in-content">

<div class="header">
        <div>

        <h2>Reminders</h2>


        </div>
        </div>

<div class="in-in-content">
<div class="reminder-container">

  <!-- SYSTEM -->
  <div class="reminder-category">
    <h3>🛠️ System Reminders</h3>
    <div class="reminder-row">
      <div class="reminder-card" id="system-maintenence">🛠️ System Maintenance</div>
      <div class="reminder-card">🚀 Pending Feature Deployment</div>
      <div class="reminder-card">📊 System Resource Usage</div>
    </div>
  </div>

  <!-- SECURITY + COMMUNICATION (Shared Row) -->
  <div class="reminder-category shared-row">
    <div class="shared-block">
      <h3>🔐 Security Reminders</h3>
      <div class="reminder-row">
        <div class="reminder-card">🔐 Security Alert</div>
      </div>
    </div>

    <div class="shared-block">
      <h3>📢 Communication</h3>
      <div class="reminder-row">
        <div class="reminder-card">📢 Broadcast Message</div>
      </div>
    </div>
  </div>

  <!-- DATA MANAGEMENT -->
  <div class="reminder-category">
    <h3>💾 Data Management</h3>
    <div class="reminder-row">
      <div class="reminder-card" id="database-backup">💾 Database Backup</div>
      <div class="reminder-card">🧹 Clean Old Database Entries</div>
      <div class="reminder-card">🧹 Log Cleanup</div>
      <div class="reminder-card">🧹 Logging</div>
    </div>
  </div>

</div>

    </div>
</div> 


<!-- Hidden Form (System Maintenance) -->
<div id="system-maintenence-form" class="modal" style="display: none;">
    <div class="modal-content">
        <h3>Edit Post</h3>
        <form method="POST" action="<?= ROOT ?>/admin/reminderUpdate" enctype="multipart/form-data">
            <input type="hidden" name="username" value="<?= $username ?>">
            <input type="hidden" name="category" value="system-maintenence">

            <label for="maintenence_title">Title:</label>
            <input type="text" name="title" id="maintenence_title" required><br>

            <label for="maintenence_start">Start:</label>
            <input type="datetime-local" name="start" id="maintenence_start" required><br>

            <label for="maintenence_end">End:</label>
            <input type="datetime-local" name="end" id="maintenence_end" required><br>

            <input type="submit" value="Invoke">
            <button type="button" onclick="closeRemiderModal()">Cancel</button>
        </form>
    </div>
</div>


<!-- Hidden Form (DataBase Backup) -->
<div id="dbBackup-form" class="modal" style="display: none;">
    <div class="modal-content">
        <h3>Edit Post</h3>
        <form method="POST" action="<?= ROOT ?>/admin/dbBackup" enctype="multipart/form-data">
            <input type="hidden" name="username" value="<?= $username ?>">

            <label for="password">Enter your password:</label>
            <input type="text" name="password" required><br>

            <input type="submit" value="Backup">
            <button type="button" onclick="closeDbBackup()">Cancel</button>
        </form>
    </div>
</div>
