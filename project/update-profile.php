<?php
require_once 'header.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['token'] != "ia21b2") {
    echo header("Location: ./");
}

if (isset($_POST['updateProfile'])) {
    $name = $conn->real_escape_string(safeData($_POST['name']));
    $email = $conn->real_escape_string(safeData($_POST['email']));
    $address = $conn->real_escape_string(safeData($_POST['address']));

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>toastr.error('Invalid email address')</script>";
    }elseif($email != $_SESSION['user']['email']) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            echo "<script>toastr.error('Email already exists')</script>";
        }else{
            $sql = "UPDATE users SET name='$name', email='$email', address='$address' WHERE id=" . $_SESSION['user']['id'];
            if ($conn->query($sql)) {
                $_SESSION['user']['name'] = $name;
                $_SESSION['user']['email'] = $email;
                $_SESSION['user']['address'] = $address;
                echo "<script>toastr.success('Profile updated successfully')</script>";
            } else {
                echo "<script>toastr.error('Failed to update profile')</script>";
            }
        }
    }else{
        $sql = "UPDATE users SET name='$name', email='$email', address='$address' WHERE id=" . $_SESSION['user']['id'];
        if ($conn->query($sql)) {
            $_SESSION['user']['name'] = $name;
            $_SESSION['user']['email'] = $email;
            $_SESSION['user']['address'] = $address;
            echo "<script>toastr.success('Profile updated successfully')</script>";
        } else {
            echo "<script>toastr.error('Failed to update profile')</script>";
        }
    }
}

?>
<div class="container">
    <div class="row py-5">
        <div class="col-md-4 mx-auto p-4 border rounded shadow">
            <?php if(!isset($_GET['delid'])){ ?>
            <h1>Update Profile</h1>
            <form action="" method="post" class="mb-3">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?= $_SESSION['user']['name'] ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?= $_SESSION['user']['email'] ?>">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" id="address" class="form-control"><?= $_SESSION['user']['address'] ?></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="updateProfile">Update</button>
                </div>
            </form>
            <a href="<?= basename($_SERVER['PHP_SELF']) ?>?delid=<?= $_SESSION['user']['id'] ?>" class="text-danger">Delete Profile</a>
            <?php }else{ ?>
            <h1>Delete Profile</h1>
            <p>Are you sure you want to delete your profile?</p>
            <a href="<?= basename($_SERVER['PHP_SELF']) ?>" class="btn btn-secondary">Cancel</a>
            <a href="delete-profile.php" class="btn btn-danger">Delete</a>
            <?php } ?>
        </div>
    </div>
</div>
<?php
require_once 'footer.php';
?>