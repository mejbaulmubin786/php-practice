<?php

function PatternZero($number) {
    for ($i = 1; $i <= $number; $i++) {
        for ($j = 1; $j <= $number; $j++) {
            echo "*";
        }
        echo "<br>";
    }

}
// Pattern 1
function PatternOne($number) {
    for ($i = 1; $i <= $number; $i++) {
        for ($j = 1; $j <= $i; $j++) {
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
// Pattern 8
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
// Pattern 9
function PatternNine($number) {
    for ($i = 0; $i < $number; $i++) {
        for ($j = 0; $j <= $i; $j++) {
            echo ord('A') - 64 + $j . "&nbsp;";
        }

        echo '<br>';
    }
}

// Pattern 10
function PatternTen($number) {
    for ($i = 0; $i < $number; $i++) {
        for ($j = 0; $j <= $i; $j++) {
            echo ord('A') - 64 + $i . "&nbsp;&nbsp;&nbsp;";
        }

        echo '<br>';
    }
}
// Pattern 11
function PatternEleven($number) {
    for ($i = 0; $i <= $number; $i++) {
        for ($j = 0; $j <= $i; $j++) {
            echo ord('A') + (-64 + $i + $j) . "&nbsp;&nbsp;&nbsp;";
        }

        echo '<br>';
    }
}

// Pattern 12
function PatternTwelve($number) {
    for ($i = 0; $i <= $number; $i++) {
        for ($j = 0; $j <= $i; $j++) {
            echo chr(65 + $j) . "&nbsp;&nbsp;&nbsp;";
        }

        echo '<br>';
    }
}

// Pattern 13
function PatternThirteen($number) {
    for ($i = 0; $i <= $number; $i++) {
        for ($j = 0; $j <= $i; $j++) {
            echo chr(65 + $i) . "&nbsp;&nbsp;&nbsp;";
        }

        echo '<br>';
    }
}

// Pattern 14
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

// Pattern 15
function PatternFifteen($number) {
    for ($i = 1; $i <= $number; $i++) {
        // Print leading stars
        for ($j = $i; $j <= $number; $j++) {
            echo "*";
        }

        for ($j = 1; $j <= ($i - 1) * 2; $j++) {
            echo "&nbsp;&nbsp;";
        }

        for ($j = $i; $j <= $number; $j++) {
            echo "*";
        }

        // Move to the next line
        echo "<br>";
    }

    for ($i = $number; $i >= 1; $i--) {
        // Print leading stars
        for ($j = $i; $j <= $number; $j++) {
            echo "*";
        }

        for ($j = 1; $j <= ($i - 1) * 2; $j++) {
            echo "&nbsp;&nbsp;";
        }

        for ($j = $i; $j <= $number; $j++) {
            echo "*";
        }

        // Move to the next line
        echo "<br>";
    }

}

// Pattern 16
function PatternSixteen($number) {
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

    for ($i = $number; $i > 1; $i--) {
        for ($j = 1; $j < $i; $j++) {
            echo "*";
        }

        for ($j = 1; $j <= ($number - $i + 1) * 2; $j++) {
            echo "&nbsp;&nbsp;";
        }
        for ($j = 1; $j < $i; $j++) {
            echo "*";
        }

        echo "<br>";
    }
}

// Pattern 17
function PatternSeventeen($number) {
    for ($i = 1; $i <= $number; $i++) {
        $num = $i;
        for ($j = 1; $j <= $i; $j++) {
            if ($j == 1) {
                echo $i . "&nbsp;&nbsp;";
            } else {
                $num += ($number - $j + 1);
                echo $num . "&nbsp;&nbsp;";
            }
        }
        echo "<br>";
    }
}

// Pattern 18
function PatternEighteen($number) {
    for ($i = 1; $i <= $number; $i++) {

        for ($j = 1; $j <= $i; $j++) {
            if (($j == 1 || $j == $i) || ($i == $number)) {
                echo "*";
            } else {
                echo "&nbsp;&nbsp;";
            }
        }
        echo "<br>";
    }
}

// Pattern 19
function PatternNinteen($number) {
    $num = 1;
    for ($i = 1; $i <= $number; $i++) {

        for ($j = 1; $j <= $i; $j++) {
            echo $num . " ";
            $num++;
        }

        echo "<br>";
    }
}

// Pattern 20

function PatternTwenty($number) {
    for ($i = 1; $i <= $number; $i++) {
        for ($j = 0; $j < $i; $j++) {
            echo chr(65 + $number - $i + $j) . "&nbsp;&nbsp;&nbsp;";
        }

        echo "<br>";
    }
}
// Pattern 21
function PatternTwentyOne($number) {
    for ($i = 1; $i <= $number; $i++) {

        for ($j = 1; $j <= $number - $i; $j++) {
            echo "&nbsp;&nbsp;";
        }

        for ($j = 1; $j <= $i; $j++) {
            echo $j;
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

// Pattern 21
function PatternTwentyTwo($number) {
    for ($i = 1; $i <= $number; $i++) {

        for ($j = 1; $j <= $number - $i; $j++) {
            echo "&nbsp;&nbsp;";
        }

        for ($j = 1; $j <= $i; $j++) {
            echo $j;
        }

        echo "<br>";
    }
    for ($i = $number - 1; $i >= 1; $i--) {

        for ($j = 1; $j <= $number - $i; $j++) {
            echo "&nbsp;&nbsp;";
        }

        for ($j = 1; $j <= $i; $j++) {
            echo $j;
        }

        echo "<br>";
    }
}

// Pattern 25
function PatternTwentyFive($number) {
    for ($i = 1; $i <= $number; $i++) {

        for ($j = 1; $j <= $number - $i; $j++) {
            echo "&nbsp;&nbsp;";
        }

        for ($j = 1; $j <= $i * 2 - 1; $j++) {
            echo $j;
        }

        echo "<br>";
    }

}
// Pattern 25
function PatternTwentySix($number) {
    for ($i = $number; $i >= 1; $i--) {

        for ($j = 1; $j <= $number - $i; $j++) {
            echo "&nbsp;&nbsp;";
        }

        for ($j = 1; $j <= $i * 2 - 1; $j++) {
            echo $j;
        }

        echo "<br>";
    }

}

// Pattern 27

/*
function PatternTwentySeven($number) {
for ($i = 1; $i <= $number; $i++) {

for ($j = 1; $j <= $i; $j++) {
if (($i % 2 == 1 && $j % 2 == 1) || ($i % 2 == 0 && $j % 2 == 0)) {
echo 1;
} else {
echo 0;
}
}

echo "<br>";
}
}

 */
function PatternTwentySeven($number) {
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
    echo "<h1>Pattern 0</h1>";
    PatternZero($number);
    echo "<br>";
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
    echo "<h1>Pattern 15</h1>";
    PatternFifteen($number);
    echo "<br>";
    echo "<h1>Pattern 16</h1>";
    PatternSixteen($number);
    echo "<br>";
    echo "<h1>Pattern 17</h1>";
    PatternSeventeen($number);
    echo "<br>";
    echo "<h1>Pattern 18</h1>";
    PatternEighteen($number);
    echo "<br>";
    echo "<h1>Pattern 19</h1>";
    PatternNinteen($number);
    echo "<br>";
    echo "<h1>Pattern 20</h1>";

    PatternTwenty($number);
    echo "<br>";
    echo "<h1>Pattern 21</h1>";
    PatternTwentyOne($number);
    echo "<br>";
    echo "<h1>Pattern 22</h1>";
    PatternTwentyTwo($number);
    echo "<br>";
    echo "<h1>Pattern 25</h1>";

    PatternTwentyFive($number);
    echo "<br>";
    echo "<h1>Pattern 26</h1>";
    PatternTwentySix($number);
    echo "<br>";
    echo "<h1>Pattern 27</h1>";

    PatternTwentySeven($number);

    //PatternEighteen($number);
    echo "<br>";
    echo "<h1>anotherPattern</h1>";

    anotherPattern($number);
}

drowPattern(20);
