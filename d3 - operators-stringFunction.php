<?php
    // Arithmetic operators
    /**
     * +	Addition
     * -	Subtraction
     * *	Multiplication
     * /	Division
     * %	Modulus
     * **	Exponentiation
     */

     $x = 10;
     $y = 6;
    echo $x + $y."<br>"; // Outputs: 16
    echo $x - $y."<br>"; // Outputs: 4
    echo $x * $y."<br>"; // Outputs: 60
    echo $x / $y."<br>"; // Outputs: 1.6666666666667
    echo $x % $y."<br>"; // Outputs: 4
    echo $x ** $y."<br>"; // Outputs: 1000000

    // assignment operators
    /**
     * =	    x = y	x = y
     * +=	    x += y	x = x + y
     * -=	    x -= y	x = x - y
     * *=	    x *= y	x = x * y
     * /=	    x /= y	x = x / y
     * %=	    x %= y	x = x % y
     * **=	    x **= y	x = x ** y
     */

    $x += 3; // $x = $x + 3
    $x -= 2; // $x = $x - 2
    $x *= 4; // $x = $x * 4
    $x /= 2; // $x = $x / 2
    $x %= 5; // $x = $x % 5
    $x **= 2; // $x = $x ** 2
    echo $x."<br>";

    // Comparison operators
    /**
     * ==	Equal	x == y	Returns true if x is equal to y
     * ===	Identical	x === y	Returns true if x is equal to y, and they are of the same type
     * !=	Not equal	x != y	Returns true if x is not equal to y
     * <>	Not equal	x <> y	Returns true if x is not equal to y
     * !==	Not identical	x !== y	Returns true if x is not equal to y, or they are not of the same type
     * >	Greater than	x > y	Returns true if x is greater than y
     * <	Less than	x < y	Returns true if x is less than y
     * >=	Greater than or equal to	x >= y	Returns true if x is greater than or equal to y
     * <=	Less than or equal to	x <= y	Returns true if x is less than or equal to y
     */

     $a = 7;
     $b = "7";

     var_dump($a <> $b); 
     echo "<br>";

     // Logical operators
     /**
      * and
      * or
      * xor
      * &&
      * ||
      */

    // Increment/Decrement operators
    /**
     * ++$x pre-increment
     * $x++ post-increment
     * --$x pre-decrement
     * $x-- post-decrement
     */ 

    // String operators
    /**
     * .	Concatenation	$x . $y	Concatenation of $x and $y
     * .=	Concatenation assignment	$x .= $y	Appends $y to $x
     */

    ++$x;
    echo $x."<br>";
    $x .= " ha ha ha";
    echo $x."<br>";

    /**
     * string functions
     * strlen()
     * str_word_count()
     * strrev()
     * strpos()
     * str_replace()
     * strtoupper()
     * strtolower()
     * ucfirst()
     * ucwords()
     * str_shuffle()
     * substr()
     */

    $m = "Hello world!";
    echo strlen($m)."<br>"; // Outputs: 12
    echo str_word_count($m)."<br>"; // Outputs: 2
    echo strrev($m)."<br>"; // Outputs: !dlroW olleH
    echo strpos($m, "World")."<br>"; // Outputs: 6
    echo str_replace("World", "Bangladesh", $m)."<br>"; // Outputs: Hello Dolly!
    echo strtoupper($m)."<br>"; // Outputs: HELLO WORLD!
    echo strtolower($m)."<br>"; // Outputs: hello world!
    echo ucfirst($m)."<br>"; // Outputs: Hello world!
    echo ucwords($m)."<br>"; // Outputs: Hello World!
    echo str_shuffle($m)."<br>"; // Outputs: random shuffling of the string
    echo substr($m, 6, 5)."<br>"; // Outputs: world!

    $capitalLetters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $smallLetters = "abcdefghijklmnopqrstuvwxyz";
    $numbers = "0123456789";
    $specialChars = "!@#$%^&*()_+{}[]|:<>?";

?>