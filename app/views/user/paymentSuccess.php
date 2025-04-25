<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/payment.css">
</head>
<body>
    <div class="container">
        <div class="payment-status success">
            <h1>Payment Successful!</h1>
            <p>Thank you for your payment. Your transaction was successful.</p>
            <button class="home-button" onclick="window.location.href='<?= ROOT ?>/user/user'">Go to Home</button>
        </div>
    </div>
</body>
</html>
