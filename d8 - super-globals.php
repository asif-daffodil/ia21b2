<?php  
    // $GLOBALS

    $x = 10;
    function myFunc(){
        $GLOBALS['y'] = 20;
        echo $GLOBALS['x']."<br>";
    }

    myFunc()."<br>";
    echo $y."<br>";

    // $_SERVER
    echo $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."<br>";

    /* echo "<pre>";
    print_r($_SERVER);
    echo "</pre>"; */
?>

<form action="" method="post">
    <input type="text" placeholder="Your Name" name="uname" >
    <button type="submit">Submit</button>
</form> 

<?php  
    echo $_POST["uname"] ?? null;

    //  preg_match('/[^A-Za-z]/', $x);

    $email = "asif123@com.bd";

    if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $email)){
        echo "Valid";
    }else{
        echo "Invalid";
    }
?>