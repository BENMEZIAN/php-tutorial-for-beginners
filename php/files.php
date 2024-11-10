<?php

$filename = 'readme.txt';

if (file_exists($filename)) {
    $message = "The file $filename exists"."<br>";
    echo $message;
} else {
    die("The file $filename does not exist.");
}

$f = fopen($filename, 'a+'); // open file in append mode after opening it in read mode

if ($f) {

    $text = "This is a test\n";
    fwrite($f, $text);

    fclose($f);
} else {
    echo 'Unable to open file';
}

if (file_exists("gfg.txt")) {
    unlink("gfg.txt");
    echo "File deleted successfully!";
} else {
    echo "File does not exist.";
}

// Download file
$filename = 'readme.pdf';

if (file_exists($filename)) {
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: ' . filesize($filename));
	readfile($filename);
	exit;
}







/*
1.Reading the Entire File
$contents = fread($file, filesize($filename));
$contents = str_replace("\n", "<br>", $contents); // first method
------------------------------------------------------------------
$contents = file_get_contents($filename); // second method
$contents = str_replace("\n", "<br>", $contents);

2.Reading a File Line by Line
while (($line = fgets($f)) !== false) {
    echo $line . "<br>";
}// first method
-------------------------------------------------------------------
while (!feof($f)) {
    $line = fgets($f);
    echo $line . "<br>";
}// second method

3.Reading some characters from file
$contents = fread($f, 100);
$contents = str_replace("\n", "<br>", $contents);

4.Writing to a File
$text = "This is a test\n";
fwrite($f, $text);

5.Closing a File
fclose($f);

6.Deleting a File
if (file_exists(filename)) {
    unlink(filename);
    echo "File deleted successfully!";
} else {
    echo "File does not exist.";
}

7.Downloading a File
$filename = 'readme.pdf';

if (file_exists($filename)) {
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: ' . filesize($filename));
	readfile($filename);
	exit;
}



fopen() – Opens a file : Use the fopen() function with one of the mode w, w+, a, a+, x, x+, c, c+ to create a new file.
fclose() – Closes a file
fread() – Reads data from a file
fwrite() – Writes data to a file
file_exists() – Checks if a file exists
unlink() – Deletes a file
readfile() – Downloads a file
*/