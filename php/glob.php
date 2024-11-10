<?php

$dh = opendir('..');

$path = '*.php';
$filenames = glob($path);


if ($dh) {
    if($filenames){
        foreach ($filenames as $filename) {
            echo "File is : ".$filename .'<br>';
            // echo basename($filename).'<br>';
            $pathinfo = pathinfo($filename,PATHINFO_ALL);

            if($pathinfo){
                echo "Directory name is : ".$pathinfo['dirname'].'<br>';
                echo "Filename is : ".$pathinfo['filename'].'<br>';
                echo "Extension is : ".$pathinfo['extension'].'<br>';
                echo "Basename is : ".$pathinfo['basename'].'<br>';
            }
            echo "--------------------------------------------------------------".'<br>';
        }
    }
}

// echo '<pre>';
// print_r($pathinfo);
// echo '</pre>';