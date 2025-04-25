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
            LEFT JOIN connects_gym cg ON u.username = cg.username
            LEFT JOIN (
                SELECT username, MAX(end) AS latest_end
                FROM user_payments
                WHERE status = 'Complete'
                GROUP BY username
            ) AS latest_payments ON u.username = latest_payments.username
            WHERE cg.gym_username = ? AND ((latest_payments.latest_end IS NULL) OR (latest_payments.latest_end < NOW()));
        ");
        $gym_username = $_SESSION["username"];
        $stmt->bind_param('s', $gym_username);
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
            WHERE up.end > NOW() AND up.status = 'Complete' AND up.gym_username = ?
            GROUP BY u.gender
        ");
        $gym_username = $_SESSION["username"];
        $stmt->bind_param('s', $gym_username);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        if (empty($data)) {
            return [
                [
                    "male_count" => "0",
                    "female_count" => "0"
                ]
            ];
        }
        return $data;
    }

    public function getTotalInstructorCount()
    {
        $conn = $this->getConnection();
        $stmt = $conn->prepare("
            SELECT COUNT(*) AS total_instructors
            FROM instructors
            WHERE gym_username = ?
        ");
        $gym_username = $_SESSION["username"];
        $stmt->bind_param('s', $gym_username);
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
            WHERE ban IS NULL AND gym_username = ?
        ");
        $gym_username = $_SESSION["username"];
        $stmt->bind_param('s', $gym_username);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_column();
    }

    public function getNewMembersCount()
    {
        $conn = $this->getConnection();
        $stmt = $conn->prepare("
            SELECT COUNT(*) AS new_member_count
            FROM connects_gym
            WHERE gym_username = ?
            AND date >= DATE_SUB(NOW(), INTERVAL 1 MONTH);
        ");
        $gym_username = $_SESSION["username"];
        $stmt->bind_param('s', $gym_username);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_column();
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
                COALESCE(SUM(CASE WHEN up.status = 'Complete' AND up.gym_username = ? THEN up.amount ELSE 0 END), 0) AS monthly_income
            FROM DateSeries ds
            LEFT JOIN user_payments up
                ON DATE_FORMAT(up.payment_date, '%Y-%m') = DATE_FORMAT(ds.dt, '%Y-%m')
            GROUP BY month
            ORDER BY month
        ");
        $gym_username = $_SESSION["username"];
        $stmt->bind_param('s', $gym_username);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPayments()
    {
        $conn = $this->getConnection();
        $stmt = $conn->prepare("
            SELECT username, package, amount, payment_date
            FROM user_payments
            WHERE gym_username = ?;
        ");
        $gym_username = $_SESSION["username"];
        $stmt->bind_param('s', $gym_username);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
