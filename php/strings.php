<?php

$str = 'PHP substring PHP';
$arr = ['first_name', 'last_name', 'email']; 

echo "La taille de la chaine est : ".strlen($str)."<br>"; // 3
echo "La sous chaine commence a la position 0 jusqu a la (taille-1) est : ".substr($str, 0, 3)."<br>"; // PHP
echo "La sous chaine commence a la position (-1) jusquau la (-4) est : ".substr($str, -4)."<br>"; // ring (negative offset === from the end)
echo "L'occurence commence a partir de la position : ".strpos($str, 'PHP', 4)."<br>";
echo "La nouvelle chaine est : ".str_replace('PHP', 'JS', $str)."<br>";

$new_str = implode(',',$arr);
echo "New string is : ".$new_str."<br>";  // first_name,last_name,email

$headers = explode(',',$new_str);
foreach($headers as $header){
    echo $header."<br>";
} // first_name  last_name  email


$string = "  geeks for geeks ";
echo "Before trimming : ".$string."<br>";

$s = trim($string);
echo "After trimming : ".$s."<br>";

$uri = $_SERVER['REQUEST_URI'];

echo $uri.'<br>';
echo trim($uri,'/').'<br>'; // remove slash with trim function

$title1 = '  PHP tutorial';
$title2 = 'PHP tutorial  ';

$clean_title1 = ltrim($title1);
$clean_title2 = rtrim($title2);

var_dump($clean_title1);
var_dump($clean_title2);

$comment = "<script>alert('Hello there');</script>";
echo htmlspecialchars($comment).'<br>';

$s1 = 'PHP is cool.';
$s2 = 'PHP';

$result = str_contains($s1, $s2) ? 'is' : 'is not';

echo "The string {$s2} {$result} in the sentence.".'<br>';

$starts = str_starts_with($s1, $s2) ? 'starts' : 'does not start';
$ends = str_ends_with($s1, $s2) ? 'is' : 'is not';

echo "The $str $starts with $s2".'<br>';
echo "The $str $ends ending with $s2".'<br>';

echo "String to lowercase : ".strtolower('PHP').'<br>';
echo "String to uppercase : ".strtoupper('php').'<br>';

echo "String to title case (each word in the string): ".ucwords('php is cool').'<br>';
echo "String to title case (only the first character): ".ucfirst('php is cool').'<br>';

/*
strlen()
substr()
strpos()
implode()
explode()
trim()
ltrim()
rtrim()
str_contains()
htmlspecialchars()
str_starts_with()
str_ends_with()
strtolower()
strtoupper()
ucwords()
ucfirst()
str_split() - Splits a string into an array of characters
str_shuffle() - Randomizes the characters in a string
str_repeat() - Repeats a string a specified number of times
strrev() - Reverses a string
str_word_count() - Returns the number of words in a string
str_word_count() - Returns the number of words in a string
str_pad() - Pads a string with a specified character
*/
