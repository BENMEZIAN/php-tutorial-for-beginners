<?php

echo "Your current directory is: ". getcwd(). "<br>";

if(is_dir('uploads')){
    echo "uploads is a directory<br>";
}

$dh = opendir('./uploads');

if ($dh) {
	while ($e = readdir($dh)) {
		if ($e !== '.' && $e !== '..') {
			echo $e , PHP_EOL .'<br>';
		}
	}
}


chdir('..');
echo "Your current directory is: ". getcwd(). "<br>";

chdir('./php');
echo "Your current directory is: ". getcwd(). "<br>";

closedir($dh);


/*
opendir() function to open a directory and get the directory handle and the closedir() function once you are done with the directory.
readdir() function to read the entries in a directory specified by a directory handle.
mkdir() function to create a new directory.
rmdir() function to remove a directory.
is_dir() function to check if a path is a directory and that directory exists in the file system.

*/