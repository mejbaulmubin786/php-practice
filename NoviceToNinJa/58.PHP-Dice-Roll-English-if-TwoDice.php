<?php
$count = [
    1 => 'One',
    2 => 'Two',
    3 => 'Three',
    4 => 'Four',
    5 => 'Five',
    6 => 'Six',
    7 => 'Seven',
    8 => 'Eight',
    9 => 'Nine',
    10 => 'Ten',

];

$roll = rand(1, 10);
echo '<p>You rolled a ' . $count[$roll] . '</p>';

if ($roll == 6) {
    echo '<p>You win</p>';
} else {
    echo '<p>Sorry, you didn\'t win, better luck next time!</p>';
}
