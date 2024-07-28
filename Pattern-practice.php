<?php
// Pattern 1
function PatternOne($number) {
    for ($i = 0; $i < $number; $i++) {
        for ($j = 0; $j <= $i; $j++) {
            echo "*";
        }
        echo "<br>";
    }

}
// Pattern 2
function PatternTwo($number) {
    for ($i = 0; $i < $number; $i++) {
        for ($j = 0; $j < $number - $i; $j++) {
            echo "*";
        }
        echo "<br>";
    }

}
// Pattern 3
function PatternThree($number) {
    for ($i = 1; $i <= $number; $i++) {
        for ($j = $number; $j > $i; $j--) {
            echo "&nbsp&nbsp";
        }
        for ($j = 1; $j <= $i; $j++) {
            echo "*";
        }
        echo "<br>";
    }

}
// Pattern 4
function PatternFour($number) {
    for ($i = 0; $i <= $number; $i++) {
        for ($j = 0; $j < $i; $j++) {
            echo "&nbsp&nbsp";
        }
        for ($j = $number; $j > $i; $j--) {
            echo "*";
        }
        echo "<br>";
    }

}

// Pattern 5
function PatternFive($number) {
    for ($i = 1; $i <= $number; $i++) {
        for ($j = $number; $j > $i; $j--) {
            echo "&nbsp&nbsp";
        }
        for ($k = 1; $k <= (2 * $i - 1); $k++) {
            echo "*";
        }
        echo "<br>";
    }

}

// Pattern 6
function PatternSix($number) {
    for ($i = $number; $i >= 1; $i--) {
        for ($j = $number; $j > $i; $j--) {
            echo "&nbsp&nbsp";
        }
        for ($k = 1; $k <= (2 * $i - 1); $k++) {
            echo "*";
        }
        echo "<br>";
    }

    // for ($i = 0; $i <= $number; $i++) {
    //     for ($j = 0; $j < $i; $j++) {
    //         echo "&nbsp&nbsp";
    //     }
    //     for ($k = 0; $k < (($number - $i) * 2 - 1); $k++) {
    //         echo "*";
    //     }
    //     echo "<br>";
    // }

}

// Pattern 7
function PatternSeven($number) {
    for ($i = 1; $i <= $number; $i++) {
        for ($j = 0; $j < $i; $j++) {
            echo '*';
        }
        echo '<br>';
    }

    for ($i = $number; $i >= 1; $i--) {

        for ($j = 1; $j <= $i; $j++) {
            echo '*';
        }
        echo '<br>';
    }

}

// Pattern 8
/*
function PatternEight($number) {
for ($i = 1; $i <= $number; $i++) {
for ($j = $number; $j > $i; $j--) {
echo "&nbsp&nbsp";
}

for ($j = 1; $j <= ($i * 2 - 1); $j++) {
echo "*";
}
echo '<br>';

}

for ($i = 1; $i <= $number; $i++) {
for ($j = 1; $j < $i; $j++) {
echo "&nbsp&nbsp";
}

for ($j = $number; $j <= ($j * 2 - 1); $j--) {
echo "*";
}
echo '<br>';

}

}

 */

function PatternEight($number) {

    for ($i = 1; $i <= $number; $i++) {
        for ($j = $number; $j > $i; $j--) {
            echo "&nbsp;&nbsp;";
        }
        for ($k = 1; $k <= (2 * $i - 1); $k++) {
            echo "*";
        }
        echo "<br>";
    }
    for ($i = $number - 1; $i >= 1; $i--) {
        for ($j = $number; $j > $i; $j--) {
            echo "&nbsp;&nbsp;";
        }
        for ($k = 1; $k <= (2 * $i - 1); $k++) {
            echo "*";
        }
        echo "<br>";
    }

}

function PatternNine($number) {
    for ($i = 0; $i < $number; $i++) {
        for ($j = 0; $j <= $i; $j++) {
            echo ord('A') - 64 + $j . "&nbsp;";
        }

        echo '<br>';
    }
}

function PatternTen($number) {
    for ($i = 0; $i < $number; $i++) {
        for ($j = 0; $j <= $i; $j++) {
            echo ord('A') - 64 + $i . "&nbsp;&nbsp;&nbsp;";
        }

        echo '<br>';
    }
}

function PatternEleven($number) {
    for ($i = 0; $i <= $number; $i++) {
        for ($j = 0; $j <= $i; $j++) {
            echo ord('A') + (-64 + $i + $j) . "&nbsp;&nbsp;&nbsp;";
        }

        echo '<br>';
    }
}

function PatternTwelve($number) {
    for ($i = 0; $i <= $number; $i++) {
        for ($j = 0; $j <= $i; $j++) {
            echo chr(65 + $j) . "&nbsp;&nbsp;&nbsp;";
        }

        echo '<br>';
    }
}

function PatternThirteen($number) {
    for ($i = 0; $i <= $number; $i++) {
        for ($j = 0; $j <= $i; $j++) {
            echo chr(65 + $i) . "&nbsp;&nbsp;&nbsp;";
        }

        echo '<br>';
    }
}

function PatternForteen($number) {
    for ($i = 1; $i <= $number; $i++) {
        for ($j = $number; $j > $i; $j--) {
            echo "&nbsp;&nbsp;";
        }
        for ($k = 1; $k <= $i; $k++) {
            echo $k;
        }
        for ($l = $i - 1; $l >= 1; $l--) {
            echo $l;
        }
        echo "<br>";
    }

}

// function PatternForteen($number) {
//     for ($i = 1; $i <= $number; $i++) {
//         for ($j = $number; $j > $i; $j--) {
//             echo "&nbsp;&nbsp;";
//         }
//         for ($k = 1; $k <= $i; $k++) {
//             echo $k;
//         }
//         for ($l = $i - 1; $l >= 1; $l--) {
//             echo $l;
//         }
//         echo "<br>";
//     }

// }

function anotherPattern($number) {
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

function drowPattern($number) {
    echo "<h1>Pattern 1</h1>";
    PatternOne($number);
    echo "<br>";
    echo "<h1>Pattern 2</h1>";
    PatternTwo($number);
    echo "<br>";
    echo "<h1>Pattern 3</h1>";
    PatternThree($number);
    echo "<br>";
    echo "<h1>Pattern 4</h1>";
    PatternFour($number);
    echo "<br>";
    echo "<h1>Pattern 5</h1>";
    PatternFive($number);
    echo "<br>";
    echo "<h1>Pattern 6</h1>";
    PatternSix($number);
    echo "<br>";
    echo "<h1>Pattern 7</h1>";
    PatternSeven($number);
    echo "<br>";
    echo "<h1>Pattern 8</h1>";
    PatternEight($number);
    echo "<br>";
    echo "<h1>Pattern 9</h1>";
    PatternNine($number);
    echo "<br>";
    echo "<h1>Pattern 10</h1>";
    PatternTen($number);
    echo "<br>";
    echo "<h1>Pattern 11</h1>";
    PatternEleven($number);
    echo "<br>";
    echo "<h1>Pattern 12</h1>";
    PatternTwelve($number);
    echo "<br>";
    echo "<h1>Pattern 13</h1>";
    PatternThirteen($number);
    echo "<br>";
    echo "<h1>Pattern 14</h1>";
    PatternForteen($number);
    echo "<br>";
    echo "<h1>anotherPattern</h1>";
    anotherPattern($number);
}

drowPattern(20);
// function PatternOw($number) {
//     for ($i = 1; $i < $number; $i++) {
//         for ($j = $number; $j > $i; $j--) {
//             echo "&nbsp&nbsp";
//         }

//         for ($j = 0; $j < $i; $j++) {
//             for ($k = 1; $k <= $i + $j; $k++) {
//                 echo "*";
//             }

//         }

//         echo "<br>";
//     }

// }
// $num = 10;
// for ($i = 1; $i <= $num; $i++) {
//     for ($j = 1; $j <= $i; $j++) {
//         echo "&nbsp&nbsp";
//     }

//     for ($j = 1; $j <= ($i * 2 - 1); $j++) {
//         echo "*";
//     }
//     echo '<br>';

// }