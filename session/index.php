<?php  
    session_start();

    if(!isset($_SESSION['uname'])){
        header('Location: login.php');
    }

    echo $_SESSION['uname'];

    if(!isset($_COOKIE['info']) || $_COOKIE['info'] != 'Logged in'){
        header('Location: logout.php');
    }

    $myInfo = [
        'name' => 'Asif Abir',
        'dob' => '1987-09-10',
        'gender' => 'Male'
    ];

    echo "<br>";
    echo json_encode($myInfo);
    echo "<br>";
    echo "<pre>";
    print_r(json_decode('{"name": "Asif Abir", "dob": "1987-09-10", "gender": "Male"}', true));
    echo "</pre>";

?>

<a href="./logout.php">
    <button>Logout</button>
</a>

<script>
    const myInfo = {
        name: 'Asif Abir',
        dob: '1987-09-10',
        gender: 'Male'
    }
</script>