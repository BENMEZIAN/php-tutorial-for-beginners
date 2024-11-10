<?php

$current_time = time(); // 1626752728

echo date('Y-m-d g:ia', $current_time) . '<br>';

// echo date('Y-m-d g:ia', time() + 60 * 60 * 24)

echo date_default_timezone_get();

echo 'July 13, 2021 is on a ' . date('l', mktime(0, 0, 0, 7, 13, 2021));
// July 13, 2020, is on a Tuesday:

