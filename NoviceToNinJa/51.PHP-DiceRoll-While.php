<?php
$roll = 0;
while ($roll != 6) {
    $roll = rand(1, 6);
    echo '<p>You rolled a ' . $roll . '</p>';

    if ($roll == 6) {
        echo '<p>You win!</p>';
    } else {
        echo '<p>Sorry, you didn\'t win, better luck next time!</p>';
    }
}