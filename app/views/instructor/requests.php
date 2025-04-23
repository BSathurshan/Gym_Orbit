<div class="in-content">
    <div class="header">
        <h2>Requests</h2>
    </div>

    <div class="in-in-content">
        <?php
        // Ensure $trainer_username is initialized
        if (!isset($trainer_username) && isset($_SESSION['username'])) {
            $trainer_username = $_SESSION['username']; // Use the session username if not already set
        }

        if (isset($trainer_username)) {
            $instructor = new Instructor();
            $requests = $instructor->get_requests($trainer_username);

            if (isset($requests['found']) && $requests['found'] === 'yes') {
                foreach ($requests['result'] as $request) {
                    echo "<div class='request-card' id='request-{$request['id']}'>
                            <p><strong>Name:</strong> {$request['name']}</p>
                            <p><strong>Username:</strong> {$request['username']}</p>
                            <div class='request-actions'>
                                <button class='accept-btn' onclick='processRequest(\"{$request['id']}\", \"accept\")'>Accept</button>
                                <button class='reject-btn' onclick='processRequest(\"{$request['id']}\", \"reject\")'>Reject</button>
                            </div>
                          </div>";
                }
            } else {
                echo "<p>No requests found</p>";
            }
        } else {
            echo "<p>Error: Trainer username is not set.</p>";
        }
        ?>
    </div>
</div>

<script>
function processRequest(id, action) {
    if (confirm(`Are you sure you want to ${action} this request?`)) {
        window.location.href = `<?=ROOT?>/instructor/processRequest/${id}/${action}`;
    }
}
</script>

<style>
.request-card {
    background-color: #ffffff;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.request-actions {
    margin-top: 10px;
}

.accept-btn, .reject-btn {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.accept-btn {
    background-color: #28a745;
    color: #fff;
    margin-right: 10px;
}

.accept-btn:hover {
    background-color: #218838;
}

.reject-btn {
    background-color: #dc3545;
    color: #fff;
}

.reject-btn:hover {
    background-color: #c82333;
}
</style>

