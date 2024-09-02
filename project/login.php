<?php  
    require_once 'header.php';
    if(isset($_SESSION['user'])){
        echo "<script>location.href='./'</script>";
    }
    if(isset($_POST['login'])){
        $yourEmail = $_POST['yourEmail'];
        $yourPassword = $_POST['yourPassword'];
        $sql = "SELECT * FROM users WHERE email = '$yourEmail' AND password = '$yourPassword'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $_SESSION['user'] = $row;
            echo "<script>toastr.success('Login successful');setTimeout(()=>{location.href='./'},2000)</script>";
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
                    <button type="submit" class="btn btn-primary" name="login">Log in</button>
                </form>
            </div>
        </div>
    </div>
<?php
    require_once 'footer.php';
?>
    