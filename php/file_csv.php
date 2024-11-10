<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stock Table</title>
    <!-- Include DataTables CSS and jQuery -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style>
        /* Custom CSS for table */
        .dataTables_wrapper {
            width: 80%;
            margin: 20px auto;
            /* border: 3px solid black; */
        }
        table.dataTable {
            width: 100%;
            border-collapse: collapse;
        }
        table.dataTable thead th {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
        }
        table.dataTable tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        table.dataTable tbody td {
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="dataTables_wrapper">
<?php
$data = [
    ['Symbol', 'Company', 'Price'],
    ['GOOG', 'Google Inc.', '800'],
    ['AAPL', 'Apple Inc.', '500'],
    ['AMZN', 'Amazon.com Inc.', '250'],
    ['YHOO', 'Yahoo! Inc.', '250'],
    ['FB', 'Facebook, Inc.', '30'],
];

$filename = 'stock.csv';

// Open CSV file for writing
$f = fopen($filename, 'w');
if ($f === false) {
    die('Error opening the file ' . $filename);
}

// Write each row to the file
foreach ($data as $row) {
    fputcsv($f, $row);
}
fclose($f);

// Open the file for reading
$f = fopen($filename, 'r');

echo '<table id="stockTable" class="display">';
echo '<thead><tr>';
$headers = fgetcsv($f); // Read the first line as headers
foreach ($headers as $header) {
    echo '<th>' . htmlspecialchars($header) . '</th>';
}
echo '</tr></thead>';
echo '<tbody>';
while (($line = fgetcsv($f)) !== false) {
    if ($line === [null] || $line === false) {
        continue; // Skip empty rows
    }
    echo '<tr>';
    foreach ($line as $cell) {
        echo '<td>' . htmlspecialchars($cell) . '</td>';
    }
    echo '</tr>';
}
echo '</tbody></table>';

fclose($f);
?>
</div>

<!-- Include jQuery and DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#stockTable').DataTable({
            "paging": true,
            "searching": true,
            "info": true,
            "lengthChange": false,
            "pageLength": 5
        });
    });
</script>

</body>
</html>







<?php
/*
$data = [
	['Symbol', 'Company', 'Price'],
	['GOOG', 'Google Inc.', '800'],
	['AAPL', 'Apple Inc.', '500'],
	['AMZN', 'Amazon.com Inc.', '250'],
	['YHOO', 'Yahoo! Inc.', '250'],
	['FB', 'Facebook, Inc.', '30'],
];

$filename = 'stock.csv';

// open csv file for writing
$f = fopen($filename, 'w');

if ($f === false) {
	die('Error opening the file ' . $filename);
}

// write each row at a time to a file
foreach ($data as $row) {
	fputcsv($f, $row);
}

// close the file
fclose($f);

$f = fopen($filename, 'r');

while (!feof($f)) {
    $line = fgetcsv($f);
    if ($line !== false) {
        echo implode(',', $line) . "\n";
        echo '<br>';
    }
}

fclose($f);

*/
