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
$pageNumber = isset($_GET['page']) ? (int)$_GET['page'] : null;
if($pageNumber == null){
    echo "<script>window.location.href='product-categories.php?page=1'</script>";
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
        <?php if(!isset($_GET['editId']) && !isset($_GET['deleteId'])){ ?>
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
            <div class="col-md-8">
                <h2>All Categories</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>SN</td>
                            <td>Name</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `categories`";
                        $query = $conn->query($sql);
                        $totalCategories = $query->num_rows;
                        $perPage = 5;
                        $totalPages = ceil($totalCategories / $perPage);
                        $start = ($pageNumber - 1) * $perPage;
                        $sql = "SELECT * FROM `categories` LIMIT $start, $perPage";
                        $query = $conn->query($sql);
                        $sn = $start + 1;
                        while($row = $query->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo $sn++ ?></td>
                            <td><?php echo $row['name'] ?></td> 
                            <td>
                                <a href="product-categories.php?page=<?= $pageNumber ?>&editId=<?php echo $row['id'] ?>" class="btn btn-primary">Edit</a>
                                <a href="product-categories.php?page=<?= $pageNumber ?>&deleteId=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item <?php if($pageNumber <= 1){ echo 'disabled'; } ?>"><a class="page-link" href="product-categories.php?page=<?php echo $pageNumber - 1 ?>">Previous</a></li>
                        <?php for($i = 1; $i <= $totalPages; $i++){ ?>
                        <li class="page-item <?php if($pageNumber == $i){ echo 'active'; } ?>"><a class="page-link" href="product-categories.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
                        <?php } ?>
                        <li class="page-item <?php if($pageNumber >= $totalPages){ echo 'disabled'; } ?>"><a class="page-link" href="product-categories.php?page=<?php echo $pageNumber + 1 ?>">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <?php } ?>  
        <?php 
        if(isset($_POST['editCat'])){
            $category = $_POST['category'];
            $editId = $_POST['editId'];
            $sql = "UPDATE `categories` SET `name` = '$category' WHERE `id` = $editId";
            $query = $conn->query($sql);
            if($query){
                echo "<script>toastr.success('Category Updated Successfully');setTimeout(()=>location.href='product-categories.php?page=".$pageNumber."', 2000)</script>";
            }else{
                echo "<script>toastr.error('Failed to Update Category')</script>";
            }
        }
        if(isset($_GET['editId'])){ 
            $editId = $_GET['editId'];
            $sql = "SELECT * FROM `categories` WHERE `id` = $editId";
            $query = $conn->query($sql);
            $row = $query->fetch_assoc();
        ?>
        <div class="row">
            <div class="col-md-4">
                <h2>
                    Edit Category
                </h2>
                <form action="" method="post">
                    <input type="hidden" name="editId" value="<?= $row['id'] ?>">
                    <div class="form-group-inner">
                        <input type="text" name="category" class="form-control" value="<?php echo $row['name'] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary" name="editCat">Edit Category</button>
                </form>
            </div>
        </div>
        <?php } ?>
        <?php
        if(isset($_POST['delCat'])){
            $deleteId = $_POST['deleteId'];
            $sql = "DELETE FROM `categories` WHERE `id` = $deleteId";
            $query = $conn->query($sql);
            if($query){
                echo "<script>toastr.success('Category Deleted Successfully');setTimeout(()=>location.href='product-categories.php?page=".$pageNumber."', 2000)</script>";
            }else{
                echo "<script>toastr.error('Failed to Delete Category')</script>";
            }
        }
        if(isset($_GET['deleteId'])){
            $deleteId = $_GET['deleteId'];
            $sql = "SELECT * FROM `categories` WHERE `id` = $deleteId";
            $query = $conn->query($sql);
            if($query->num_rows > 0){
            $row = $query->fetch_assoc();
        ?>
        <div class="row">
            <div class="col-md-4">
                <h2>
                    Do you you rally want to delete this category?
                </h2>
                <form action="" method="post" style="display: inline;">
                    <input type="hidden" name="deleteId" value="<?= $row['id'] ?>">
                    <button class="btn btn-primary" name="delCat">Yes</button>
                </form>
                <a href="product-categories.php?page=<?= $pageNumber ?>" class="btn btn-danger">No</a>
            </div>
        </div>
        <?php }} ?>
    </div>
</div>
<?php require_once "./footer.php" ?>