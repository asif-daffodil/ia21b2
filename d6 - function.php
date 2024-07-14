<?php  
    function showName ($fname = "Mr", $lname = "Driver") {
        return "$fname $lname <br>";
    }

    echo showName("Asif", "Abir");
    echo showName("Ananta", "Jalil");
    echo showName("Hero", "Alom");
    echo showName("Mahfuzur", "Rahman");
    echo showName("BCS"); 
    echo showName(lname:"Viper", fname:"Russel");

    function addNumbers($num1, $num2): int {
        return $num1 + $num2;
    }

    echo addNumbers(1,2)."<br>";

    function shoeText ($text): string {
        return $text;
    }
?>