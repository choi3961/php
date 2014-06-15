<?php
echo "hello";
//fopen
$fp = fopen("title_ss.txt", "r");
$fp02 = fopen("title_ss_m.txt", "w");

if($fp){
	echo "opened\n";
}

//file processing
$r=0;
while(!feof($fp)){

	$str = fgets($fp);
	$length = strlen($str);
	$strnew = "s";
	$roller = 0;
	$roller2 = 0;
	$pos = strrpos($str, "An");
	$pos02 = strrpos($str, "A");
	$pos03 = strrpos($str, "The");	

//////////////////////if An

	if($pos == $length-4){
		echo $str;
		$strnew = "An";
		$roller = $roller + 3;

		//Changes the string character by character.
		while($length-3>$roller){
			$strnew[$roller] = $str[$roller2];
			$roller++;
			$roller2++;
		}
		echo $strnew."\n";
		fputs($fp02, $strnew);
		fputs($fp02, "\r\n");
	}
///////////////////////end of if An

//////////////////////if A
	elseif($pos02 == $length-3){
		echo $str;
		$strnew = "A";
		$roller = $roller + 2;

		//Changes the string character by character.
		while($length-3>$roller){
			$strnew[$roller] = $str[$roller2];
			$roller++;
			$roller2++;
		}
		echo $strnew."\n";
		fputs($fp02, $strnew);
		fputs($fp02, "\r\n");
	}
///////////////////////end of if A

//////////////////////if The
	else if($pos03 == $length-5){
		echo $str;
		$strnew = "The";
		$roller = $roller + 4;

		//Changes the string character by character.
		while($length-3>$roller){
			$strnew[$roller] = $str[$roller2];
			$roller++;
			$roller2++;
		}
		echo $strnew."\n";
		fputs($fp02, $strnew);
		fputs($fp02, "\r\n");
	}

	else{
		fputs($fp02, $str);
	}
///////////////////////end of if The
	/***********
*************/
}


//fclose

fclose($fp);
fclose($fp02);