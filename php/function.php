<?php

declare(strict_types=1);



function welcome()
{
	echo 'Welcome!'."<br>";
}

welcome();

function welcome_user($username) // Passing parameters to this function
{
	echo 'Welcome ' . $username."<br>";
}

welcome_user("Abdelmalek");

function add(int $a,int $b){
    $sum = $a + $b;
    return $sum; 
}

$sum = add(5,4);
echo $sum."<br>";

function variadic_func( ...$param ) { // $param is the variadic parameter
    $string = '';
    if( count( $param ) ) { 
       for( $i=0; $i<count($param); $i++ ) {
          $string .= $param[$i];
          $string .= " ";
       }
    }
  
    return $string;
 }
 $welcome = variadic_func( "Welcome", "to", "CodedTag", "Tutorials", "i", "love", "you" );
 echo $welcome."<br>";

/*
$val = add(3.5,4.5);
echo $val;
The above code will throw an error because the function add() expects two integer arguments, but we passed three.
*/

/*
Summary
-A function is a named block of code that performs a specific task.
-Do use functions to create reusable code.
-Use the return statement to return a value from a function.
-Use the PHP strict_types directive to enable strict typing or strict mode.
-In strict mode, PHP accepts only values corresponding to the type declarations and issue a TypeError exception if there’s a mismatch.
-When you include code from another file, PHP uses the mode of the caller.
*/