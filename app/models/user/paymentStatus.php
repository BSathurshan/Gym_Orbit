<?php
class PaymentStatus
{
    use Model;
    
    public function updateStatus($id)
    {
        $conn = $this->getConnection();

        $stmt = $conn->prepare("UPDATE user_payments SET status = 'Complete' WHERE payment_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
       
        if ( $stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }
}
?>
