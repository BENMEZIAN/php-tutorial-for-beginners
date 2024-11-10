<?php

$numbers = [2, 1, 3];
$names = ['Bob', 'John', 'Alice'];
$fruits = ['apple', 'Banana', 'orange'];
$countries = [
    'China' => ['gdp' => 12.238 , 'gdp_growth' => 6.9],
    'Germany' => ['gdp' => 3.693 , 'gdp_growth' => 2.22 ],
    'Japan' => ['gdp' => 4.872 , 'gdp_growth' => 1.71 ],
    'USA' => ['gdp' => 19.485, 'gdp_growth' => 2.27 ],
];

echo '<pre>'."sort function". '</pre>';

sort($numbers); // sort an array of numbers
echo '<pre>'.print_r($numbers,true). '</pre>'; // 1, 2, 3

sort($names, SORT_STRING); // sort an array of strings
echo '<pre>'.print_r($names,true). '</pre>'; // Alice, Bob, John

sort($fruits); // sort an array of strings case-insensitively
echo '<pre>'.print_r($fruits,true). '</pre>'; // Banana, apple, orange

sort($fruits, SORT_FLAG_CASE | SORT_STRING); // To sort an array of strings case-insensitively, you combine the SORT_STRING flag with the SORT_FLAG_CASE flag
echo '<pre>'.print_r($fruits,true). '</pre>'; // apple, Banana, orange

echo '<pre>'."rsort function". '</pre>';

rsort($numbers); // rsort an array of numbers
echo '<pre>'.print_r($numbers,true). '</pre>'; // 3, 2, 1

rsort($names, SORT_STRING); // rsort an array of strings
echo '<pre>'.print_r($names,true). '</pre>'; // John, Bob, Alice

echo '<pre>'."uasort function". '</pre>';

uasort($countries, function($a, $b) {
    if ($a['gdp'] == $b['gdp']) {
        return 0;
    }
    return ($a['gdp'] < $b['gdp']) ? -1 : 1;
});

echo '<pre>'.print_r($countries,true). '</pre>'; // ascending order

uasort($countries,function($a, $b) {
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? 1 : -1;
});

echo '<pre>'.print_r($countries,true). '</pre>'; // descending order







/*
-Use the uasort() function to sort an associative array with a user-defined comparison function and maintains 
the index association.


*/