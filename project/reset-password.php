<?php  
    require_once 'header.php';
    if (isset($_SESSION['user']) && $_SESSION['user']['token'] != "ia21b2") {
        echo header("Location: ./");
    }

    if(!isset($_GET['token'])) {
        echo header("Location: ./");
    }else{
        $token = $conn->real_escape_string(safeData($_GET['token']));
        $sql = "SELECT * FROM users WHERE token='$token'";
        $result = $conn->query($sql);
        if($result->num_rows == 0) {
            echo header("Location: ./");
        }
    }

    if (isset($_POST['resetPassword'])) {
        $newPassword = $conn->real_escape_string(safeData($_POST['newPassword']));
        $confirmPassword = $conn->real_escape_string(safeData($_POST['confirmPassword']));
        $token = $conn->real_escape_string(safeData($_GET['token']));
        $sql = "SELECT * FROM users WHERE token='$token'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($newPassword == $confirmPassword) {
            $newPassword = password_hash($newPassword, PASSWORD_BCRYPT);
            $sql = "UPDATE users SET password='$newPassword' WHERE id=" . $row['id'];
            if ($conn->query($sql)) {
                $sql = "UPDATE users SET token='' WHERE id=" . $row['id'];
                $conn->query($sql);
                echo "<script>toastr.success('Password reset successful');setTimeout(()=>{location.href='./login.php'},2000)</script>";
            } else {
                echo "<script>toastr.error('Failed to reset password')</script>";
            }
        } else {
            echo "<script>toastr.error('Password does not match')</script>";
        }
    }
?>
    <div class="container">
        <div class="row py-5">
            <div class="col-md-4 mx-auto p-4 border rounded shadow">
                <h1>Reset Password</h1>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">New Password</label>
                        <input type="password" name="newPassword" id="newPassword" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" name="confirmPassword" id="confirmPassword" class="form-control">
                    </div>
                    <button type="submit" name="resetPassword" class="btn btn-primary">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
<?php  
    require_once 'footer.php';
?>