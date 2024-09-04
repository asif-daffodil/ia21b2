<?php  
    require_once 'header.php';
    if(!isset($_SESSION['user']) || $_SESSION['user']['token'] != "ia21b2"){
        echo header("Location: ./");
    }

    if(isset($_POST['changePassword'])){
        $oldPassword = $conn->real_escape_string(safeData($_POST['oldPassword']));
        $newPassword = $conn->real_escape_string(safeData($_POST['newPassword']));
        $confirmNewPassword = $_POST['confirmNewPassword'];

        if($newPassword != $confirmNewPassword){
            echo "<script>toastr.error('Password did not matched')</script>";
        }elseif($oldPassword == $newPassword){
            echo "<script>toastr.error('Old password and new password should not be same')</script>";
        }else{
            $sql = "SELECT * FROM users WHERE id = ".$_SESSION['user']['id'];
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                if(!password_verify($oldPassword, $row['password'])){
                    echo "<script>toastr.error('Old password did not matched')</script>";
                }else{
                    $newPassword = password_hash($newPassword, PASSWORD_BCRYPT);
                    $sql = "UPDATE users SET password = '$newPassword' WHERE id = ".$_SESSION['user']['id'];
                    if($conn->query($sql) === TRUE){
                        echo "<script>toastr.success('Password changed successfully')</script>";
                    }else{
                        echo "<script>toastr.error('Password change failed')</script>";
                    }
                }
            }
        }
    }
?>
    <div class="container">
        <div class="row py-5">
            <div class="col-md-4 mx-auto border rounded shadow p-4">
                <h2>Change Password</h2>
                <form action="" method="post">
                    <div class="mb-3">
                        <input type="password" placeholder="Old Password" name="oldPassword" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="password" placeholder="New Password" name="newPassword" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="password" placeholder="Confirm New Password" name="confirmNewPassword" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="showPass"> Show Password
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary" name="changePassword">Change Password</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        const showPass = document.querySelector('input[name="showPass"]');
        const oldPassword = document.querySelector('input[name="oldPassword"]');
        const newPassword = document.querySelector('input[name="newPassword"]');
        const confirmNewPassword = document.querySelector('input[name="confirmNewPassword"]');
        showPass.addEventListener('change', function(){
            if(this.checked){
                oldPassword.type = "text";
                newPassword.type = "text";
                confirmNewPassword.type = "text";
            }else{
                oldPassword.type = "password";
                newPassword.type = "password";
                confirmNewPassword.type = "password";
            }
        });
    </script>
<?php
    require_once 'footer.php';
?>