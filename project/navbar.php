<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#" style="line-height: 40px">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="./about.php" style="line-height: 40px">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="line-height: 40px">Contact</a>
        </li>
        <?php if (isset($_SESSION['user'])) { ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="./assets/images/<?= !empty($_SESSION['user']['image']) ? $_SESSION['user']['image'] : "profile_picture.png" ?>" alt="" class="img-fluid me-1 d-inline rounded-circle" style="height:40px; width:40px; object-fit: cover">
              <?= isset($_SESSION['user']) ? explode(" ", $_SESSION['user']['name'])[0] : 'Unknown user' ?>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="./update-profile.php">Update Profile</a></li>
              <li><a class="dropdown-item" href="./profile-picture.php">Profile Picture</a></li>
              <li><a class="dropdown-item" href="./change-password.php">Change Password</a></li>
              <?php if ($_SESSION['user']['role'] === "admin") { ?>
                <li><a class="dropdown-item" href="./admin">Admin Panel</a></li>
              <?php } ?>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
            </ul>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="./login.php" style="line-height: 40px">Log in</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./register.php" style="line-height: 40px">Register</a>
          </li>
        <?php } ?>
      </ul>
      <form class="d-flex" role="search">
        <div class="input-group">
          <input class="form-control" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-primary" type="submit">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </div>
      </form>
    </div>
    <div class="dropdown-center ms-2" style="position: relative">
      <button class="btn btn-primary dropdown-toggle position-relative" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-shopping-cart"></i>
        <span class="position-absolute start-100 top-0 bg-danger translate-middle rounded-circle small" style="width: 24px; line-height: 24px;">0</span>
      </button>
      <div class="dropdown-menu p-3 mt-1" style="position: absolute; top: 100%; left: 100%; transform: translateX(-100%)">

      </div>
    </div>
  </div>
</nav>