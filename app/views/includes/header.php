<?php
// Check if the current page is 'schedule' before including the schedule
if ($currentPage === 'schedule') {
    include 'schedule.php'; // Include schedule only on specific pages
}
?>