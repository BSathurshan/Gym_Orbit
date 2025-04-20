<?php
class Dashboard
{
    use Model;

    public function get()
    {
        $conn = $this->getConnection();

        $sql = "SELECT
                    (SELECT COUNT(*) FROM gym) AS owner_count,
                    (SELECT COUNT(*) FROM instructors) AS instructor_count,
                    (SELECT COUNT(*) FROM user) AS user_count,
                    SUM(CASE WHEN gender = 'male' THEN 1 ELSE 0 END) AS male_user_count,
                    SUM(CASE WHEN gender = 'female' THEN 1 ELSE 0 END) AS female_user_count,
                    (SELECT SUM(amount) FROM user_payments) AS total_revenue
                FROM user
                LIMIT 1";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $stmt->close();
            return ['found'=>'yes','result'=>$result];
        } else {
            $stmt->close();
            return ['found' => 'no'];
        }
    }
}
?>