<?php  
    // index array
    // $arr = array("Asif", "Abir", "Ananta", "Jalil",);
    $cityArr = ["Dhaka", "Chittagong", "Khulna", "Rajshahi"];
    echo $cityArr[0]."<br>";
    // echo $cityArr."<br>";
    echo "<pre>";
    print_r($cityArr);
    echo "</pre>";

    for ($i = 0; $i < count($cityArr); $i++) {
        echo $cityArr[$i]."<br>";
    }

    foreach ($cityArr as $city) {
        echo $city."<br>";
    }

    // associative array
    $studentInfo = ["name" => "Asif Abir", "age" => 24, "city" => "Dhaka"];
    echo $studentInfo["age"]."<br>";
    echo "<pre>";
    print_r($studentInfo);
    echo "</pre>";

    foreach ($studentInfo as $x => $student) {
        echo ucfirst($x)." : ".$student."<br>";
    }
    
    // multi-dimensional array
    $multiArr = [
        ["Asif", "Abir", "Dhaka"],
        ["Ananta", "Jalil", "Chittagong"],
        ["Hero", "Alom", "Khulna"],
        ["Mahfuzur", "Rahman", "Rajshahi"]
    ];

    echo $multiArr[0][2]."<br>";
    echo "<pre>";
    print_r($multiArr);
    echo "</pre>";

    foreach ($multiArr as $arr) {
        foreach ($arr as $data) {
            echo $data." ";
        }
        echo "<br>";
    }
?>