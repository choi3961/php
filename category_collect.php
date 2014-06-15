//This program pulls out the all strings from a file
// and parses the strings to filter the title string from the string.
// It opens about 26 files and parses the string and put the filtered
// strings into a file called title_ss.txt.
<?php
$directory = "category_ss/";
$basic_name = "category";
$roller = "a";
$extensigon = ".html";
$fp02 = fopen("title_ss.txt","w");	// file to push the filtered string into.	

for($i=1;$i<0;$i++){
	//file open
	$name = $directory.$basic_name.$roller.$extensigon;
	$fp01 = fopen($name,"r");	// file to pull out the strings from.

$roller++;
echo $name;
	//file processing
	filter($fp01, $fp02);	

	//file close
	fclose($fp01);
	}
fclose($fp02);

function filter($outof, $into){

	///////pull out the strings in a file
	while(!feof($outof)){
		$string = fgets($outof);

		//parses the string to get the title
		$pos = strpos($string, "<i>");
		$pos_last = strpos($string, "</i>");
		if($pos){
			$temp = "t";
			$r = 0;
			//echo "pos$pos_last\n";
		
			
			//put the title in the string character by character.
			while($r<$pos_last-($pos+3)){
				$temp[$r] = $string[$pos+3+$r];
				$r++;
				
			}
		//echo $temp."\n";
			fputs($into, $temp);
			fputs($into, "\r\n");
		}

	}

}

