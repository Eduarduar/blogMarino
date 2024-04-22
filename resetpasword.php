<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width={device-width}, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h1>Page to reset password</h1>
    <?php
        if(isset($_GET['code'])){
            $code = $_GET['code'];
            echo "<p>Your recovery code is: $code</p>";
        } else {
            echo "<p>No recovery code provided.</p>";
        }
    ?>
</body>
</html>