<?php
/*
----------first part-------
This part downloads log file(gz file) and saves it to a local file called "temp.txt".
*/

echo "hello";

$ftp_handle = scandir("ftp://barosale:3961choi@barosale.com/");
if($ftp_handle){
	echo "ftp file opened";
}

print_r($ftp_handle);



/*
$local_handle = fopen("temp.txt","w");

	while(!feof($ftp_handle))
	{
		$string =fgets($ftp_handle);

		fputs($local_handle, $string);  // save the strings to the file "naverseo.txt"

	}

fclose($local_handle);

*/

fclose($ftp_handle);
?>