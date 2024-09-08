<?php  
    require_once 'header.php';
    if (!isset($_SESSION['user']) || $_SESSION['user']['token'] != "ia21b2") {
        echo header("Location: ./");
    }

    if (isset($_POST['deleteProfile'])) {
        $password = $conn->real_escape_string(safeData($_POST['password']));
        $sql = "SELECT * FROM users WHERE id=" . $_SESSION['user']['id'];
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $sql = "DELETE FROM users WHERE id=" . $_SESSION['user']['id'];
            if ($conn->query($sql)) {
                unset($_SESSION['user']);
                echo "<script>toastr.success('Profile deleted successfully');setTimeout(()=>{location.href='./'},2000)</script>";
            } else {
                echo "<script>toastr.error('Failed to delete profile')</script>";
            }
        } else {
            echo "<script>toastr.error('Password does not match')</script>";
        }
    }
?>

<div class="container">
    <div class="row py-5">
        <div class="col-md-4 mx-auto p-4 border rounded shadow">
            <h1>Delete Profile</h1>
            <form action="" method="post" class="mb-3">
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <button type="submit" name="deleteProfile" class="btn btn-danger">Delete Profile</button>
            </form>
        </div>
    </div>

<?php
    require_once 'footer.php';
?>
    