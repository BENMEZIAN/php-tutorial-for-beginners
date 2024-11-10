<?php

$source = "example.txt";
$destination = "copy_of_example.txt";

if (!file_exists($source)) {
    echo "Source file does not exist.";
} elseif (!is_writable(dirname($destination))) {
    echo "Destination is not writable.";
} elseif (copy($source, $destination)) {
    echo "File copied successfully!";
} else {
    echo "Failed to copy the file.";
}

rename("copy_of_example.txt", "renamed_copy_of_example.txt");

/* 
copy() : Copies a file content to a new location.
rename() : Renames a file or directory.
*/