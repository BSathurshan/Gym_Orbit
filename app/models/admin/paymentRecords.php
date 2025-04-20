<?php
class PaymentRecords
{
    use Model;

    public function get()
    {
        $conn = $this->getConnection();

        // Calculate the date 5 months ago
        $startDate = new DateTime('-12 months');
        $endDate = new DateTime();
        $endDate->setTime(23, 59, 59); // Include the end of the current day

        $sql = "SELECT
                    DATE(payment_date) AS payment_day,
                    SUM(amount) AS total_amount
                FROM user_payments
                WHERE payment_date >= ? AND payment_date <= ?
                GROUP BY DATE(payment_date)
                ORDER BY DATE(payment_date) DESC";

        $stmt = $conn->prepare($sql);

        if ($stmt) { // Check if prepare was successful
            $startDateFormatted = $startDate->format('Y-m-d 00:00:00');
            $endDateFormatted = $endDate->format('Y-m-d 23:59:59');
            $stmt->bind_param("ss", $startDateFormatted, $endDateFormatted);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows > 0) {
                $payments = [];
                while ($row = $result->fetch_assoc()) {
                    $payments[] = $row;
                }
                $stmt->close();

                // --- The date filling logic remains the same ---
                $allDates = [];
                $currentDate = clone $startDate;
                while ($currentDate <= $endDate) {
                    $allDates[$currentDate->format('Y-m-d')] = ['payment_day' => $currentDate->format('Y-m-d'), 'total_amount' => 0];
                    $currentDate->modify('+1 day');
                }

                foreach ($payments as $payment) {
                    if (isset($allDates[$payment['payment_day']])) {
                        $allDates[$payment['payment_day']] = $payment;
                    }
                }

                // Re-index the array if needed, but associative array might be fine
                $finalPayments = array_values($allDates);

                return ['found' => 'yes', 'result' => $finalPayments];
            } else {
                $stmt->close();
                // Handle the case where the query executed successfully but returned no rows
                $payments = [];
                $currentDate = clone $startDate;
                while ($currentDate <= $endDate) {
                    $payments[] = ['payment_day' => $currentDate->format('Y-m-d'), 'total_amount' => 0];
                    $currentDate->modify('+1 day');
                }
                return ['found' => 'yes', 'result' => $payments];
            }
        } else {
            // Handle prepare error
            return ['found' => 'no', 'error' => $conn->error];
        }
    }
}