<?php
class Report
{
    use Model;

    public function getExpiredMemberCount()
    {
        $conn = $this->getConnection();
        $stmt = $conn->prepare("
            SELECT COUNT(DISTINCT u.username)
            FROM user u
            LEFT JOIN (
                SELECT username, MAX(end) AS latest_end
                FROM user_payments
                WHERE status = 'Complete'
                GROUP BY username
            ) AS latest_payments ON u.username = latest_payments.username
            WHERE (latest_payments.latest_end IS NULL) OR (latest_payments.latest_end < NOW());
        ");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_column();
    }

    public function getActiveMemberGenderCounts()
    {
        $conn = $this->getConnection();
        $stmt = $conn->prepare("
            SELECT
                SUM(CASE WHEN u.gender = 'Male' THEN 1 ELSE 0 END) AS male_count,
                SUM(CASE WHEN u.gender = 'Female' THEN 1 ELSE 0 END) AS female_count
            FROM user_payments up
            INNER JOIN (
                SELECT username, MAX(end) AS latest_end
                FROM user_payments
                WHERE status = 'Complete'
                GROUP BY username
            ) AS latest_payments ON up.username = latest_payments.username AND up.end = latest_payments.latest_end
            INNER JOIN user u ON up.username = u.username
            WHERE up.end > NOW() AND up.status = 'Complete'
            GROUP BY u.gender
        ");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTotalInstructorCount()
    {
        $conn = $this->getConnection();
        $stmt = $conn->prepare("
            SELECT COUNT(*) AS total_instructors
            FROM instructors
        ");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_column();
    }

    public function getActiveInstructorCount()
    {
        $conn = $this->getConnection();
        $stmt = $conn->prepare("
            SELECT COUNT(*) AS active_instructors
            FROM instructors
            WHERE ban IS NULL
        ");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_column();
    }

    public function getRevenueByGym()
    {
        $conn = $this->getConnection();
        $stmt = $conn->prepare("
            SELECT gym_username, SUM(amount) AS total_revenue
            FROM user_payments
            WHERE status = 'Complete'
            GROUP BY gym_username
        ");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getMonthlyIncome()
    {
        $conn = $this->getConnection();
        $stmt = $conn->prepare("
            WITH RECURSIVE DateSeries AS (
                SELECT DATE_SUB(CURDATE(), INTERVAL 11 MONTH) AS dt
                UNION ALL
                SELECT DATE_ADD(dt, INTERVAL 1 MONTH)
                FROM DateSeries
                WHERE DATE_ADD(dt, INTERVAL 1 MONTH) <= CURDATE()
            )
            SELECT
                DATE_FORMAT(ds.dt, '%Y-%m') AS month,
                COALESCE(SUM(CASE WHEN up.status = 'Complete' THEN up.amount ELSE 0 END), 0) AS monthly_income
            FROM DateSeries ds
            LEFT JOIN user_payments up
                ON DATE_FORMAT(up.payment_date, '%Y-%m') = DATE_FORMAT(ds.dt, '%Y-%m')
            GROUP BY month
            ORDER BY month
        ");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
