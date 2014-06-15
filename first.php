<?php
$str = 'a';
echo ++$str; // b

$str = 'z';
echo ++$str; // aa

$str = 'aA';
echo ++$str; // aB

echo "\n";

$t = 'Z';
$t = $t++;
echo ++$t;
