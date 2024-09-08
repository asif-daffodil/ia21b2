<?php  
    require_once 'header.php';
    if (!isset($_SESSION['user']) || $_SESSION['user']['token'] != "ia21b2") {
        echo header("Location: ./");
    }

    if (isset($_POST['updateProfilePicture'])) {
        $profilePicture = $_FILES['profilePicture'];
        $profilePictureName = $profilePicture['name'];
        $profilePictureTmpName = $profilePicture['tmp_name'];
        $profilePictureSize = $profilePicture['size'];
        $profilePictureError = $profilePicture['error'];
        $profilePictureType = $profilePicture['type'];

        $profilePictureExt = explode('.', $profilePictureName);
        $profilePictureActualExt = strtolower(end($profilePictureExt));

        $allowed = array('jpg', 'jpeg', 'png', 'gif');

        if (in_array($profilePictureActualExt, $allowed)) {
            if ($profilePictureError === 0) {
                if ($profilePictureSize < 5000000) {
                    $profilePictureNewName = uniqid('', true) . "." . $profilePictureActualExt;
                    $profilePictureDestination = 'assets/images/' . $profilePictureNewName;
                    move_uploaded_file($profilePictureTmpName, $profilePictureDestination);
                    $sql = "UPDATE users SET image='$profilePictureNewName' WHERE id=" . $_SESSION['user']['id'];
                    if ($conn->query($sql)) {
                        unlink('assets/images/' . $_SESSION['user']['image']);
                        $_SESSION['user']['image'] = $profilePictureNewName;
                        echo "<script>toastr.success('Profile picture updated successfully');setTimeout(()=>{location.href='./'},2000)</script>";
                    } else {
                        echo "<script>toastr.error('Failed to update profile picture')</script>";
                    }
                } else {
                    echo "<script>toastr.error('Your file is too large')</script>";
                }
            } else {
                echo "<script>toastr.error('There was an error uploading your file')</script>";
            }
        } else {
            echo "<script>toastr.error('You cannot upload files of this type')</script>";
        }
    }
?>
    <div class="container">
        <div class="row py-5">
            <div class="col-md-4 mx-auto p-4 border rounded shadow text-center">
                <h1>Profile Picture</h1>
                <form action="" method="post" class="mb-3" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="profilePicture" class="form-label">
                        <img src="./assets/images/<?= !empty($_SESSION['user']['image']) ? $_SESSION['user']['image'] : "profile_picture.png" ?>" alt="" class="img-fluid me-1 d-inline" style="height:300px; width:300px; object-fit: cover">
                            <input type="file" name="profilePicture" id="profilePicture" class="form-control d-none">
                        </label>
                    </div>
                    <button type="submit" name="updateProfilePicture" class="btn btn-primary">Update Profile Picture</button>
                </form>
            </div>
        </div>
    </div>
<?php
    require_once 'footer.php';
?>
    