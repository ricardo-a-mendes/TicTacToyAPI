<?php

include_once 'TicTacToy.php';

$ttt = new TicTacToy();
//$matrix = $ttt->getMatrix();
$matrix = [
    '11' => TicTacToy::PLAYER_1, '12' => '', '13' => '',
    '21' => '', '22' => 'X', '23' => '',
    '31' => '', '32' => '', '33' => 'x',
];

print_r($matrix);
echo '<br>';
print_r($ttt->getN($matrix));
echo '<br>';
var_dump($ttt->checkGame($matrix));
/*
echo '<br>';
print_r($matrix[2]);
echo '<br>';
print_r($matrix[3]);
*/