<?php

$string = "Hello World";
echo "$string\n";
$string2 = trim($string, "eHlod");
echo $string2;

$string02 = "<title>At the Earth's Core by Edgar Rice Burroughs</title>"
$str = trim($string02, "\t\n\r<title>/");
echo $str."<br>";

$fp01 = fopen("here.txt","w");
fputs($fp01,$str);
fclose($fp01);


/******
pay attention to right end : \t\n\r
******/