<?php

$strings = ["Hello", "World", "PHP", "Programming"];

for ($i = 0; $i < count($strings); $i++) {
    $tem = $strings[$i];
    $vowelWord = 0;

    // Count vowels
    for ($j = 0; $j < strlen($tem); $j++) {
        $vowels = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
        if (in_array($tem[$j], $vowels)) {
            $vowelWord++;
        }
    }

    // Output the results
    echo 'Original String: ' . $tem . ', Vowel Count: ' . $vowelWord . ', Reversed String: ' . strrev($tem);
    echo "<br><br>";
}