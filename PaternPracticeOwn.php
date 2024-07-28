<?php
function firstPattern($number) {
    for ($i = 1; $i <= $number; $i++) {
        for ($j = 1; $j <= $number; $j++) {
            echo "*";
        }
        echo "<br>";
    }
}

function secondPattern($number) {
    for ($i = 1; $i <= $number; $i++) {
        for ($j = 1; $j <= $number; $j++) {
            if ($i == 1 || $j == 1 || $i == $number || $j == $number) {
                echo "*";
            } else {
                echo "&nbsp;&nbsp;";
            }
        }
        echo "<br>";
    }
}

function thirdPattern($number) {
    for ($i = 1; $i <= $number; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo "*";
        }
        echo "<br>";
    }
}

function forthPattern($number) {
    for ($i = 1; $i <= $number; $i++) {
        for ($j = 1; $j <= $number - $i; $j++) {
            echo "&nbsp;&nbsp;";
        }
        for ($j = 1; $j <= $i; $j++) {
            echo "*";
        }
        echo "<br>";
    }
}

function fifthPattern($number) {
    for ($i = $number; $i >= 1; $i--) {
        for ($j = 1; $j <= $i; $j++) {
            echo "*";
        }

        echo "<br>";
    }
}

function sixthPattern($number) {
    for ($i = 1; $i <= $number; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo "&nbsp;&nbsp;";
        }

        for ($j = $number; $j >= $i; $j--) {
            echo "*";
        }
        echo "<br>";
    }
}

function seventhPattern($number) {
    for ($i = 1; $i <= $number; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo $j . " ";
        }

        echo "<br>";
    }
}

function eightPattern($number) {
    for ($i = $number; $i >= 1; $i--) {
        for ($j = 1; $j <= $i; $j++) {
            echo $j . " ";
        }

        echo "<br>";
    }
}

function ninePattern($number) {
    $n = 1;
    for ($i = 1; $i <= $number;) {

        for ($j = 1; $j <= $n; $j++) {
            echo $i;
            $i++;
        }
        $n = $i;
        echo "<br>";
    }
}

function ninePattern2($number) {
    $n = 1;
    for ($i = 1; $i <= $number; $i++) {

        for ($j = 1; $j <= $i; $j++) {
            echo $n . " ";
            $n++;
        }
        echo "<br>";
    }
}

function tenthPattern($number) {

    for ($i = 1; $i <= $number; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            if (($i + $j) % 2 == 0) {
                echo 1;
            } else {
                echo 0;
            }
        }
        echo "<br>";
    }
}
//advanced pattern
function petternButterfly($number) {
    for ($i = 1; $i <= $number; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo "*";
        }
        for ($j = 1; $j <= ($number - $i) * 2; $j++) {
            echo "&nbsp;&nbsp;";

        }
        for ($j = 1; $j <= $i; $j++) {
            echo "*";
        }
        echo "<br>";
    }

    for ($i = $number; $i >= 1; $i--) {
        for ($j = 1; $j <= $i; $j++) {
            echo "*";
        }
        for ($j = 1; $j <= ($number - $i) * 2; $j++) {
            echo "&nbsp;&nbsp;";

        }
        for ($j = 1; $j <= $i; $j++) {
            echo "*";
        }
        echo "<br>";
    }

}

function drowPattern($number) {
    echo "<br>";
    echo "<h1>FirstPattern</h1>";
    firstPattern($number);
    echo "<br>";
    echo "<h1>SecondPattern</h1>";
    secondPattern($number);
    echo "<br>";
    echo "<h1>thirdPattern</h1>";
    thirdPattern($number);
    echo "<br>";
    echo "<h1>forthPattern</h1>";
    forthPattern($number);
    echo "<br>";
    echo "<h1>fifthPattern</h1>";
    fifthPattern($number);
    echo "<br>";
    echo "<h1>sixthPattern</h1>";
    sixthPattern($number);
    echo "<br>";
    echo "<h1>seventhPattern</h1>";
    seventhPattern($number);
    echo "<br>";
    echo "<h1>eightPattern</h1>";

    eightPattern($number);
    echo "<br>";
    echo "<h1>ninePattern</h1>";
    ninePattern($number);
    echo "<br>";
    echo "<h1>ninePattern2</h1>";
    ninePattern2($number);
    echo "<br>";
    echo "<h1>tenthPattern</h1>";
    tenthPattern($number);
    echo "<br>";
    echo "<h1>advanced pattern</h1>";
    petternButterfly($number);
}

drowPattern(10);