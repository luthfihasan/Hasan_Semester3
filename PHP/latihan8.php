<?php
echo "Belajar Operator PHP<br><br>";

// Operator Aritmatika
$a = 5;
$b = 10;
echo "Operator Aritmatika<br>";
echo "$a + $b = " . ($a + $b) . "<br>";
echo "$a - $b = " . ($a - $b) . "<br>";
echo "$a * $b = " . ($a * $b) . "<br>";
echo "$a / $b = " . ($a / $b) . "<br>";
echo "$a % $b = " . ($a % $b) . "<br>";
echo "$a ** $b = " . ($a ** $b) . "<br>";
echo "-a = " . (-$a) . "<br><br>";

// Operator Penugasan
$c = 15;
$d = -5;
echo "Operator Penugasan<br>";
echo "int(15) = " . (int) $c . "<br>";
echo "int(-5) = " . (int) $d . "<br>";
$e = -500;
$f = -50;
$e += $f;
echo "int(-500) += int(-50) = " . (int) $e . "<br><br>";

// Operator Perbandingan
$g = 90;
$h = 80;
$i = 3;
$j = 6;
$k = 'a';
$l = 'b';
$m = 'abc';
echo "Operator Perbandingan<br>";
var_dump($g > $h);
echo "<br>";
var_dump($i >= $i);
echo "<br>";
var_dump($i < $j);
echo "<br>";
var_dump($j <= $i);
echo "<br>";
var_dump($k < $l);
echo "<br>";
var_dump($m < $l);
?>
