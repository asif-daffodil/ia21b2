<?php  
    session_start();

    if(isset($_SESSION['uname'])){
        header('Location: index.php');
    }

    if(isset($_POST['login'])){
        $_SESSION['uname'] = $_POST['uname'];
        setcookie('info', 'Logged in', time() + 60);
        header('Location: index.php');
    }
?>

<form action="" method="post">
    <input type="text" placeholder="User Name" name="uname">
    <button type="submit" name="login">Login</button>
</form>