<?php require_once "./headder.php" ?>
<?php require_once "./sidebar.php" ?>

<link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.min.css">
<script src="https://cdn.datatables.net/2.1.7/js/dataTables.min.js"></script>

    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
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
            $breadcome = "All Products";
            require_once "./top-header.php"; 
        ?>
        <div class="container">
            <div class="row" style="background: #fff; padding: 20px 0">
                <div class="col-md-12">
                    <table id="example" class="table">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Regular Price</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $products = $conn->query("SELECT p.*, b.name as brand_name, c.name as category_name FROM `products` p 
                                                          JOIN `brands` b ON p.brand_id = b.id 
                                                          JOIN `categories` c ON p.category_id = c.id 
                                                          ORDER BY p.id DESC");
                                if($products->num_rows > 0){
                                    while($product = $products->fetch_assoc()){
                            ?>
                            <tr>
                                <td><?= $product['name'] ?></td>
                                <td><?= $product['category_name'] ?></td>
                                <td><?= $product['brand_name'] ?></td>
                                <td><?= $product['regular_price'] ?></td>
                                <td><img src="../assets/images/products/<?= $product['image'] ?>" alt="" style="width: 50px; height: 50px; object-fit: contain;"></td>
                                <td>
                                    <a href="edit-product.php?id=<?= $product['id'] ?>" class="btn btn-primary">Edit</a>
                                    <button data-did="<?= $product['id'] ?>" class="btn btn-danger delBtn">Delete</button>
                                </td>
                            </tr>
                            <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Do you really want to delete the product <span id="productName"></span>?</h4>
            </div>
            <div class="modal-body">
                <button class="btn btn-danger" id="yesBtn" data-did="" >Yes</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
            </div>
        </div>

    </div>
</div>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "lengthMenu": [5, 10, 25, 50]
            });
            $(document).on('click', '.delBtn', function(){
                const gpd = $(this).attr('data-did');
                $.post({
                url: "ajax/getProductDetails.php",
                data: {
                    gpd: gpd
                },
                success: function(data) {
                    let product = JSON.parse(data);
                    $("#productName").html(product.name);
                }
            });
            $("#yesBtn").attr("data-did", gpd);
            $("#myModal").modal("show");
            });

            $(document).on("click", "#yesBtn", function() {
            let did = $(this).data("did");
            $.post({
                url: "ajax/getProductDetails.php",
                data: {
                    did: did
                },
                success: function(data) {
                    if (data === "success") {
                        toastr.success("Product deleted successfully");
                        setTimeout(() => {
                            location.reload();
                        }, 2000);
                    } else {
                        toastr.error("Failed to delete product");
                    }
                }
            });
        });
        });
    </script>
<?php require_once "./footer.php" ?>