<?php

$lengths = [10, 20, 30];

// calculate areas
$areas = array_map(function ($length) {
	return $length * $length;
}, $lengths);

$i = 1;
foreach($areas as $area){
    echo "Area number $i : ".$area.'</br>';
    $i++;
}

echo '<pre>'.print_r($areas,true).'</pre>';

$numbers = [1, 2, 3, 4, 5];

$odd_numbers = array_filter(
	$numbers,
	function ($number) {
		return $number % 2 === 1;
	}
);

echo '<pre>'.print_r($odd_numbers,true).'</pre>';




/*
Summary
-Use the PHP array_map() method to create a new array by applying a callback function to every element of 
another array.
-Use the PHP array_filter() function to filter elements of an array using a callback.

*/