<?php require_once "./headder.php" ?>
<?php require_once "./sidebar.php" ?>
<?php  
if(isset($_POST['addCat'])){
    $category = $_POST['category'];
    $sql = "INSERT INTO `categories` (`name`) VALUES ('$category')";
    $query = $conn->query($sql);
    if($query){
        echo "<script>toastr.success('Category Added Successfully')</script>";
    }else{
        echo "<script>toastr.error('Failed to Add Category')</script>";
    }
}
?>
<!-- Start Welcome area -->
<div class="all-content-wrapper" style="color: white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="logo-pro">
                    <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
    <?php
    $breadcome = "Product Categories";
    require_once "./top-header.php";
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <h2>
                    Add New Category
                </h2>
                <form action="" method="post">
                    <div class="form-group-inner">
                        <input type="text" name="category" class="form-control" placeholder="Enter Category Name">
                    </div>
                    <button type="submit" class="btn btn-primary" name="addCat">Add Category</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once "./footer.php" ?>