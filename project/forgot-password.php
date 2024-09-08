<?php  
    require_once 'header.php';

    if(isset($_POST['forgotPassword'])) {
        $email = $conn->real_escape_string(safeData($_POST['email']));
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $token = md5($user['email'] . time());
            $sql = "UPDATE users SET token='$token' WHERE id=" . $user['id'];
            if($conn->query($sql)) {
                $to = $user['email'];
                $subject = "Reset Password";
                $message = "Click the link below to reset your password<br>";
                $message .= "<a href='http://localhost/ia21b2/project/reset-password.php?token=$token'>Reset Password</a>";
                $headers = "From:asif@dti.ac";
                mail($to, $subject, $message, $headers);
                echo "<script>toastr.success('Reset password link sent to your email')</script>";
            }else{
                echo "<script>toastr.error('Failed to reset password')</script>";
            }
        }else{
            echo "<script>toastr.error('Email not found')</script>";
        }
    }
?>
    <div class="container">
        <div class="row py-5">
            <div class="col-md-4 mx-auto p-4 border rounded shadow">
                <h1>Forgot Password</h1>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <button type="submit" name="forgotPassword" class="btn btn-primary">Forgot Password</button>
                </form>
            </div>
        </div>
    </div>
<?php
    require_once 'footer.php';
?>
    