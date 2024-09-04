<?php  
    require_once 'header.php';
    if(isset($_SESSION['user']) && $_SESSION['user']['token'] == "ia21b2"){
        echo "<script>location.href='./'</script>";
    }
    if(isset($_POST['login'])){
        $yourEmail = $conn->real_escape_string(safeData($_POST['yourEmail']));
        $yourPassword = $conn->real_escape_string(safeData($_POST['yourPassword']));
        $sql = "SELECT * FROM users WHERE email = '$yourEmail'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            if(!password_verify($yourPassword, $row['password'])){
                echo "<script>toastr.error('Login failed')</script>";
            }else{
                $_SESSION['user'] = $row;
                $_SESSION['user']['token'] = "ia21b2";
                echo "<script>toastr.success('Login successful');setTimeout(()=>{location.href='./'},2000)</script>";
            }
        }else{
            echo "<script>toastr.error('Login failed')</script>";
        }
    }
?>
    <div class="container">
        <div class="row py-5">
            <div class="col-md-4 mx-auto border rounded shadow p-4">
                <h2>Login</h2>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="yourEmail">Your Email:</label>
                        <input type="text" name="yourEmail" class="form-control" id="yourEmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="yourPassword">Your Password:</label>
                        <input type="password" name="yourPassword" class="form-control" id="yourPassword" required>
                    </div>
                    <div class="mb-3">
                        <label for="showPass" class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="showPass"> Show Password
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary" name="login">Log in</button>
                </form>
                <!-- don't have account? -->
                <div class="mt-3 small">
                Don't have an account? <a href="./register.php">Register Here</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelector('[name="showPass"]').addEventListener('change', function(){
            let pass = document.querySelector('input[name="yourPassword"]');
            if(this.checked){
                pass.type = "text";
            }else{
                pass.type = "password";
            }
        });
    </script>
<?php
    require_once 'footer.php';
?>
    