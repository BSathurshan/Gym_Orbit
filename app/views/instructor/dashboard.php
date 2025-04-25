<?php
if ($currentPage === 'schedule') {
    include 'schedule.php'; // Include schedule only on the dashboard or specific pages
    ?>
    <script src="<?= ROOT ?>/assets/js/schedule.js"></script>
    <?php
}

<?php if (isset($schedule)): ?>
    <div class="schedule-container">
        <!-- Render schedule -->
    </div>
<?php endif; ?>
?>
