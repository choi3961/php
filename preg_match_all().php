<?php
$string = "/brown fox jumped [0-9]/";

$paragraph = "The brown fox jumped 1 time over the fence. The green fox did not. Then the brown fox jumped 2 times over the fence";

if (preg_match_all($string, $paragraph, &$matches)) {
  echo count($matches[0]) . " matches found";
}else {
  echo "match NOT found";
}
?>



//echo "position:$pos<br>";
/*******************************
$string = "/'/";
preg_match_all($string, $str,$matches);
$num = count($matches[0]);
//echo $num."<br>";
if($num>1){

echo "matches 2 above<br>";
echo $str."<br>";		
}
*********************************/