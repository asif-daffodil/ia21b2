<?php  
    require_once 'header.php';
    if(!isset($_SESSION['user']) || $_SESSION['user']['token'] != "ia21b2"){
        echo header("Location: ./");
    }
?>
    <h1>Hello, world!</h1>
<?php
    require_once 'footer.php';
?>