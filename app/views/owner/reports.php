<div class="in-content" id="pdf-report-section">

        <div class="header">
        <div>

        <h2>Reports</h2>

        </div>
        </div>
        <div class="in-in-content">

                <?php
                $owner = new Owner();
                $reportData = $owner->get_report_data();
                ?>
                <section class="report-section">

                <div class="grid-cols-4">
                        <div class="data-box">
                            <i class="fas fa-users"></i>
                            <div class="data-box-content">
                                <h3 class="data-box-title">Expired Members</h3>
                                <p class="data-box-value" id="expired-members-count"><?php echo $reportData['expiredMemberCount'] ?? 0; ?></p>
                            </div>
                        </div>
                        <div class="data-box">
                            <i class="fa fa-dumbbell"></i>
                            <div class="data-box-content">
                                <h3 class="data-box-title">Total Instructors</h3>
                                <p class="data-box-value" id="total-instructors-count"><?php echo $reportData['totalInstructorCount'] ?? 0; ?></p>
                            </div>
                        </div>
                        <div class="data-box">
                            <i class="fas fa-user-check"></i>
                            <div class="data-box-content">
                                <h3 class="data-box-title">Active Instructors</h3>
                                <p class="data-box-value" id="active-instructors-count"><?php echo $reportData['activeInstructorCount'] ?? 0; ?></p>
                            </div>
                        </div>

                        <div class="data-box">
                            <i class="fas fa-users"></i>
                            <div class="data-box-content">
                                <h3 class="data-box-title">New Members</h3>
                                <p class="data-box-value" id="new-members-count"><?php echo $reportData['newMembersCount'] ?? 0; ?></p>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="reports-chart-section">
                    <section class="pie-chart-section">
                        <h4>Active Member Gender Distribution</h4>
                        <div class="chart-container">
                            <canvas id="member-gender-chart" class="chart-canvas"></canvas>
                        </div>
                    </section>

                    <section class="bar-chart-section">
                        <h4>Monthly Income</h4>
                        <div class="chart-container">
                            <canvas id="income-chart" class="chart-canvas"></canvas>
                        </div>
                    </section>
                </div>

            <button id="download-report-pdf">Print Report</button>
    </div>
</div>