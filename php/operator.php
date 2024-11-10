<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Operators</title>
</head>
<body>
        <?php
            $a = 5;
            $b = 10;

            // Arithmetic
            echo $a + $b."</br>"; // 15
            echo $a - $b."</br>"; // -5
            echo $a * $b."</br>"; // 50
            echo $a / $b."</br>"; // 0.5
            echo $a % $b."</br>"; // 5

            // Comparison
            echo $a < $b."</br>"; // 1 (true)
            echo $a > $b."</br>"; // 0 (false)
            echo $a == $b."</br>"; // 0 (false)
            echo $a != $b."</br>"; // 1 (true)

            // Logical
            if ($a < $b && $b > 0) {
                echo "Both conditions are true."."</br>";
                echo "<strong>"."Both conditions are true."."<strong>"."</br>";
            }

            if ($a < $b || $b > 0) {
                echo "At least one condition is true."."</br>";
                echo "<strong>"."At least one condition is true."."<strong>"."</br>";
            }

            if ($a < $b xor $b > 0) {
                echo "Only one condition is true."."</br>";
                echo "<strong>"."Only one condition is true."."<strong>"."</br>";
            }

            // Ternary
            $max = ($a > $b) ? $a : $b;
            $min = ($a < $b) ? $a : $b;
            echo $max; // 10
            echo $min; // 5
        ?>
</body>
</html>