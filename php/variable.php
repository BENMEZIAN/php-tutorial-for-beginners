<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Variables</title>
</head>
<body>
        <h1>
            <?php 
                echo 'PHP Variables '.'</br>';

                //echo "My variable list : ".'</br>';
                $x = 5;
                $float = 1.5;
                $is_submitted = false;
                $is_valid = true;
                $y = "John";
                $title = "PHP string is awesome";
                $hi = 'Hello world';
                $he = 'Bob';
                $she = 'Alice';
                $z = null;

                // Constants
                define("GREETING", "Welcome to W3Schools.com!");
                echo "Our constant is ".GREETING.'</br>';

                echo "Printing variables: ".'</br>';
                echo "X : ".$x ."</br>"; // 5
                echo "Float : ". $float . "</br>"; // Float : 1.5
                echo var_export($is_submitted, true) . var_dump($is_submitted) . "</br>"; // bool(false) false
                echo var_export($is_valid, true) . var_dump($is_valid) . "</br>"; // bool(true) true
                echo "Y : ".$y ."</br>"; // John
                echo "Title : ".$title ."</br>"; // Title : PHP string is awesome
                echo $hi ."</br>"; // Hello world
                echo "Hello {$y}"."</br>";  // Hello John
                echo "First letter of title : ".$title[0]."</br>"; // P
                echo "Length of title : ".strlen($title)."</br>"; // 21

                $text = "$he said, \"PHP is awesome\".\"Of course.\" $she agreed."; // \ is used to show special character
                echo $text."</br>";
                echo "He said, \"Hello!\""."</br>"; // Outputs: He said, "Hello!"
                echo 'It\'s a nice day!'."</br>"; // Outputs: It's a nice day!
                echo "This is a backslash: \\"."</br>"; // Outputs: This is a backslash: \

                if($z == null){
                    echo "NULL".$z."</br>";
                }
            ?>
        </h1>
</body>
</html>

<!-- 
Summary
A string is a sequence of characters surrounded by single quotes or double quotes.
PHP substitutes variables embedded in a double-quoted string.
A string is a zero-based index. Therefore, you can access a character at a specific position in a string using the square brackets [].
Use the strlen() function to get the length of the string.
-->