<div class="in-content">
        <?php
        $owner = new Owner();
        $reportData = $owner->get_report_data();

        $payments = $reportData['payments'] ?? [];
        ?>

        <div class="header">
                <div>

                        <h2>Payments</h2>


                </div>
        </div>

        <div class="table-container">
                <?php if (!empty($payments)) : ?>
                        <table class="styled-table">
                                <thead>
                                        <tr>
                                                <th>Username</th>
                                                <th>Package</th>
                                                <th>Amount</th>
                                                <th>Payment Date</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        <?php foreach ($payments as $payment) : ?>
                                                <tr>
                                                        <td><?php echo htmlspecialchars($payment['username']); ?></td>
                                                        <td><?php echo htmlspecialchars($payment['package']); ?></td>
                                                        <td><?php echo htmlspecialchars($payment['amount']); ?></td>
                                                        <td><?php echo htmlspecialchars($payment['payment_date']); ?></td>
                                                </tr>
                                        <?php endforeach; ?>
                                </tbody>
                        </table>
                <?php else : ?>
                        <p class="no-data-message">No payments found.</p>
                <?php endif; ?>
        </div>



</div>