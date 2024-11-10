<?php

echo "Simple function".'<br>';

function multiply(int|float $x,int|float $y){
	return $x * $y;
}

$res = multiply(10,20);
echo $res;

echo '<br>';
echo "Anonymous function".'<br>';

$multiply = function ($x, $y) {
	return $x * $y;
};

echo $multiply(20,20);

echo '<br>';

function double_it($element){
	return $element * 2;
}

$list = [10, 20, 30];

$double_list = array_map('double_it', $list);
echo '<pre>'.print_r($double_list,true).'</pre>';


// Alternative approach
$double_list = array_map(function($element){
	return $element * 2;
}, $list);

echo '<pre>'.print_r($double_list,true).'</pre>';

echo "Arrow function".'<br>';

$add = fn (int|float $a,int|float $b) => $a + $b;

echo "Addition: " . $add(10, 20);

echo '<br>';

$double_list = array_map(
	fn($element) =>  $element * 2,
	$list
);

echo '<pre>'.print_r($double_list,true).'</pre>';



/*
Summary
The following illustrates the basic syntax for arrow functions: fn (arguments) => expression;
fn : keyword
arguments : list of arguments
*/
