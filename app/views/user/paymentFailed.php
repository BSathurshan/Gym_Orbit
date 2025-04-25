<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Failed</title>
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/payment.css">
</head>
<body>
    <div class="container">
        <div class="payment-status failed">
            <h1>Payment Failed</h1>
            <p>We're sorry, but your payment was not successful. Please try again or contact support.</p>
            <button class="home-button" onclick="window.location.href='<?= ROOT ?>/user/user'">Go to Home</button>
        </div>
    </div>
</body>
</html>
