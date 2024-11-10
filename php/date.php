<?php

echo date('Y')."<br>"; // 2024
echo date('M')."<br>"; // Nov
echo date('D')."<br>"; // Sat


// $created_at = date("Y-m-d H:i:s"); // 2024-11-09 15:45:45

$created_at = date("Y-m-d H:i:s"); // 2024-11-09 15:58:02
echo $created_at."<br>";

$created_at = date("d-m-Y H:i:s"); // 09-11-2024 15:58:02
echo $created_at."<br>";

$created_at = date("Y/m/d H:i:s"); // 09-11-2024 15:58:02
echo $created_at."<br>";

$created_at = date("d/m/Y H:i:s"); // 09/11/2024 15:58:02
echo $created_at."<br>";

