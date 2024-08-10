<?php
$number = 97;
prime($number);
function prime($number) {
    if ($number <= 0) {
        return false;
    }

    while ($number % 2 == 0) {
        echo 2 . " ";
        $number /= 2;
    }

    for ($i = 3; $i <= $number; $i += 2) {
        while ($number % $i == 0) {
            echo $i . " ";
            $number /= $i;
        }

    }

}

echo "--------------\n";

function primeFactors($number) {
    while ($number % 2 == 0) {
        echo "2 ";
        $number = $number / 2;
    }

    for ($i = 3; $i <= sqrt($number); $i += 2) {
        while ($number % $i == 0) {
            echo "$i ";
            $number = $number / $i;
        }
    }

    if ($number > 2) {
        echo "$number ";
    }
}

primeFactors($number);
