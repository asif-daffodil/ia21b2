<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="index.html" class=""><h3>Admin Panel</h3></a>
        </div>
        <div class="nalika-profile">
            <div class="profile-dtl">
                <a href="#"><img src="../assets/images/<?= !empty($_SESSION['user']['image']) ? $_SESSION['user']['image']:"profile_picture.png" ?>" alt="" /></a>
                <h2><?= $_SESSION['user']['name'] ?></h2>
            </div>
            <div class="profile-social-dtl">
                <ul class="dtl-social">
                    <li><a href="#"><i class="icon nalika-facebook"></i></a></li>
                    <li><a href="#"><i class="icon nalika-twitter"></i></a></li>
                    <li><a href="#"><i class="icon nalika-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <li class="active">
                        <a class="" href="./">
                            <i class="icon nalika-home icon-wrap"></i>
                            <span class="mini-click-non <?= $pageName == "index.php" ? "text-danger":null ?>">Dashboard</span>
                        </a>
                    </li>
                    <li class="<?= $pageName == "all-products.php" || $pageName == "add-products.php" || $pageName == "product-categories.php" || $pageName == "product-brands.php" ? "active":null ?>">
                        <a class="has-arrow" href="">
                            <!-- nalika products icon -->
                            <i class="icon nalika-table icon-wrap"></i>
                            <span class="mini-click-non">Products</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li>
                                <a href="./all-products.php">
                                    <span class="mini-sub-pro <?= $pageName == "all-products.php" ? "text-danger":null ?>">All Products</span>
                                </a>
                            </li>
                            <li>
                                <a href="./add-products.php">
                                    <span class="mini-sub-pro <?= $pageName == "add-products.php" ? "text-danger":null ?>">Add new Products</span>
                                </a>
                            </li>
                            <li>
                                <a href="./product-categories.php">
                                    <span class="mini-sub-pro <?= $pageName == "product-categories.php" ? "text-danger":null ?>">Product Categories</span>
                                </a>
                            </li>
                            <li>
                                <a href="./product-brands.php">
                                    <span class="mini-sub-pro <?= $pageName == "product-brands.php" ? "text-danger":null ?>">Brands</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a class="" href="./orders.php">
                            <i class="icon nalika-shopping-cart icon-wrap"></i>
                            <span class="mini-click-non <?= $pageName == "orders.php" ? "text-danger":null ?>">Orders</span>
                        </a>
                    </li>
                    <li class="active">
                        <a class="" href="./users.php">
                            <i class="icon nalika-user icon-wrap"></i>
                            <span class="mini-click-non <?= $pageName == "users.php" ? "text-danger":null ?>">Users</span>
                        </a>
                    </li>
                    <li class="active">
                        <a class="" href="../">
                            <i class="icon nalika-favorites icon-wrap"></i>
                            <span class="mini-click-non">Go to Home</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
</div>