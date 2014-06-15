/*
This program receives the html files from "http://www.classicreader.com/".
And makes as many html files as received from the site according to numbering the file names.
*/
<?php

$url_roll = "http://www.classicreader.com/";
$book = "book/";
$fulltext = "fulltext/";
$slash = "/";
$name = "received";
$html = ".html";

for($i=3430 ; $i<3811 ; $i++){

	$url_roll = $url_roll.$fulltext.$i.$slash;
	f_receiving($url_roll);		//receive the file from the server
	$url_roll = "http://www.classicreader.com/";

	$name = $name.$i.$html;
	f_making($name);				//make each file
	$name = "received";
}

function f_receiving($url){
	/*
	----------first part-------
	This part downloads http file and saves it to a local file called "temp.txt".
	*/

	$http_handle = fopen($url, "r");
	if($http_handle){
		echo "http file opened";

		$local_handle = fopen("temp.txt","w");

		while(!feof($http_handle))
		{
			$string =fgets($http_handle);

			fputs($local_handle, $string);  // save the strings to the file "naverseo.txt"

		}
		fclose($local_handle);
		fclose($http_handle);				
	}
	else{
		continue;
	} 

}

function f_making($name){

	/*
	----------second part-------
	This part modifies the strings in the file, adding \r\n at the end of the string 
	to make it human-readable html file in Windows system.
	And makes as many files as received giving new file names.
	*/

	$fp = fopen("temp.txt","r");
	$newfp = fopen("book/".$name,"w");

	$order   = "\n";
	//$order   = array("\r\n", "\n", "\r");
	$replace = "\r\n";

		//transfer the file data into a new file
		while(!feof($fp))
		{
			$string =fgets($fp);

		//modifying the string with \r\n
			$newstr = str_replace($order, $replace, $string);

			fputs($newfp, $newstr);  // save the strings to the file "received?.html"
		}

	fclose($fp);
	fclose($newstr);
}
?>


