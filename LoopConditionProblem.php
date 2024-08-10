<?php
$number = 12;
$string = "mubinibum";

run($number, $string);
//Problem1
function Problem1($number) {
    for ($i = 1; $i <= $number; $i++) {
        if ($i % 3 == 0 && $i % 5 == 0) {
            echo "$i = FizzBuzz" . "<br>";
        } elseif ($i % 3 == 0) {
            echo "$i = Fizz" . "<br>";
        } elseif ($i % 5 == 0) {
            echo "$i = Buzz" . "<br>";
        } else {
            echo $i . "<br>";
        }

    }

}
//End Problem1
//Problem2
function Problem2($number) {
    $sum = 0;
    for ($i = 1; $i <= $number; $i++) {

        if ($i % 2 == 0) {
            $sum += $i;
        }

    }
    echo $sum . "<br>";
}
//End Problem2

//Problem3
function isPrime($n) {
    if ($n < 2) {
        return false;
    }
    for ($i = 2; $i <= $n / 2; $i++) {
        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}

function Problem3($number) {
    for ($i = 2; $i <= $number; $i++) {
        if (isPrime($i)) {
            echo $i . " ";
        }
    }
    echo "<br>"; // Newline for cleaner output
}

/*
function isPrime($n) {
if ($n < 2) {
return false;
}
if ($n == 2) {
return true; // 2 হল সবচেয়ে ছোট এবং একমাত্র জোড়া প্রাইম সংখ্যা
}
if ($n % 2 == 0) {
return false; // জোড়া সংখ্যা ২ ছাড়া অন্য কোনো প্রাইম সংখ্যা হতে পারে না
}
for ($i = 3; $i <= sqrt($n); $i += 2) {
if ($n % $i == 0) {
return false;
}
}
return true;
}

function Problem3($number) {
for ($i = 2; $i <= $number; $i++) {
if (isPrime($i)) {
echo $i . " ";
}
}
echo "<br>"; // Newline for cleaner output
}
 */
//End Problem3

//Problem4
function Problem4($number) {
    $factorial = 1;
    for ($i = 1; $i <= $number; $i++) {
        $factorial *= $i;
    }
    echo $factorial . "<br>"; // Newline for cleaner output
}
//End Problem4

//Problem5
function Problem5($number) {
    $a = 0;
    $b = 1;

    for ($i = 0; $i < $number; $i++) {
        echo $a . " ";

        $tamp = $a + $b;
        $a = $b;
        $b = $tamp;
    }

}
//End Problem6

//Problem5
function Problem6($number) {
    $rev = 0;
    while ($number > 0) {
        $remin = $number % 10;
        $rev = ($rev * 10) + $remin;
        $number = (int) ($number / 10);
    }

    echo $rev . "<br>";

}
//End Problem6

//Problem7

function Problem7($string) {
    $string2 = strrev($string);

    if ($string === $string2) {
        echo "$string is Palindrom";
    } else {
        echo "the $string is not Palindrom";
    }
}
//End Problem7

function run($number, $string) {
    echo "<h1>Problem 1(FizzBuzz Variation) </h1>" . "<br>";
    Problem1($number);
    echo "<br> <h1>Problem 2(Sum of Even Numbers) </h1>" . "<br>";
    Problem2($number);
    echo "<br> <h1>Problem 3(Prime Numbers)</h1>" . "<br>";
    Problem3($number);
    echo "<br> <h1>Problem 4(Factorial of a Number)</h1>" . "<br>";
    Problem4($number);
    echo "<br><h1>Problem 5(Fibonacci Series)</h1>" . "<br>";
    Problem5($number);
    echo "<br><h1>Problem 6(Reverse a Number)</h1>" . "<br>";
    Problem6($number);
    echo "<br><h1>Problem 7(Palindrome Check)</h1>" . "<br>";
    Problem7($string);
}
