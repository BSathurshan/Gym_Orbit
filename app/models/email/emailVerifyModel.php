<?php
class EmailVerifyModel
{
    use Model;  
    
    public function sendUser($username, $email, $is_verified, $verification_code)
    {
        $conn = $this->getConnection();  
        // Update existing user
        $sql = "UPDATE user SET verification_code = ?, verify = ? WHERE username = ? AND email = ?";
    
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $verification_code, $is_verified, $username, $email);
    
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function userVerified( $verification_code)
    {
        $conn = $this->getConnection();  
        // Update existing user
        $is_verified='yes';
        $sql = "UPDATE user SET verify = ? WHERE verification_code = ?";
    
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss",  $is_verified,$verification_code);
    
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function sendOwner($username, $email, $is_verified, $verification_code)
    {
        $conn = $this->getConnection();  
        // Update existing user
        $sql = "UPDATE gym SET verification_code = ?, verify = ? WHERE gym_username = ? AND email = ?";
    
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $verification_code, $is_verified, $username, $email);
    
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function ownerVerified( $verification_code)
    {
        $conn = $this->getConnection();  
        // Update existing user
        $is_verified='yes';
        $sql = "UPDATE gym SET verify = ? WHERE verification_code = ?";
    
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss",  $is_verified,$verification_code);
    
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    
}
?>
