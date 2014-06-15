/*
This program download gunzip file(log file) and saves to a local file.

And then it uncompresses gunzip file(log file) and filters search engine visit(naver.com)
and make a new file(naverseo2) filtered.

It could be divided into three parts.
The first part downloads logfile(gzfile) file and saves to a local file called "temp.txt"

The second part uncompresses the downloaded file("temp.txt") and filters the strings in the file
according to the search engine visit(naver.com or NHN) and saves the strings into the file("naverseo.txt").

The third part modifies the strings in the file("naverseo.txt") into a new file("naverseo2.txt), 
adding \r\n at the end of the string to make it human-readable in Windows system.
 .
*/

<?php
/*
----------first part-------
This part downloads log file(gz file) and saves it to a local file called "temp.txt".
*/

$ftp_handle = fopen("ftp://barosale:3961choi@barosale.com/logs/sinto.barosale.com-May-2014.gz", "r");
if($ftp_handle){
	echo "ftp file opened";
}
$local_handle = fopen("temp.txt","w");

	while(!feof($ftp_handle))
	{
		$string =fgets($ftp_handle);

		fputs($local_handle, $string);  // save the strings to the file "naverseo.txt"

	}

fclose($local_handle);
fclose($ftp_handle);
?>

<?php
/*
----------second part-------
This part uncompresses gunzip file(log file) and filters search engine visit(naver.com)
and make a new file(naverseo2) filtered.

It could be divided into two parts.
The first part uncompresses a file and filters the strings in the file accroding to the
search engine(NHN).
The second part modifies the strings in the file, adding \r\n at the end of the string.
*/

$fp = gzopen("temp.txt","r");	//unziped already
$outfp = fopen("naverseo.txt","w");

	//transfer the file data into a new file
	while(!feof($fp))
	{
		$string =fgets($fp);

	//filtering the strings according "NHN"
		$pos = strpos($string, "NHN");

		if ($pos !== false){
			fputs($outfp, $string);  // save the strings to the file "naverseo.txt"
		}

	}

	//// file close
	gzclose($fp);
	fclose($outfp);	
?>

<?php
/*
----------thirdd part-------
This part modifies the strings in the file, adding \r\n at the end of the string 
to make it human-readable in Window System.
*/

$fp = fopen("naverseo.txt","r");
$newfp = fopen("naverseo2.txt","w");

$order   = "\n";
//$order   = array("\r\n", "\n", "\r");
$replace = "\r\n";

	//transfer the file data into a new file
	while(!feof($fp))
	{
		$string =fgets($fp);

	//modifying the string with \r\n
		$newstr = str_replace($order, $replace, $string);

		fputs($newfp, $newstr);  // save the strings to the file "naverseo.txt"
	}

fclose($fp);
fclose($newstr);
?>

<?php
/*
----------fourth(extra) part-------
This part modifies the strings in the file, adding \r\n at the end of the string 
to make it human-readable in Window System not only for NHN included strings but also for all the strings of the logfile .
*/

$fp = gzopen("temp.txt","r");	//unziped already when the function is called.

$newfp = fopen("allseostrings.txt","w");

$order   = "\n";
//$order   = array("\r\n", "\n", "\r");
$replace = "\r\n";

	//transfer the file data into a new file
	while(!feof($fp))
	{
		$string =fgets($fp);

	//modifying the string with \r\n
		$newstr = str_replace($order, $replace, $string);

		fputs($newfp, $newstr);  // save the strings to the file "allseostrings.txt"
	}

fclose($fp);
fclose($newstr);
?>
