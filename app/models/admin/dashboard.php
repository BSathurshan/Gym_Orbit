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
                    (SELECT SUM(amount) FROM user_payments) AS total_revenue,
                    (SELECT COUNT(*) FROM (
                        SELECT gender FROM admin
                        UNION ALL
                        SELECT gender FROM instructors
                        UNION ALL
                        SELECT gender FROM gym
                        UNION ALL
                        SELECT gender FROM user
                    ) AS all_genders WHERE gender = 'male') AS male_user_count,
                    (SELECT COUNT(*) FROM (
                        SELECT gender FROM admin
                        UNION ALL
                        SELECT gender FROM instructors
                        UNION ALL
                        SELECT gender FROM gym
                        UNION ALL
                        SELECT gender FROM user
                    ) AS all_genders WHERE gender = 'female') AS female_user_count
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