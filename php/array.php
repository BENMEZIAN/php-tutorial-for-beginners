<?php
// Creating arrays
$numbers = array(1, 2, 3, 4, 5); // using array() construct
$empty_array = []; // empty array using []
$scores = [1, 2, 3]; // with 3 numbers
$car = array("brand"=>"Ford", "model"=>"Mustang", "year"=>1964); // Associative array

function print_array(array $data){
	echo '<pre>';
	print_r($data);
	echo '</pre>';
}

// develop function which prints key value of associative array
function print_key_value(array $data){
    foreach($data as $key => $value){
        echo $key.' => '.$value.'<br>';
    }
}

function access_array(array $data,int|string $index){
    echo $data[$index].'<br>';
}

// function tp update array value
function update_array(array &$data,int|string $index,int|string $value){
    $data[$index] = $value;
}

// function to add element in array to each type of array
function add_element(array &$data,int|string $value){
    $data[] = $value;
}

function add_element_assoc(array &$data,int|string $key,int|string $value){
    $data[$key] = $value;
}

// Add from beginning
function add_from_beginning(array &$data, int|string $value) {
    array_unshift($data, $value);
}

// Add element from beginning assoc
function add_from_beginning_assoc(array &$data, int|string $key, int|string $value){
    $data = array($key => $value) + $data;
}

function remove_element(array &$data,int|string $index){
    unset($data[$index]);
}

function remove_element_assoc(array &$data,int|string $key){
    unset($data[$key]);
}

// function to get size of array
function get_size(array $data){
    return count($data);
}


// Printing array
print_array($numbers);
print_array($car);
print_key_value($car); // Printing key value

// Accessing array element
access_array($numbers,3);
access_array($car,'brand');

// Updating array element
update_array($numbers,3,10);
update_array($car,'brand','BMW');

print_array($numbers);
print_array($car);


// Adding array element
add_element($numbers,10);
add_element_assoc($car,'color','black');
print_array($numbers);
print_array($car);


// Removing array element
remove_element($numbers,3);
remove_element_assoc($car,'year');
print_array($numbers);
print_array($car);

// Add element from beginning
add_from_beginning($numbers,0);
add_from_beginning_assoc($car,'key','value');
print_array($numbers);
print_array($car);

// Getting size of array
echo get_size($numbers).'<br>';
echo get_size($car).'<br>';


$roles = [
	'admin' => 1,
	'approver' => 2,
	'editor' => 3,
	'subscriber' => 4
];

$result = array_key_exists('admin', $roles); // checks is a key exists
var_dump($result); // bool(true)

$keys = array_keys($numbers);
echo '<pre>'.print_r($keys,true). '</pre>';

$result = in_array(10,$numbers);
var_dump($result); // bool(true)


$server_side = ['PHP'];
$client_side = ['JavaScript', 'CSS', 'HTML'];

$full_stack = array_merge($server_side, $client_side);
echo '<pre>'.print_r($full_stack,true). '</pre>';

$book = [
	'PHP Awesome',
	999,
	['Programming', 'Web development'],
];

$preserved = array_reverse($book, true);
echo '<pre>'.print_r($preserved,true). '</pre>';


$even = [2, 4, 6];
$odd = [1, 2, 3];
$all = [...$odd, ...$even];

echo '<pre>'.print_r($all,true). '</pre>';

/*
Summary
-Use the PHP array_key_exists() function to check if a key exists in an array.
-Use the PHP array_keys() function to get all the keys or a subset of keys in an array.
-Use PHP in_array() function to check if a value exists in an array.
-Use the PHP array_merge() function to merge elements of two or more arrays into a single array.
-Use the PHP array_reverse() function to reverse the order of elements in an array.
-PHP uses the three dots (...) to denote the spread operator.
-The spread operator spreads out the elements of an array (...array_var).

*/