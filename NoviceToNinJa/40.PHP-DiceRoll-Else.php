<?php
$roll = rand(1, 6);
echo '<p>You rolled a ' . $roll . '</p>';

if ($roll == 6) {
    echo '<p>You win!';
} else {
    echo '<p>Sorry, you didn\'t win. Better luck next time!';
}
echo '<p>Thanks for playing</p>';