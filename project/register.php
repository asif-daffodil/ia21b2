<?php  
    require_once 'header.php';
    if(isset($_SESSION['user']) && $_SESSION['user']['token'] == "ia21b2"){
        echo "<script>location.href='./'</script>";
    }
    if(isset($_POST['register'])){
        $yourName = $conn->real_escape_string(safeData($_POST['yourName']));
        $yourEmail = $conn->real_escape_string(safeData($_POST['yourEmail']));
        $yourPassword = $conn->real_escape_string(safeData($_POST['yourPassword']));
        $confirmPassword = $_POST['confirmPassword'];
        if($yourPassword == $confirmPassword){
            $yourPassword = password_hash($yourPassword, PASSWORD_BCRYPT);
            $sql = "INSERT INTO users (name, email, password) VALUES ('$yourName', '$yourEmail', '$yourPassword')";
            if($conn->query($sql) === TRUE){
                echo "<script>toastr.success('Registration completed');setTimeout(()=>{location.href='./login.php'},2000)</script>";
            }else{
                echo "<script>toastr.error('Registration failed')</script>";
            }
        }else{
            echo "<script>toastr.error('Password does not match')</script>";
        }
    }
?>
    <div class="container">
        <div class="row py-5">
            <div class="col-md-4 mx-auto border rounded shadow p-4">
                <h2>Register</h2>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="yourName">Your Name:</label>
                        <input type="text" name="yourName" class="form-control" id="yourName" required>
                    </div>
                    <div class="mb-3">
                        <label for="yourEmail">Your Email:</label>
                        <input type="text" name="yourEmail" class="form-control" id="yourEmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="yourPassword">Your Password:</label>
                        <input type="password" name="yourPassword" class="form-control" id="yourPassword" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword">Confirm Password:</label>
                        <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" required>
                    </div>
                    <div class="mb-3">
                        <label for="showPass" class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="showPass"> Show Password
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary" name="register">Register</button>
                </form>
                <!-- already have account? -->
                <div class="mt-3 small">
                Already have an account? <a href="./login.php">Login Here</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelector('[name="showPass"]').addEventListener('change', function(){
            let pass = document.querySelector('input[name="yourPassword"]');
            let confirmPass = document.querySelector('input[name="confirmPassword"]');
            if(this.checked){
                pass.type = "text";
                confirmPass.type = "text";
            }else{
                pass.type = "password";
                confirmPass.type = "password";
            }
        });
    </script>
<?php
    require_once 'footer.php';
?>
    