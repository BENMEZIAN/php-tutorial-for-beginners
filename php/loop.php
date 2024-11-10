<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Loop</title>
</head>
<body>

    <?php
        // FOR Loop
        $total = 0;
        for($i = 0; $i < 5; $i++){
            echo 'Hello, World!'."<br>";
            $total = $total + $i;
        }
        echo "---------------------------------------------"."<br>";
        echo "The total from 0 to 4 equals to : " . $total."<br>";

        echo "------------------------------------------------------------------------------"."<br>";

        // WHILE Loop
        $total = 0;
        $i = 0;
        while($i < 5){
            echo 'Hello, World!'."<br>";
            $total = $total + $i;
            $i++;
        }
        echo "---------------------------------------------"."<br>";
        echo "The total from 0 to 4 equals to : " . $total."<br>";
        echo "------------------------------------------------------------------------------"."<br>";

        // DO WHILE Loop
        $total = 0;
        $i = 0;
        do{
            echo 'Hello, World!'."<br>";
            $total = $total + $i;
            $i++;
        }while($i < 5);

        echo "---------------------------------------------"."<br>";
        echo "The total from 0 to 4 equals to : " . $total."<br>";

        echo "------------------------------------------------------------------------------"."<br>";

        // FOREACH Loop        
        $colors = ['red', 'green', 'blue']; // Array
        $capitals = [
            'Japan' => 'Tokyo',
            'France' => 'Paris',
            'Germany' => 'Berlin',
            'United Kingdom' => 'London',
            'United States' => 'Washington D.C.'
        ]; // Associative array (key ==> value)

        foreach ($colors as $color) {
            echo $color . '<br>';
        }
        
        foreach ($capitals as $country => $capital) {
            echo "The capital city of $country is $capital" . '<br>';
        }


    ?>
    


</body>
</html>
<!-- 
Summary
- Use the PHP for statement to execute a code block in a specified number of times.
- Use the foreach($array_name as $element) to iterate over elements of an indexed array.
- Use the foreach($array_name as $key => $value) to iterate over elements of an associative array.
-->